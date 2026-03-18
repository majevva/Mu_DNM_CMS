#!/bin/bash
# =============================================================
# Skrypt edukacyjny: analiza logów pod kątem ataków XSS/CSRF
# Uruchom na serwerze produkcyjnym jako root lub www-data
# =============================================================

RED='\033[0;31m'
YELLOW='\033[1;33m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
NC='\033[0m'

echo -e "${BLUE}======================================================${NC}"
echo -e "${BLUE}  Analiza logów pod kątem ataków — Mu_DNM_CMS        ${NC}"
echo -e "${BLUE}======================================================${NC}"
echo ""

# --- Znajdź pliki logów ---
LOGS=()
for path in \
    /var/log/apache2/access.log \
    /var/log/apache2/error.log \
    /var/log/nginx/access.log \
    /var/log/nginx/error.log \
    /var/log/httpd/access_log \
    /var/log/httpd/error_log \
    /var/log/apache2/*.log \
    /var/log/nginx/*.log \
    /var/log/httpd/*.log; do
    [ -f "$path" ] && LOGS+=("$path")
done

if [ ${#LOGS[@]} -eq 0 ]; then
    echo -e "${RED}[!] Nie znaleziono plików logów w standardowych lokalizacjach.${NC}"
    echo "    Podaj ścieżkę do logów ręcznie: $0 /sciezka/do/access.log"
    if [ -n "$1" ] && [ -f "$1" ]; then
        LOGS=("$1")
    else
        exit 1
    fi
fi

echo -e "${GREEN}[+] Znalezione pliki logów:${NC}"
for f in "${LOGS[@]}"; do echo "    $f"; done
echo ""

ALL_LOGS="${LOGS[@]}"

# =============================================================
# SEKCJA 1: Próby XSS w parametrach GET
# =============================================================
echo -e "${CYAN}[1] PRÓBY XSS W URL (parametry GET)${NC}"
echo -e "    Szukam: <script>, onerror=, javascript:, alert(, prompt(, confirm("
echo "---"

XSS_PATTERNS='(<script|%3Cscript|onerror=|onload=|javascript:|alert\(|prompt\(|confirm\(|<img|%3Cimg|svg.*onload|document\.cookie|document\.location|eval\(|fromCharCode|String\.fromCharCode)'

XSS_HITS=$(grep -iEh "$XSS_PATTERNS" "${LOGS[@]}" 2>/dev/null)
XSS_COUNT=$(echo "$XSS_HITS" | grep -c '.' 2>/dev/null || echo 0)

if [ "$XSS_COUNT" -gt 0 ]; then
    echo -e "${RED}[!!!] Znaleziono ${XSS_COUNT} podejrzanych żądań:${NC}"
    echo ""
    echo "$XSS_HITS" | while IFS= read -r line; do
        IP=$(echo "$line" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' || echo "?")
        echo -e "  ${RED}►${NC} $line"
    done | head -50
    echo ""
    echo -e "${YELLOW}[*] Unikalne IP atakujących:${NC}"
    echo "$XSS_HITS" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn | head -20
else
    echo -e "${GREEN}    [OK] Brak wykrytych prób XSS w GET.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 2: Próby ataku na strony rejestracji (email GET param)
# =============================================================
echo -e "${CYAN}[2] ATAK NA FORMULARZ REJESTRACJI (?email= XSS)${NC}"
echo "---"

REG_HITS=$(grep -iEh "(rejestracja|registration|register).*email=.*(<|%3C|javascript:|script)" "${LOGS[@]}" 2>/dev/null)
REG_COUNT=$(echo "$REG_HITS" | grep -c '.' 2>/dev/null || echo 0)

if [ "$REG_COUNT" -gt 0 ]; then
    echo -e "${RED}[!!!] ${REG_COUNT} prób ataku przez formularz rejestracji:${NC}"
    echo "$REG_HITS" | head -20
    echo ""
    echo -e "${YELLOW}Unikalne IP:${NC}"
    echo "$REG_HITS" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn
else
    echo -e "${GREEN}    [OK] Brak prób exploitacji ?email= XSS.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 3: Próby dostępu do admincp
# =============================================================
echo -e "${CYAN}[3] PRÓBY DOSTĘPU DO ADMINCP${NC}"
echo "---"

ADMIN_HITS=$(grep -iEh "(admincp|admin_panel|/admin/)" "${LOGS[@]}" 2>/dev/null)
ADMIN_TOTAL=$(echo "$ADMIN_HITS" | grep -c '.' 2>/dev/null || echo 0)
# Tylko błędy 401/403/404 (nieautoryzowane)
ADMIN_FAIL=$(echo "$ADMIN_HITS" | grep -E '" (401|403|404) ')
ADMIN_FAIL_COUNT=$(echo "$ADMIN_FAIL" | grep -c '.' 2>/dev/null || echo 0)
ADMIN_OK=$(echo "$ADMIN_HITS" | grep -E '" (200|302) ')
ADMIN_OK_COUNT=$(echo "$ADMIN_OK" | grep -c '.' 2>/dev/null || echo 0)

echo -e "  Łącznie żądań do /admincp:  ${ADMIN_TOTAL}"
echo -e "  ${GREEN}Udane wejścia (200/302):    ${ADMIN_OK_COUNT}${NC}"
echo -e "  ${RED}Odrzucone (401/403/404):    ${ADMIN_FAIL_COUNT}${NC}"

if [ "$ADMIN_FAIL_COUNT" -gt 5 ]; then
    echo ""
    echo -e "${YELLOW}[*] IP próbujące dostępu do admincp (odrzucone):${NC}"
    echo "$ADMIN_FAIL" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn | head -10
fi

if [ "$ADMIN_OK_COUNT" -gt 0 ]; then
    echo ""
    echo -e "${YELLOW}[*] IP z udanym dostępem do admincp:${NC}"
    echo "$ADMIN_OK" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn | head -10
fi
echo ""

# =============================================================
# SEKCJA 4: SQL Injection
# =============================================================
echo -e "${CYAN}[4] PRÓBY SQL INJECTION${NC}"
echo "---"

SQL_PATTERNS="(union.*select|select.*from|insert.*into|drop.*table|or.*1=1|' *or|\".*or|%27.*or|%22.*or|0x[0-9a-f]{4}|BENCHMARK\(|SLEEP\(|WAITFOR|xp_cmdshell|information_schema|sys\.tables)"

SQL_HITS=$(grep -iEh "$SQL_PATTERNS" "${LOGS[@]}" 2>/dev/null)
SQL_COUNT=$(echo "$SQL_HITS" | grep -c '.' 2>/dev/null || echo 0)

if [ "$SQL_COUNT" -gt 0 ]; then
    echo -e "${RED}[!!!] ${SQL_COUNT} podejrzanych żądań SQLi:${NC}"
    echo "$SQL_HITS" | head -20
    echo ""
    echo -e "${YELLOW}Unikalne IP:${NC}"
    echo "$SQL_HITS" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn | head -10
else
    echo -e "${GREEN}    [OK] Brak wykrytych prób SQLi.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 5: Path Traversal / LFI
# =============================================================
echo -e "${CYAN}[5] PATH TRAVERSAL / LFI${NC}"
echo "---"

LFI_PATTERNS='(\.\./|\.\.\\|%2e%2e%2f|%2e%2e/|\.\.%2f|/etc/passwd|/etc/shadow|/proc/self|php://|data://|expect://|zip://)'

LFI_HITS=$(grep -iEh "$LFI_PATTERNS" "${LOGS[@]}" 2>/dev/null)
LFI_COUNT=$(echo "$LFI_HITS" | grep -c '.' 2>/dev/null || echo 0)

if [ "$LFI_COUNT" -gt 0 ]; then
    echo -e "${RED}[!!!] ${LFI_COUNT} prób path traversal / LFI:${NC}"
    echo "$LFI_HITS" | head -20
else
    echo -e "${GREEN}    [OK] Brak prób LFI.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 6: Skanery / boty
# =============================================================
echo -e "${CYAN}[6] ZNANE SKANERY I BOTY ATAKUJĄCE${NC}"
echo "---"

BOT_PATTERNS='(sqlmap|nikto|nmap|masscan|zgrab|nuclei|acunetix|nessus|burpsuite|w3af|havij|pangolin|dirbuster|gobuster|wfuzz|hydra|medusa|metasploit|python-requests/2\.[0-3]|curl/7\.[0-5]|Go-http-client/1\.1)'

BOT_HITS=$(grep -iEh "$BOT_PATTERNS" "${LOGS[@]}" 2>/dev/null)
BOT_COUNT=$(echo "$BOT_HITS" | grep -c '.' 2>/dev/null || echo 0)

if [ "$BOT_COUNT" -gt 0 ]; then
    echo -e "${RED}[!!!] ${BOT_COUNT} żądań od znanych skanerów:${NC}"
    echo "$BOT_HITS" | grep -oiE "$BOT_PATTERNS" | sort | uniq -c | sort -rn | head -10
    echo ""
    echo -e "${YELLOW}IP skanerów:${NC}"
    echo "$BOT_HITS" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn | head -10
else
    echo -e "${GREEN}    [OK] Brak znanych skanerów.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 7: Brute force logowania
# =============================================================
echo -e "${CYAN}[7] BRUTE FORCE LOGOWANIA (POST /login, /account, etc.)${NC}"
echo "---"

BF_HITS=$(grep -iEh '"POST.*(login|account|signin|logon).*" (200|302|401|403)' "${LOGS[@]}" 2>/dev/null)
BF_IPS=$(echo "$BF_HITS" | grep -oE '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' | sort | uniq -c | sort -rn)

if [ -n "$BF_IPS" ]; then
    echo -e "${YELLOW}[*] IP z wieloma POST na strony logowania:${NC}"
    echo "$BF_IPS" | while read count ip; do
        if [ "$count" -gt 20 ]; then
            echo -e "  ${RED}► $ip — $count żądań [PODEJRZANE]${NC}"
        else
            echo "  $ip — $count żądań"
        fi
    done | head -20
else
    echo -e "${GREEN}    [OK] Brak podejrzanego brute force.${NC}"
fi
echo ""

# =============================================================
# SEKCJA 8: Top 10 IP ogółem
# =============================================================
echo -e "${CYAN}[8] TOP 10 IP (wszystkie żądania)${NC}"
echo "---"
grep -hEo '^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+' "${LOGS[@]}" 2>/dev/null | sort | uniq -c | sort -rn | head -10
echo ""

# =============================================================
# SEKCJA 9: Ostatnie 10 błędów PHP (z error.log)
# =============================================================
echo -e "${CYAN}[9] OSTATNIE BŁĘDY PHP${NC}"
echo "---"
PHP_ERRORS=$(grep -hEi "(PHP Fatal|PHP Warning|PHP Notice|PHP Parse)" "${LOGS[@]}" 2>/dev/null | tail -10)
if [ -n "$PHP_ERRORS" ]; then
    echo -e "${YELLOW}Ostatnie błędy PHP:${NC}"
    echo "$PHP_ERRORS"
else
    echo -e "${GREEN}    [OK] Brak błędów PHP w logach.${NC}"
fi
echo ""

# =============================================================
# PODSUMOWANIE
# =============================================================
echo -e "${BLUE}======================================================${NC}"
echo -e "${BLUE}  PODSUMOWANIE${NC}"
echo -e "${BLUE}======================================================${NC}"

declare -A SUMMARY
[ "${XSS_COUNT:-0}" -gt 0 ]    && SUMMARY["XSS"]="$XSS_COUNT prób" || SUMMARY["XSS"]="OK"
[ "${REG_COUNT:-0}" -gt 0 ]    && SUMMARY["XSS rejestracja"]="$REG_COUNT prób" || SUMMARY["XSS rejestracja"]="OK"
[ "${ADMIN_FAIL_COUNT:-0}" -gt 0 ] && SUMMARY["Admincp brute"]="$ADMIN_FAIL_COUNT prób" || SUMMARY["Admincp brute"]="OK"
[ "${SQL_COUNT:-0}" -gt 0 ]    && SUMMARY["SQLi"]="$SQL_COUNT prób" || SUMMARY["SQLi"]="OK"
[ "${LFI_COUNT:-0}" -gt 0 ]    && SUMMARY["LFI/Traversal"]="$LFI_COUNT prób" || SUMMARY["LFI/Traversal"]="OK"
[ "${BOT_COUNT:-0}" -gt 0 ]    && SUMMARY["Skanery"]="$BOT_COUNT żądań" || SUMMARY["Skanery"]="OK"

for key in "XSS" "XSS rejestracja" "Admincp brute" "SQLi" "LFI/Traversal" "Skanery"; do
    val="${SUMMARY[$key]}"
    if [ "$val" = "OK" ]; then
        echo -e "  ${GREEN}[OK]${NC}  $key"
    else
        echo -e "  ${RED}[!!]${NC}  $key: $val"
    fi
done
echo ""
echo -e "Raport wygenerowany: $(date)"
echo ""
