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
	<meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
	<meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
	<meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
	<meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon"
          href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet"
          href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css"
          type="text/css"/>
	<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style-new.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/animate.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/movingboxes.css">
<script type="text/javascript" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/animate.js"></script>
	<script type="text/javascript">
		new WOW().init();
	</script>
    <?php
    if (isset($css)):
        foreach ($css as $style):
            echo $style;
        endforeach;
    endif;
    ?>
    <script
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
    <script
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
    <?php
    if (isset($scripts)):
        foreach ($scripts as $script):
            echo $script;
        endforeach;
    endif;
    ?>
</head>
<body class="two-column1">
<div id="exception"></div>
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
	
	
<div class="header hide">
    <div class="bg-nav zoomIn wow" data-wow-delay="0s">
        <div class="main-width">
            <ul class="nav">
                <li><a href="<?php echo $this->config->base_url; ?>home"><div class="ico ico-home"></div><?php echo _('Home'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>registration"><div class="ico ico-register"></div><?php echo _('Register'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>downloads"><div class="ico ico-files"></div><?php echo _('Download'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>rankings"><div class="ico ico-about"></div><?php echo _('Rankings'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>donate"><div class="ico ico-donate"></div><?php echo _('Donate'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>about"><div class="ico ico-stat"></div><?php echo _('Statistics'); ?></a></li>
                <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" target="_blank"><div class="ico ico-forum"></div><?php echo _('Forum'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="languages">
<?php
                                                $languages = $this->website->lang_list();
												krsort($languages);
                                                $i = 0;
                                                foreach ($languages as $language => $flag):
                                                    $i++;
                                                    $padding = ($i == 1) ? '' : 'style="padding-left:5px"';
													if($_COOKIE['dmn_language'] == $language){
														echo '<a href="#" title="' . $flag . '" ' . $padding . ' class="f16"><span class="active flag ' . strtolower($flag). '"></span></a>' . "\n";
													} else {
														echo '<a href="#" id="lang_' . $language . '" title="' . $flag . '" ' . $padding . ' class="f16"><span class="nonactive flag ' . strtolower($flag). '"></span></a>' . "\n";
													}
                                                endforeach;
                                                ?>
          
    </div>

<div class="main">
    <div class="main-width">

        <div class="sidebar" style="float: left; margin-right: 20px;">
            <div class="control-panel zoomIn wow" data-wow-delay="0s">
                <div class="heading"><?php echo _('Server Time'); ?> <span id="ServerTime"></span></div>
                <div class="left-block">
                      <div class="servers" id="animates">
                
                                            





		<?php
					$i = 0;
					$online = 0;
        $max = 100;
        foreach($this->website->check_server_status() as $key => $value):
        	$online += $value['players']+112;
        endforeach;
        $percentage = floor(100 * $online / $max);
					foreach($this->website->check_server_status() as $key => $value):
						if($value['visible'] == 1){
							$info = ($value['image'] == 'on') ? array('Online', 'style="color: #DED124"') : array('Offline', 'style="color: #dd2424"');
						$i++;												
					?>
          <div class="status">
					<div class="server">
						<div class="name"> <span ><b><?php echo $value['title'];?></b></span></div>
						<div class="load"><div class="line" style="width:<?php echo $percentage;?>%"></div></div>
						<div class="l">
							
							<?php echo _('Status'); ?>:<span class="text"> <?php echo $info[0];?></span>
						</div>
						<div class="r">
							<?php echo _('In Game'); ?>
							<span>
								<div id="percent_online_0">
									<span class="percent_0"><?php echo $value['players'];?></span>
								</div>
							</span>
						</div>  
						                  
						<div class="clear"></div>
						<div class="server_line"></div>
					</div>
				</div>
          <?php
						}
					endforeach;
					?>
<div class="status"><div class="server">
     
                                                    <div class="name"> 
                                                        <span>
                                                        <b> <?php echo _('Total Online'); ?>:</b>
                                                            <div id="percent_online_0">
                                                                <span class="percent_0" style="color: #479706; font-weight: bold;"><?php echo $this->website->total_online(60)['online']*2;?></span>
                                                            </div>
                                                        </span></div>
                                                    
                                                     
                                                                      
                                                    <div class="clear"></div>

                            </div></div>


                </div>
        </div>
            </div>
			
			<?php if ($this->config->values('event_config', array('events', 'active')) == 1): ?>
			<div class="information zoomIn wow" data-wow-delay="0s">
                <div class="heading"><?php echo  _('Events'); ?></div>
                <div id="events"></div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        App.getEventTimes();
                    });
                </script>
			</div>
	<?php endif; ?>
			
          
<?php if($this->config->config_entry('modules|recent_forum_module') == 1): ?>
<div class="information zoomIn wow" data-wow-delay="0s">
                <div class="heading"><?php echo _('Recent Forum Topics'); ?></div>
                <div id="last-msg" class="as-block">



			<?php
				if($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), $this->config->config_entry('modules|recent_forum_rss_count'), $this->config->config_entry('modules|recent_forum_rss_cache_time'))){
					foreach($load_rss as $key => $rss):
						?>
						
						
						
						
						 <div class="msg">
        <div class="msg-ava">
        	
                <img id="ava_forum" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/forum-i.png" alt="">
        	
        </div>
       <a href="<?php echo $rss['link']; ?>"><?php echo $this->website->set_limit($rss['title'], 28, '..'); ?></a><br>
        <span class="clr">
        	            <?php echo _('Date'); ?> <?php echo date('d M Y H:i', strtotime($rss['pubDate'])); ?>
        </span>
    </div>
						<?php
					endforeach;				
				}
				else{
					echo '<div class="i_note">' . _('No Data') . '</div>';
				}
			?>
    <div style="clear: both;"></div>
    
    
</div>
            </div>
<?php endif;?>


            
   
 
        </div>
        <div class="content">

            <div class="quick-nav slideInUp wow" data-wow-delay="0s">
                <a href="<?php echo $this->config->base_url; ?>downloads"  style="background: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/btn-quickstart.png);background-size: cover; " class="btn-quickstart"></a>
                <a href="https://www.facebook.com/evomuonline/" style="background: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/btn-support.png);background-size: cover; " target="_blank" class="btn-support"></a>
                <a href="<?php echo $this->config->base_url; ?>donate" style="background: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/btn-donate.png);background-size: cover; " class="btn-donate"></a>
            </div>
           <div class=" slideInUp wow" data-wow-delay="0s"> 
<div class="list-news">
                                
<div class="news">
                    <div class="ncontent">
                           