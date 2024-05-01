<!DOCTYPE html>
<!--[if lt IE 8]>
<html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]>
<html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="author" content="neo6 - Salvis87@inbox.lv"/>
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>"/>
    <meta property="og:image"
          content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/hover-min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/fonts.css" rel="stylesheet">
    <?php
        if(isset($css)):
            foreach($css as $style):
                echo $style;
            endforeach;
        endif;
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
    <?php
        if(isset($scripts)):
            foreach($scripts as $script):
                echo $script;
            endforeach;
        endif;
    ?>
</head>
<body>
<nav class="nav-main">
    <ul class="list-unstyled main-menu">
        <li class="active"><a href="<?php echo $this->config->base_url; ?>home"><?php echo _('News'); ?><span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo _('Registration'); ?></a></li>
        <li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo _('Files'); ?></a></li>
        <li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo _('Rankings'); ?></a></li>
        <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" role="button"><?php echo _('Forum'); ?></a></li>
        <li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
        <li><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo _('Vote'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About'); ?></a></li>
		<?php if($this->session->userdata(['user' => 'logged_in'])): ?>
		<li><a href="<?php echo $this->config->base_url; ?>account-panel" class="btn btn-primary"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/lock.png"  class="i-lock"><?php echo _('Account Panel'); ?></a></li>
		<?php else: ?>
		<li><a href="#" class="btn btn-primary cp-popup"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/lock.png"  role="button" class="i-lock"><?php echo _('Account Panel'); ?></a></li>
		<?php endif;?>
	</ul>
</nav>
<div class="jumbotron header" id="header">
    <div class="overlay">
        <!-- Navigation Menu Start -->
        <nav class="navbar navbar-default" id="navbar">
            <div class="navbar-overlay">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" id="nav-expander" class="nav-expander fixed"><?php echo _('Menu'); ?><img class="close" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/x.png"></a>
                    </div>
                    <div class="collapse navbar-collapse navi" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo $this->config->base_url; ?>home"><?php echo _('News'); ?><span class="sr-only">(current)</span></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo _('Registration'); ?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo _('Files'); ?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo _('Rankings'); ?></a></li>
							<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" role="button"><?php echo _('Forum'); ?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo _('Vote'); ?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About'); ?></a></li>
                        </ul>
						<?php if($this->session->userdata(['user' => 'logged_in'])): ?>
						<ul class="nav navbar-nav navbar-right hvr-fade">
                            <li><a href="<?php echo $this->config->base_url; ?>account-panel" class="btn btn-primary hvr-fade"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/lock.png" class="i-lock"><?php echo _('Account Panel'); ?></a></li>
                        </ul>
						<?php else: ?>
						<ul class="nav navbar-nav navbar-right cp-popup hvr-fade">
                            <li><a href="#" class="btn btn-primary hvr-fade"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/lock.png" class="i-lock"><?php echo _('Account Panel'); ?></a></li>
                        </ul>
						<?php endif;?>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
        </nav>
        <!-- Navigation Menu End -->
        <div class="container header-content">
			
            <div class="col-md-6">
                <a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" style="margin-left: -136px;" class="logo"></a>
				<?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
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
                <div class="row servers">
                    <div class="col-md-8">
						<?php
						$i = -1;
						foreach($this->website->check_server_status() as $key => $value):
							if($value['visible'] == 1):
								$i++;
								?>
								<div class="progress-overlay">
									<div id="progressbar-<?php echo $i;?>" class="progressbar">
										<span class="online_count" id="online<?php echo $i;?>"><?php echo $value['players']; ?></span>
										<p class="progressbar-text"><?php echo $value['status_with_style']; ?> <?php echo $value['title']; ?></p>						
									</div>
								</div>
								<script type="text/javascript">
								$(function() {
									var colors = ['#7FC51A', '#FF7B00'];
									var optsGradient = {
										from: { color: colors[0]},
										to: { color: colors[1]}
									};
									var optsBar = {
										color: colors[0],
										strokeWidth: 12.25,
										trailWidth: 0,
										duration: 0,
										easing: 'linear',
										text: {
											value: "",
											autoStyle: false
										}
									};
									var optsBarGradient = {
										color: colors[0],
										strokeWidth: 12.25,
										trailWidth: 0,
										duration: 0,
										easing: 'linear',
										text: {
											value: "",
											autoStyle: false
										},
										step: function(state, circle) {
											circle.path.setAttribute('stroke', state.color);
										}
									};

									var online<?php echo $i;?> = <?php echo $value['players']; ?>/200;
									var first = new ProgressBar.Circle('#progressbar-<?php echo $i;?>', optsBar);
									first.animate(online<?php echo $i;?>, function() {
										first.animate(online<?php echo $i;?>);
									});
								});
							</script>
						<?php 
							endif;
						endforeach;
						?>
					</div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 243px; margin-left: -216px;">
            </div>
        </div>
    </div>
</div>
<div class=" content">
    <div class="container">
        <div class="row">
		<div style="min-height: 1000px" class="col-lg-8 logo">