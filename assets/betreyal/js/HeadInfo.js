var wz = window.WEBZEN =
{
    isSSL: (location.href.toLowerCase().split("://", 1)[0] == 'https'),
    isLocal: (location.href.indexOf("http://local-") == 0 || location.href.indexOf("https://local-") == 0),
    isDev: (location.href.indexOf("http://dev-") == 0 || location.href.indexOf("https://dev-") == 0),
    isAlpha: (location.href.indexOf("http://alpha-") == 0 || location.href.indexOf("https://alpha-") == 0),
    isLive: false,

    strProtocol: "http://",
    strTopDomain: "muonline.co.kr",
    strWebzenDomain: "webzen.co.kr"
};

if (wz.isLocal) {
    wz.strHostPrefix = "local-";
}
else if (wz.isDev)
    wz.strHostPrefix = "dev-";
else if (wz.isAlpha)
    wz.strHostPrefix = "alpha-";
else {
    wz.isLive = false;
    wz.strHostPrefix = "";
}

if (wz.isSSL)
    wz.strProtocol = "https://";

// Http
wz.Http = {
    Platform: wz.strProtocol + wz.strHostPrefix + "platform." + wz.strTopDomain + "",
    Member: "https://" + wz.strHostPrefix + "member." + wz.strTopDomain + "",
    WebzenMember: "https://" + wz.strHostPrefix + "member." + wz.strWebzenDomain + "",
    WebzenPortal: "http://" + wz.strHostPrefix + "www." + wz.strWebzenDomain + "",
    Cs: "http://" + wz.strHostPrefix + "cs." + wz.strWebzenDomain + "",
    Image: "http://image.webzen.kr",
    SSL: "https://ssl.webzen.co.kr",
    Upload: "http://" + wz.strHostPrefix + "upload." + wz.strTopDomain + "",
    Files: "http://" + wz.strHostPrefix + "files." + wz.strTopDomain + ""
}
if (window.location.hostname == wz.strHostPrefix + "payment." + wz.strTopDomain) {
    document.write('<script src ="' + wz.Http.Platform + '/Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>');
}
else if (window.location.hostname == wz.strHostPrefix + "blueshop." + wz.strTopDomain) {
    document.write('<script src ="' + wz.Http.Platform + '/Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>');
}
else {
    document.write('<script src ="' + wz.Http.Platform + '/Scripts/jquery-1.8.2.min.js" type="text/javascript"></script>');
}

