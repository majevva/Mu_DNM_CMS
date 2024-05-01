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
<div id="wrapper">
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
    <div id="wrapper-bgtop">
        <div id="wrapper-bgbtm">
            <div
                style="background: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/wrapper-bgimg.jpg) no-repeat center top;">
                <div id="logo-wrapper">
                    <div id="logo" class="container">
                    </div>
                </div>
                <div id="menu-wrapper">
                    <div id="menu" class="container">
                        <nav>
                            <ul class="nav">
                                <li><a href="<?php echo $this->config->base_url; ?>home"
                                       title="<?php echo _('News'); ?>"><?php echo _('News'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->base_url; ?>registration"
                                       title="<?php echo _('Registration'); ?>"><?php echo _('Registration'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->base_url; ?>downloads"
                                       title="<?php echo _('Files'); ?>"><?php echo _('Files'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->base_url; ?>rankings"
                                       title="<?php echo _('Rankings'); ?>"><?php echo _('Rankings'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"
                                       title="<?php echo _('Forum'); ?>"
                                       target="_blank"><?php echo _('Forum'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->base_url; ?>shop"
                                       title="<?php echo _('Shop'); ?>"><?php echo _('Shop'); ?></a>
                                </li>
                                <li><a href="<?php echo $this->config->base_url; ?>vote-reward"
                                       title="<?php echo _('Vote'); ?>"><?php echo _('Vote'); ?></a>
                                </li>
                                <li><a href="#"><?php echo _('Media'); ?></a>
                                    <ul class="effect">
                                        <li>
                                            <a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo _('Wallpapers'); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->config->base_url; ?>media/screenshots"><?php echo _('Screen Shots'); ?></a>
                                        </li>
                                    </ul>
                                </li>
								<?php 
								$plugins = $this->config->plugins();
								if(!empty($plugins)):
									foreach($plugins AS $plugin):
										if($plugin['installed'] == 1 && $plugin['main_menu_item'] == 1):
								?>
									<li><a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a></li>
								<?php
									endif;
								endforeach;
								endif;
								?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="page-wrapper">
                    <div id="page-bgtop">
                        <div id="page-bgbtm">
                            <div id="page" class="container">
                                <div id="banner">
                                    <div id="col1">
                                        <div class="promRoundBox"></div>
                                        <ol class="items">
                                            <li class="item">
                                                <span
                                                    onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-1.jpg')"></span>
                                                <img
                                                    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-1.jpg"
                                                    alt=""/>
                                            </li>
                                            <li class="item">
                                                <span
                                                    onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-2.jpg')"></span>
                                                <img
                                                    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-2.jpg"
                                                    alt=""/>
                                            </li>
                                            <li class="item">
                                                <span
                                                    onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-3.jpg')"></span>
                                                <img
                                                    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-3.jpg"
                                                    alt=""/>
                                            </li>
                                        </ol>
                                        <div class="rollingIconWrap">
                                            <div class="bgFirst"></div>
                                            <div class="rollingIcon">
                                                <button type="button" data-pic="0" name="#" class="active"></button>
                                                <button type="button" data-pic="1" name="#"></button>
                                                <button type="button" data-pic="2" name="#"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="col2">
                                        <table class="info-button">
                                            <tr>
                                                <?php
                                                $i = -1;
												$select_server = 0;												
                                                foreach ($this->website->check_server_status() as $key => $value):
                                                    if ($value['visible'] == 1) {
                                                        $i++;
														if($this->session->userdata(array('user' => 'logged_in'))):
															if($this->session->userdata(array('user' => 'server')) == $value['server']):
																$select_server = $i;		
															endif;
														endif;
                                                        ?>
                                                        <td onclick="App.changeServerInfo(<?php echo $i; ?>);"
                                                            id="sButton-<?php echo $i; ?>">
                                                            <?php echo $value['title']; ?>
                                                            <div id="online-<?php echo $i; ?>" style="display: none;"
                                                                 data-server="<?php echo $value['server']; ?>"><?php echo $value['players']; ?></div>
                                                            <div id="status-<?php echo $i; ?>" style="display: none;"
                                                                 data-server="<?php echo $value['server']; ?>"><?php echo $value['status_with_style']; ?></div>
                                                            <div id="version-<?php echo $i; ?>" style="display: none;"
                                                                 data-server="<?php echo $value['server']; ?>"><?php echo $value['version']; ?></div>
                                                        </td>
                                                        <?php
                                                    }
                                                endforeach;
                                                ?>
												<script>
												$(document).ready(function () {
													App.changeServerInfo(<?php echo $select_server;?>);
												});
												</script>
                                            </tr>
                                        </table>
                                        <p><?php echo _('Status'); ?>:<span
                                                id="sStatus">&nbsp;</span></p>

                                        <p><?php echo _('In Game'); ?>:<span
                                                id="sOnline">&nbsp;</span></p>                                     
                                        <p><?php echo _('Top Player'); ?>:<a
                                                id="sPlayerLink" href="#"><span id="sPlayer">&nbsp;</span></a></p>

                                        <p><?php echo _('Top Guild'); ?>:<a
                                                id="sGuildLink" href="#"><span id="sGuild">&nbsp;</span></a></p>

                                        <p><?php echo _('Server Time'); ?>
                                            :<span id="ServerTime">&nbsp;</span></p>

                                        <p><?php echo _('Language'); ?>:
											<span>
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
											</span>
                                        </p>
                                    </div>
                                </div>