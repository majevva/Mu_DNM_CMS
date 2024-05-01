$(document).ready(function(){
    $('.tops-nav .tops-nav-serv a').click(function(e){
        $target = $(this).attr('data-target');
        $('.tops-nav .tops-nav-serv a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
        if(!$($target).is(':visible')) {
            $('.top-serv').stop().animate({opacity:0}, function(){
                $('.top-serv').hide();
                $($target).show().css({opacity:0}).animate({opacity:1});
            });
        }
    });
    $('.tops-nav .tops-nav-type a').click(function(e){
        $target = '.'+$(this).attr('data-target');
        $('.tops-nav .tops-nav-type a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
        if(!$($target).is(':visible')) {
            $('.top-table').stop().animate({opacity:0}, function(){
                $('.top-table').hide();
                $($target).show().css({opacity:0}).animate({opacity:1});
            });
        }
    });
    $('.pk-table, #serv2').hide();

    $('.scroll').click(function(e){
        e.preventDefault;
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    var online;
    $('.server').each(function(i, el) {
        online = $(el).attr('data-online')/$(el).attr('data-max-online');
        if (online > 100) {
          online = 100;
        }
    });


    if ($('table#l2top').length) {
        $('table#l2top').wrap('<div class="static stat-bot"></div>');
    }
});