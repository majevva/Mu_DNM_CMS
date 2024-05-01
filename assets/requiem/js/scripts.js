$(document).ready(function(e) {
	
	$('.fancybox').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});	
	$('.status .server').each(function(i, el) {
        $(el).find('.load .line').css('width',$(el).attr('data-online')/5+'%');
    });
	
	

	
	var elhover =$('#btn-startgame, #btn-more, #btn-more-news, #btn-go')
	 $(elhover)
   	 .append('<div class="fake-hover"></div>').each(function() {
	   var $fake = $('> .fake-hover', this).css('opacity', '0');
	   $(this).hover(function () {
        $fake.stop().fadeTo(400, 1);
      }, function () {
        $fake.stop().fadeTo(400, 0);
      });
	});
	$('.server-block').each(function(i, el) {
        $(el).find('.scale').css('width',parseInt($(el).attr('data-online'))/20000*100+'%')
    });
	setInterval(function(){
		$('#animates').addClass('animated tada');
		setTimeout(function(){
			$('#animates').removeClass('animated tada');
		},1000);
	},5000);
	
	$('.news').each(function(i, el) {
        if(i > 3) {
			$(el).hide();	
		}
    });


	if($('.news').length > 5) {
		$('.show-more a').html('ПОКАЗАТЬ ЕЩЕ '+parseInt($('.news').length - 5)+' НОВОСТИ');
		$('.show-more').show();	
	}
	
	$('.show-more a').click(function(e) {
        $('.news').fadeIn(300);
		$('.show-more').fadeOut(300);
    });

	$('.close, .close-overlay').click(function(e) {
        $('.overlay, .popup').removeClass('active');
    });	
	
	
	if($.cookie('special') != 'false') {
		$('.special').show();
		$('.header').removeClass('hide');
	}	
	
	$('.close-special').click(function(e) {
        $('.special').fadeOut(500);
    	$.cookie('special', 'false', { expires: 1, path: '/' });
		$('.header').addClass('hide');
	});
	
	$('.totop').click(function(e) {
        $('body,html').animate({scrollTop:0},600);
    });
	
	$('.tab-stat'+$('.list-stat a.active').attr('href')).addClass('active');
	
	$('.list-stat a').click(function(e) {
        if(!$(this).is('.active')) {
			$('.list-stat a, .tab-stat').removeClass('active');
			$(this).addClass('active');
			$('.tab-stat'+$(this).attr('href')).addClass('active');
		} 
    });
	
	$('.twitch-next').click(function(e) {
		if($('.twitch .twitch-item.active').next().is('.twitch-item')) {
       		$('.twitch .twitch-item.active').removeClass('active').next().addClass('active');
		} else {
			$('.twitch .twitch-item').removeClass('active').first().addClass('active');
		}
    });
	$('.twitch-prev').click(function(e) {
		if($('.twitch .twitch-item.active').prev().is('.twitch-item')) {
       		$('.twitch .twitch-item.active').removeClass('active').prev().addClass('active');
		} else {
			$('.twitch .twitch-item').removeClass('active').last().addClass('active');
		}
    });
	$('.btn-generate').click(function(e) {
        $('.l2prefix').val(str_rand());
    });

	$('.btn-send-tel').click(function(e) {
        if($('.input-tel').val().length < 7) {
			alert('Укажите номер телефона!');
			return false;
		} else {
			$('#form_tel').submit();
		}
    });
				
});


function str_rand() {
        var result       = '';
        var words        = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        var max_position = words.length - 1;
            for( i = 0; i < 2; ++i ) {
                position = Math.floor ( Math.random() * max_position );
                result = result + words.substring(position, position + 1);
            }
        return result;
    }


$(function(){

		$('#slider').movingBoxes({
			startPanel   : 2,      // start with this panel
			wrap         : false,  // if true, the panel will infinitely loop
			buildNav     : true,   // if true, navigation links will be added
			navFormatter : function(){ return "&#9679;"; } // function which returns the navigation text for each panel
		});

});


function showPopup(el) {
	$('.overlay, .popup.'+el).addClass('active');	
}

