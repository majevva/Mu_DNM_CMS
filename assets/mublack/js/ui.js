function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);
(function($) {
	$.fn.careChild = function(sel) { return this.each(function() {$(this).find(sel).filter(':nth-child(2n-1)').addClass('odd').end().filter(':nth-child(2n)').addClass('even').end().eq(0).addClass('first_child').end().last().addClass('last_child');	});};
	$.fn.careNum = function(sel) { return this.each(function() {var obj = $(this).find(sel);for(i=0;i<obj.length;i++){ obj.eq(i).addClass("cnum"+i);}});};
	
})(jQuery);
// wz function
(function($) {
	$.wz = $.wz || {};
	$.wz.uiSupportCSS = function() {
		//CSS관련 firstchild, lastchild
		$('.linemap_wrp .menu_list').careChild('li');
		$('.notice_wrp hgroup').careChild('h3');
		$('.board_wrp').careChild('article');
		$('.sub_menu_bx').careChild('li');
		$('.review_list_wrp').careChild('article');
		$('.banner_main').careNum('a');
		//$('.ranking_tab').careNum('li');
		//$('.ranking_tab.schedule').careNum('li');
		$('.my_pc').careChild('th');
		$("#gstView").click(function () {$("#gstView").hide();$("#gstNone").show();$("#gstYourTime").slideDown(100,function(){$(".gmt_off").addClass("gGST_BoxBgNone");});});
		$("#gstNone").click(function () {$(".gmt_off").removeClass("gGST_BoxBgNone");$("#gstYourTime").slideUp(50);$("#gstNone").hide();$("#gstView").show();});
		
	};
	$.wz.uiAction = function() {
		// LNB
		$(".lnb_nav >.menu_list").hover(function () {
			var idx = $(this).index();
			var curIndex = $(this).index() + 1;			
			if ($(this).find("ul:first").attr("id") == ("gameSlideNav0" + curIndex))
			{
                if ($("#gameSlideNav0" + curIndex).css("display") == "none") {
                    $("#gameSlideNav0" + curIndex).show();
                    $(".menu_list > h2 > a").eq(idx).addClass("on")
                } else {
                    $("#gameSlideNav0" + curIndex).hide();
                    $(".menu_list > h2 > a").eq(idx).removeClass("on")
                }
            } else {
                $("#gameSlideNav0" + curIndex).hide()
            }
    	});
		/* main promotion rolling */
		$(function () {
			if ($(".promotion_wrp").length) {
				imgBx = $('.visual_slider').bxSlider({ mode: 'vertical', pause: 3000, controls: false, pager: false });
				imgNav = $('.title_slider_nav').bxSlider({ mode: 'vertical', controls: true, minSlides: 4, maxSlides: 4, moveSlides: 1, slideWidth: 275, slideMargin: 0, pager: true, infiniteLoop: false, hideControlOnEnd: true });
		
				$('.title_slider_nav a').click(function () {
					var count = $(this).attr("data-slide-index");
					$('.title_slider_nav a').removeClass('active');
					$(this).addClass('active');
					imgBx.goToSlide(count);
					return false;
				});
				$('.visual_slider li').bind("mouseenter focus", function () {clearInterval(roll_img);});
				$('.bx-prev,bx-ndex').bind("click", function () {clearInterval(roll_img);});
				$('.visual_slider li').bind("mouseleave", function () {show_random.slide_turn();});
				$('.title_slider_nav a').bind("mouseenter focus", function () {clearInterval(roll_img);});
				$('.title_slider_nav a').bind("mouseleave", function () {show_random.slide_turn();});
				set_nav = $(".title_slider_nav li ");
				set_num = 0;
				var sCount = imgNav.getSlideCount();
				show_random = {};
				show_random = {
					slide_rand: function () {
						if (set_num > (sCount - 1)) {
							set_num = 0;
							imgNav.reloadSlider();
						}
						var rand_obj = set_nav.eq(set_num).find('a');
						var count = rand_obj.attr("data-slide-index");
						$('.title_slider_nav a').removeClass('active');
						rand_obj.addClass('active');
						imgBx.goToSlide(count);
						if (set_num > 0) {
							imgNav.goToNextSlide();
						}
						set_num++;
					},
					slide_turn: function () {
						roll_img = setInterval("show_random.slide_rand()", 3000);
					}
				};
				show_random.slide_turn();
				show_random.slide_rand();
			}
		});
		//랭킹 금주의 아크로드 히스토리
		$(function () {
			if($(".king_archlord_wrp").length) {
				slider_king = $('.king_archlord_slider').bxSlider({mode:'horizontal',pager:false,infiniteLoop:false,auto: false,hideControlOnEnd:true,minSlides:1,maxSlides:3,moveSlides:1,slideMargin:10,slideWidth:220});
			}
		});
		/* user review star check */
		$(function(){
			var updateRateUI = function( idx ) {
			  var $label = $('.star_select_bx label'),
						$curRate = $('#star_result');
			  $curRate.html( idx );
			  $label.each(function(index) {
				 if( index >= idx ) 
					$(this).html('<span class="off"></span>');
				 else if ($(this).html() != '<span class="on"></span>') {
					$(this).html('<span class="on"></span>');
				 }
			  });
			};
			$('.star_select_bx label').on('mouseover mouseleave click', function(e) {
			  var inputId = '#' + $(this).attr('for'),
						 radioVal = $(inputId).val();

			  if( e.type == 'click' ) {
						 $('#star_process').data('rate', radioVal);
			  } else if( e.type == 'mouseleave' ) {
						 radioVal = $('#star_process').data('rate') || 0;
			  }
			  updateRateUI( radioVal );
			});
		 });
		
		
	};
})(jQuery);

$(function () {
	var placeholder_input = $(".input_div_wrp input:first-child");
	placeholder_input.bind({
		focusin : function(){
			var _this = $(this);
			_this.addClass("Input_has_focus");
		},
		focusout: function(){
			var _this = $(this);
			_this.removeClass("Input_has_focus");
		},
		keyup: function(){
			var _this = $(this);
			if (_this.val().length==0){
				_this.parent().find(".input_label").show();
			} else {
				_this.parent().find(".input_label").hide();
			}
		}
	}).not("[value='']").each(function(idx) {
		var _this = $(this);
		_this.addClass("Input_has_focus");
		_this.parent().find(".input_label").hide();
	});
});

/* s:GNB */
// user login after UI
function user_join_info() {
	$(".user_conect > ul > li").hover(function () {
			for(var i=1; i<=$(".user_conect > ul > li").length; i++) {
				if($(this).find("div:first").attr("id") == ("myPulldownNavWrap0"+i))
				{
					if($("#myPulldownNavWrap0"+i).css("display") == "none") {
						$("#myPulldownNavWrap0"+i).slideDown(100);
						$(".tit > a.join").addClass("on");
					}else {
						$("#myPulldownNavWrap0"+i).slideUp(20);
						$(".tit > a.join").removeClass("on");
					}
				}
				else 
				{
					$("#myPulldownNavWrap0"+i).hide();
				}
			}
		});
}
// language select
function gnb_lang_select() {
	$(".lang > ul > li").hover(function () {
        for (var i = 1; i <= $(".lang > ul > li").length; i++) {
            if ($(this).find("div:first").attr("id") == ("pulldown_lang0" + i))
			{
                if ($("#pulldown_lang0" + i).css("display") == "none") {
                    $("#pulldown_lang0" + i).slideDown(100);
                    $(".tit > a.lang_tit").addClass("on")
                } else {
                    $("#pulldown_lang0" + i).slideUp(20);
                    $(".tit > a.lang_tit").removeClass("on")
                }
            } else {
                $("#pulldownNavWrap0" + i).hide()
            }
        }
    });
}
// game navi
function game_list_view() {
	$(".menu > li > a.game").hover(function () {
			if($(".gnb_one_wrp").find(".game_list_wrp"))
			{
				if($("#game_list_open").css("display") == "none") {
					$(".menu > li > a.game").addClass("on");
					$("#game_list_open").slideDown(100);
				}else {
					$(".menu > li").not(":first-child").mouseenter(function(){
						$("#game_list_open").slideUp(100);
						$(".menu > li > a.game").removeClass("on");
					})
				}
				
			}
			else 
			{
				$(".menu > li > a.game").removeClass("on");
			}
	});
	$("#game_list_open").bind("mouseleave", function(){//추가
		$(this).slideUp(100);
		$(".menu > li > a.game").removeClass("on");
	});
	
}
/* e:GNB */

//onload paging
(function($) {
	$(function() {
		$.wz.uiSupportCSS();
		$.wz.uiAction();
	});
})(jQuery);