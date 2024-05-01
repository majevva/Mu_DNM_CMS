<!DOCTYPE html>
<!--[if lt IE 8]>
<html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]>
<html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="author" content=""/>
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <title><?php echo $this->meta->request_meta_title(); ?></title>
	  <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style-2.css" rel="stylesheet">
	  <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/engine.css" rel="stylesheet">
	  <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/color-salat.css" rel="stylesheet">
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
<link rel="shortcut icon"
          href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet"
          href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css"
          type="text/css"/>
		  	<link href='https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700' rel='stylesheet' type='text/css'>

<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery.bxslider.min_4.1.2.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/select.js"></script>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/ui.js"></script>
 

    <style type="text/css">
        .floating_wrp {position:absolute;left:50%;width:960px;margin-left:-480px;z-index:2000;}
        .floating_bx {position:relative;width:152px;height:207px;position:absolute;right:0;top:0;background:url('http://image.webzen.kr/n_portal/event/20160330_mulegend_cbt/floating_legend_open.png') no-repeat;}
        .floating_bx a {display:block;position:absolute;font-size:0;line-height:0;}
        .floating_bx a.job_close {width:27px;height:27px;right:20px;top:8px;background:url('/n_portal/event/20150408_origin/floating_close.png') no-repeat;z-index:2010;}
        .floating_bx a.job_ban {width:152px;height:207px;z-index:2001;}
        
        .floating_wrp.mu {width:1140px;margin-left:-570px;}
        .floating_wrp.mu .floating_bx {right:-14px;top:122px;}
        .floating_wrp.mu .floating_bx a.job_close {}
        .floating_wrp.mu .floating_bx a.job_ban:hover {}
    </style>
	
</head>
<body id="game_code_a2">
<?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
        <div id="timer_div_title"><?php echo $this->config->config_entry("main|grand_open_timer_text"); ?></div>
        <div id="timer_div_time">
            <div class="timmer_inner_block">
                <div class="title"><?php echo _('Days'); ?></div>
                <div id="days" class="count"></div>
            </div>
            <div class="timmer_inner_block">
                <div class="title"><?php echo _('Hours'); ?></div>
                <div id="hours" class="count"></div>
            </div>
            <div class="timmer_inner_block">
                <div class="title"><?php echo _('Minutes'); ?></div>
                <div id="minutes" class="count"></div>
            </div>
            <div class="timmer_inner_block">
                <div class="title"><?php echo _('Seconds'); ?></div>
                <div id="seconds" class="count"></div>
            </div>
        </div>
    <?php endif; ?>
<section class="gnb_one_wrp game_gnb">	
<div class="gnb_one_bx">		
<nav>			
<ul class="menu">				
<li><a href="<?php echo $this->config->base_url;?>donate" class="game" rel="">Donate</a></li>				
<li><a href="<?php echo $this->config->base_url;?>vote-reward" class="game" rel="">Vote</a></li>			
</ul>		
</nav>        
<article class="user_conect_wrp">		    
<div class="user_conect">			
<div class="user_join_before">
	<span class="stime" id="ServerTime"></span>
</div>
</div>		    
</article>
</div>
</section>
    <header id="g_header_bar"></header>
    <section class="main_roll_wrp">
<div class="visual_wrp">
<div class="visual_view">
		<!-- s:GMT -->

		<!-- e:GMT -->
		<ul class="sns_wrap">
			<li><a href="https://www.facebook.com/" class="sp_sns face" target="_blank" rel="nofollow">Facebook</a></li>
		</ul>
	</div>
</div>
<div class="lnb_wrp">
	<div class="lnb_bx" >
		<div class="lnb_logo"><a href="<?php echo $this->config->base_url;?>">MUOnline</a></div>
		<!-- s:starter -->
		<aside class="starter_wrp">
			<a href="<?php echo $this->config->base_url;?>downloads"><button type="button" class="btn_starter">
				<span class="front"></span>
				<span class="back02"></span>
				<span class="back03"></span>
				<span class="back04"></span>

			</button></a>
		</aside>
		
<nav class="lnb_nav" id="GameNavi">
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>home" rel="" class=""><strong>Home</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>registration" rel="" class=""><strong>Registration</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>downloads" rel="" class=""><strong>Files</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>rankings" rel="" class=""><strong>Rankings</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>market" rel="" class=""><strong>Market</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>rules" rel="" class=""><strong>Rules</strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->config_entry('main|forum_url');?>" rel="" class=""><strong>Forums</strong></a></h2></div>

         </nav>
	</div>
</div>
<?php if($this->config->values('event_config', ['events', 'active']) == 1): ?>
<span class="eventsbtn" onclick="App.openEventBox();"></span><div id="eventsSidenav" class="sidenav"><div id="events"></div><script type="text/javascript">	$(document).ready(function () {		App.getEventTimes();	});</script><a href="javascript:void(0)" class="closebtn" onclick="App.closeEventBox();"></a></div><?php endif;?>


        <div class="site_line_wrp">
	    <!-- s:category contents -->
	        <div class="contents_wrp">
               
<article class="contents_area_wrp">

<Div></div>
