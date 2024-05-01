$.muwz = $.muwz || {};
(function($) {
	$.fn.careChild = function(sel) { return this.each(function() {$(this).find(sel).filter(':nth-child(2n-1)').addClass('odd').end().filter(':nth-child(2n)').addClass('even').end().eq(0).addClass('first_child').end().last().addClass('last_child');	});};
})(jQuery);
 
$.muwz.uiSupportCSS = function() {
	$('.recom_bx').careChild('a');
}; 

//메인 전용텝
$.muwz.mainTab=function(el){
	$(el + " h2 a").on({
		click:function(){
			var idx = $(el + "  h2").index($(this).parent());
			$(el + "  h2 a").removeClass("on");
			$(this).addClass("on");
			$(el + " .cont").removeClass("show");
			$(el + " .cont").eq(idx).addClass("show");
			return false;
		}
	})
}
	

//메인 키비쥬얼 배너
$.muwz.mainKeyVisual = function(){

	var elSlider = $('.roll_main_wrap li');
	
	var isAutoSlide = elSlider.length > 1 ? true : false;

	var slider_main_roll = $('.roll_main_wrap ul').bxSlider({
			mode: 'fade', auto: isAutoSlide, pause: 5000, controls: false, onSliderLoad: function(){
				 $('.roll_main_wrap li').css("visibility", "visible");
			}
	});
	$('.roll_main_wrap .bx-pager').bind({ click: function () { slider_main_roll.stopAuto(); slider_main_roll.startAuto(); } });

}



// 대표 케릭터 레이어 보기 및 닫기
$.muwz.selectMainChar = function(){
	$(".login_after .btn_selectMainChar").on({
		click:function(){
			$(".selectMainChar_wrap").show(); 
			$(".selectMainChar_wrap .txt_select").click(function(){
				$(this).next().show();
				return false;
			})
			$(".selectMainChar_wrap .selectServ ul li a").click(function(){	
				var parentEl = $(".selectMainChar_wrap .selectServ ul");
				parentEl.prev(".txt_select").html($(this).html());
				parentEl.hide();
				//$(this).click(); //edit jh
				return false;
			})
			$(".selectMainChar_wrap .btn_close").click(function(){
				$(".selectMainChar_wrap,.selectMainChar_wrap .selectServ ul").hide(); 
				return false;
			})
			return false;
		}
	})


}

$.muwz.uiAction = function() {
	$(function(){$('.select-disign').select2({minimumResultsForSearch : 1000});});
	$(".select_list").click(function () {
		$(".user_server_list").show();
		$(".select_list").toggleClass("on");
	}); 
};
$.muwz.uiRollImg = function() {
	$(".roll_img").on({
		mouseover : function () { 
			if(this.nodeName == "IMG"){
				$(this).attr("src", function(){ return $(this).attr("src").replace("_off","_on") });
			}else {
				$(this).addClass("on");
			}
		},mouseleave : function(){
			if(this.nodeName == "IMG"){
				$(this).attr("src", function(){ return $(this).attr("src").replace("_on","_off") });		
			}else {
				$(this).removeClass("on");
			}
		}
	});
};
//메인 추천상품
$.muwz.mainRecomPrd = function(){
	var mRecomPrd_list = $('.mRecomPrd_wrap .roll_item_list .list ul li');
	
	var n_min_list = 5;
	if(mRecomPrd_list.length > n_min_list)
	{
		var slider_prd_roll =  $('.mRecomPrd_wrap .roll_item_list .list ul ').bxSlider({ 
			auto: true, pause: 5000,  useCSS: true, controls: false, slideWidth: 390, minSlides: 5, maxSlides: 5, slideMargin: 10,onSliderLoad:function(){prd_click();},onSlideBefore :function(){prd_click();}
		});
		$('.mRecomPrd_wrap .roll_item_list .list').bind({ mouseover: function () { slider_prd_roll.stopAuto(); }, mouseleave : function(){slider_prd_roll.startAuto();} });
	}
	else
	{
		prd_click();
	}
	
	function prd_click(){
		$(".roll_item_list .list ul a").click(function(){
			var imgState = $(this).children();
			$(".mRecomPrd_wrap .item_detail .thumb img").attr("src", imgState.attr("src"));
			$(".mRecomPrd_wrap .item_detail .detail h3").html(imgState.attr("alt"));
			$(".mRecomPrd_wrap .item_detail .detail p").html(imgState.attr("data-item-desc"));
			return false;
		});
	}

	
	$('.mRecomPrd_wrap .bx-pager').bind({ click: function () { slider_prd_roll.stopAuto(); slider_prd_roll.startAuto(); } });
	
}
//LNB
$.muwz.lnb =  function(){
	$.muwz.lnb.lnbOn = function(obj){
		lnbState=true;
		$("nav .lnb .m").children().attr("src", function(){ return $(this).attr("src").replace("_on","_off"); });
		obj.children().attr("src", function(){ return $(this).attr("src").replace("_off","_on"); });
		$("nav .lnb .snb").hide();
		obj.next().show();
	}
	$.muwz.lnb.snbOn = function(obj){
		lnbState=true;
		$("nav .lnb .snb img").attr("src", function(){ return $(this).attr("src").replace("_on","_off"); });
		obj.children().attr("src", function(){ return $(this).attr("src").replace("_off","_on"); });
	}
	$.muwz.lnb.snbOut = function(){
		lnbState=false;
		setTimeout(function(){
			if(lnbState == false){
				$("nav .lnb .snb").hide();
				$("nav .lnb .m").children().attr("src", function(){ return $(this).attr("src").replace("_on","_off"); });
				$("nav .lnb .snb img").attr("src", function(){ return $(this).attr("src").replace("_on","_off"); });
				lnbState=true;
			}				
		}, 500);
	}	
	$("nav .lnb .m").on({
		focus:function(){
			$.muwz.lnb.lnbOn($(this));
		},
		mouseover:function(){
			$.muwz.lnb.lnbOn($(this));
		}
	})
	$("nav .lnb .snb li a").on({
		focus:function(){
			$.muwz.lnb.snbOn($(this));
		},
		mouseover:function(){
			$.muwz.lnb.snbOn($(this));
		}
	})
	$("nav .lnb a").on({
		mouseleave:function(){
			$.muwz.lnb.snbOut();
		}, 
		blur : function(){
			$.muwz.lnb.snbOut();
		}
	});
}

//메인 공성전용 
$.muwz.mainWarState = function(){ 
	$(".recent_war_wrap .btn_more").on({
		click :function(e){
			e.preventDefault();
			var idx = $(".recent_war_wrap .btn_more").index($(this));
			var tabAnchor = $(".war_schedule .tab a");
			var tabList = $(".war_schedule .tab li");
			var tabWarList = $(".war_schedule .war_list");
			var	positionTop = (($(window).height() - 607) / 2) - 38 + $(window).scrollTop();
			if(positionTop < 150)
			{
				positionTop = 150;
			}
			$(".popup_type01,.dimmed").show();
			$(".popup_type01").css({ top: positionTop });
			tabWarList.hide();
			tabWarList.eq(idx).show();
			tabAnchor.removeClass("on");
			tabList.eq(idx).children().addClass("on");
			tabAnchor.click(function(e){
				e.preventDefault();
				tabAnchor.removeClass("on");
				tabList.eq($(this).parent().index()).children().addClass("on");
				tabWarList.hide();
				tabWarList.eq($(this).parent().index()).show();			 
			}) 
		}
	})
}
	
//메인 공성전 텍스트 롤링
$.muwz.mainWarTxt1 = function(){
	var slider_mainWarTxt_roll1 = $('.mCastWar_wrap .roll ul').bxSlider({
			mode: 'vertical', auto: true, pause: 3000, autoStart: true, controls: false,pager: false
	}); 
	$('.mCastWar_wrap .roll').bind({ mouseover: function () { slider_mainWarTxt_roll1.stopAuto(); }, mouseleave : function(){slider_mainWarTxt_roll1.startAuto();} });

}
$.muwz.mainWarTxt2 = function(){
	var slider_mainWarTxt_roll2 = $('.mCryWar_wrap .roll ul').bxSlider({
			mode: 'vertical', auto: true, pause: 3000, autoStart: true, controls: false,pager: false
	}); 
	$('.mCryWar_wrap .roll').bind({ mouseover: function () { slider_mainWarTxt_roll2.stopAuto(); }, mouseleave : function(){slider_mainWarTxt_roll2.startAuto();} });

}
//이미지 롤오버용
$.muwz.imgRollOver = function(){
	$(".imgRoll").on({
		mouseover : function(){
			$(this).attr("src", function(){ return $(this).attr("src").replace("_off","_on")});
		},
		mouseout : function(){			
			$(this).attr("src", function(){ return $(this).attr("src").replace("_on","_off")});
		}
	})
}

// aside 배너
$.muwz.bannerRoll = function(){
	var elSlider = $('.banner_wrap li');
	var isAutoSlide = elSlider.length > 1 ? true : false;
	var slider_banner_roll = $('.banner_wrap ul').bxSlider({
			mode: 'fade', auto: isAutoSlide, pause: 5000, controls: false, onSliderLoad: function(){
				 $('.banner_wrap li').css("visibility", "visible");
			}
	});
	$('.banner_wrap .bx-pager').bind({ click: function () { slider_banner_roll.stopAuto(); slider_banner_roll.startAuto(); } });
	$('.banner_wrap').bind({ mouseover: function () { slider_banner_roll.stopAuto(); }, mouseleave : function(){slider_banner_roll.startAuto();} });
}


$.muwz.uiSelectBox = function (obj) {
	var box = $(obj),
		cont = box.find('> a'),
		optionsBox = cont.parent().find('.select_options'),
		radios = optionsBox.find('[type=radio]'),
		options = optionsBox.find('a');

	if (box.length === 0) { return false; }

	//optionsBox.css('width', (optionsBox.width() + 18)  + 'px');
	//cont.css('width', (optionsBox.width() - 20 ) + 'px');

	cont.on('click', function () {
		optionsBox.toggle();
		return false;
	});

	options.on('click', function () {
		cont.text($(this).text());
		radios.removeAttr('checked');
		$(this).prev().attr('checked', 'checked');
		optionsBox.hide();
		return false;
	});

	optionsBox.on({
		'mouseover': function () {
			optionsBox.show();
		},
		'mouseout': function () {
			optionsBox.hide();
		}
	});
};
//로그인 placeholder 제어
$(function () {
	if(typeof(Modernizr)!='undefined' && !Modernizr.input.placeholder)
	{
		$(".input_div_wrp .input_label").show();
		var placeholder_input = $(".input_div_wrp input:first-child, .input_div_wrp textarea:first-child");
		placeholder_input.bind({
		focusin : function(){
			var _this = $(this);
			_this.addClass("Input_has_focus");
			_this.parent().find(".input_label").hide();
		},
		focusout: function(){
			var _this = $(this);
			_this.removeClass("Input_has_focus");
			if (!_this.val()) {
				_this.parent().find(".input_label").show();
			}
		}
		}).not("[value='']").each(function(idx) {
			var _this = $(this);
			_this.addClass("Input_has_focus");
			_this.parent().find(".input_label").hide();
		});
	}
});

//lnb
$(function () {
		$(".lnb_nav").on("mouseenter", function () { 
			$(".lnb_bg_down").css("background-image","url('https://ssl.webzen.co.kr/Mu/v02/official_red/common/lnb_down_bg.png')");
			$(".lnb_bg_down").css("height", "260px");
			$(".lnb_nav").css("height", "260px");
		
			var sub = ".lnb_sub_list";
			var lnb_menu = ".lnb_nav li"
			$(sub).show();
			$(lnb_menu).css("top", "10px");
			$(".lnb_nav li .on").css("color", "#b3350f");
			
		
		});
		$(".lnb_nav").on("mouseleave", function () { 
			$(".lnb_bg_down").css("background-image","url('https://ssl.webzen.co.kr/Mu/v02/official_red/common/lnb_down_bg.png')");
			$(".lnb_bg_down").css("height", "0px");
			$(".lnb_nav").css("height", "50px")
			//var index = $(this).index() + 1;
			//var sub = "#lnb_menu_list0" + index;
			var sub = ".lnb_sub_list";
			var lnb_menu = ".lnb_nav li"
			$(sub).hide();
			$(lnb_menu).css("top", "30px");
			$(".lnb_nav li .on").css("color", "#ffd200");
		});
		
	});

//linemap location
$.muwz.locationTxt = function () {
	$("#menu_location > ol > li").hover(function () {
		for(var i=1; i<=$("#menu_location > ol > li").length; i++) {
			if($(this).find("div:first").attr("id") == ("location0"+i))
			{
				if($("#location0"+i).css("display") == "none") {
					$("#location0"+i).slideDown(50);
				}else {
					$("#location0"+i).slideUp(100);
				}
			}
			else 
			{
				$("#location0"+i).hide();
			}
		}
	});
}

/* -체크박스 추가: script 부분 */
$(function(){
	
	 if ($('.skin_design_input').length != 0) 
	 {

		$('.skin_design_input input').iCheck({checkboxClass:'icheckbox_skin_design',radioClass:'iradio_skin_design' });
	 }
	
});
//공통실행함수
$.muwz.commonInit = function(){	

	$.muwz.lnb();
	$.muwz.imgRollOver();
	$.muwz.selectMainChar();
	$.muwz.bannerRoll();
	$.muwz.uiSelectBox('.select_box');
	$.muwz.uiSelectBox('.search_box');
	$.muwz.locationTxt();
	$.muwz.mainTab(".recent_bbs_wrap");
	$.muwz.uiSupportCSS();
	$.muwz.uiAction();
	$.muwz.uiRollImg();
	 // Multimedia show/hide
	 $('.media_board')
			.queue(function() {
				var length = $('li', this).length;
				if (length < 4) {
					$('.btn_more', this).hide();
					return;
				}
				$('li:gt(2)', this).hide();
			})
			.on('click', '.btn_more', function() {
				$(this)
					.toggleClass('open')
					.toggleClass('close');
				$(this).parents('.media_board').find('li:gt(2)').slideToggle();
				return false;
			});
}



//메인 전용 함수
$.muwz.mainInit = function(){

	$.muwz.mainKeyVisual();
	$.muwz.mainWarState(); 
	$.muwz.mainRecomPrd();
	$.muwz.mainTab(".recent_war_wrap");	
	$.muwz.mainWarTxt1();	
	$.muwz.mainWarTxt2();	
		
}

// layer popup
var fm_all = null;
var div = null;
var imgdiv = null;
var fm = null;

function coverScreen(strDivSrc) {
	var h = parseInt(document.documentElement.scrollHeight) + "px";
	var w = parseInt(document.body.offsetWidth) + "px";

	div = document.createElement("iframe");
	div.className = "dvclass";
	div.style.top = "0px";
	div.style.left = "0px";
	div.style.width = w;
	div.style.height = h;
	div.style.position = "absolute";
	div.style.zIndex = 9990;
	div.style.display = "none";
	div.frameBorder = "0";
	div.style.margin = "0";
	div.src = strDivSrc;

	document.body.appendChild(div);

	document.body.onresize = document.body.onresizestart = document.body.onresizeend = document.body.onscroll = function () {
		div.style.top = "0px";
		div.style.left = "0px";
		div.style.width = parseInt(document.body.offsetWidth) + 'px';
		div.style.height = parseInt(document.documentElement.scrollHeight) + "px";
		imgdiv.style.left = (parseInt(document.documentElement.clientWidth) / 2) - (parseInt(imgdiv.style.width) / 2) + 'px';
		//imgdiv.style.top = ( parseInt( document.body.scrollHeight ) / 2 ) - ( parseInt( imgdiv.style.height ) / 2 ) + 'px';
		//imgdiv.style.top = ( parseInt( document.documentElement.clientHeight ) / 2 ) - ( parseInt( imgdiv.style.height ) / 2 ) + 'px';
	}

	imgdiv = document.createElement("div");
	imgdiv.style.width = 400;
	imgdiv.style.height = 400;
	imgdiv.style.left = (parseInt(div.style.width) / 2) - (parseInt(imgdiv.style.width) / 2) + 'px';
	//imgdiv.style.top = ( parseInt( document.body.scrollHeight ) / 2 ) - ( parseInt( imgdiv.style.height ) / 2 ) + 'px';
	imgdiv.style.top = (parseInt(document.documentElement.clientHeight) / 2) - (parseInt(imgdiv.style.height) / 2) + 'px';
	imgdiv.style.position = "absolute";
	imgdiv.style.zIndex = 9999;
	imgdiv.style.display = "none";
	imgdiv.style.backgroundColor = "transparent";
	imgdiv.style.color = "#FFFFFF";
	document.body.appendChild(imgdiv);

	fm = document.createElement("iframe");
	fm.id = "iframe_pop";
	fm.style.width = "100%";
	fm.style.height = "100%";
	fm.allowTransparency = "true";
	fm.style.backgroundColor = "transparent";
	fm.frameBorder = "0";
	fm.style.margin = "0";
	imgdiv.appendChild(fm);

}


function showImg(_w, _h, _src) {
	if (div == null) {
		coverScreen("http://image.webzen.kr/Mu/v02/popup/back.html");
	}

	var pad_w = 30;
	var pad_h= 200;

    imgdiv.style.width = _w +pad_w+ 'px';
    imgdiv.style.height = _h +pad_h+ 'px';
	
	//console.log("pad_w:"+pad_w);
	//imgdiv.style.left = ( parseInt( document.documentElement.clientWidth ) / 2 ) - ( parseInt( imgdiv.style.width ) / 2 ) + 'px';
	imgdiv.style.left = (parseInt(document.documentElement.clientWidth) / 2) - (parseInt(imgdiv.style.width) / 2) + 'px';
	imgdiv.style.top = ((parseInt(document.documentElement.clientHeight) / 2) + (parseInt(document.body.scrollTop + document.documentElement.scrollTop))) - (parseInt(_h) / 2) + 'px';
	//imgdiv.style.top = ( parseInt( div.style.height ) / 2 ) - ( parseInt( imgdiv.style.height ) / 2 ) + ( parseInt( document.documentElement.scrollTop ) / 2 )+ 'px';
	fm.src = _src;
	div.style.display = "block";
	imgdiv.style.display = "block";
	//	div.document.body.onclick = function(){
	//		hideImg();
	//	}

}

function hideImg() {
	div.style.display = "none";
	imgdiv.style.display = "none";
	fm.src = "";
}


$(document).ready(function(){
	$.muwz.commonInit();
});