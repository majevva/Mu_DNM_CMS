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
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/menu.css" type="text/css"/>
    <?php
    if (isset($css)):
        foreach ($css as $style):
            echo $style;
        endforeach;
    endif;
    ?>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
    <?php
    if (isset($scripts)):
        foreach ($scripts as $script):
            echo $script;
        endforeach;
    endif;
    ?>
</head>
<body>
	<div id="exception"></div>
	<section class="gnb_one_wrp game_gnb">
		<div class="gnb_one_bx">
			<span class="gnb_logo"></span>
			<nav>
				<ul class="menu">
					<li><a href="#" class="game" id="game_menu" rel="" data-menu="pull_server_list" data-dropdown="true"><?php echo mb_strtoupper(_('Server'), 'utf-8'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo mb_strtoupper(_('Shop'), 'utf-8'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo mb_strtoupper(_('Market'), 'utf-8'); ?></a></li>
					<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" target="_blank"><?php echo mb_strtoupper(_('Forum'), 'utf-8'); ?></a></li>
				</ul>
			</nav>
			<article class="user_conect_wrp">
				<div class="user_conect">
					<?php
						if ($this->session->userdata(array('user' => 'logged_in'))):
					?>
					<ul class="user_join_after">
						<li class="tit">
							<a href="#" class="join" style="cursor:pointer" id="user_menu" data-menu="pull_user_menu" data-dropdown="true"><?php echo $this->session->userdata(array('user' => 'username')); ?></a>
							<div class="pulldown_user_link" id="pull_user_menu" style="display: none;">
								<div>
									<a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo mb_strtoupper(_('Account Panel'), 'utf-8'); ?></a>
									<a href="<?php echo $this->config->base_url; ?>settings"><?php echo mb_strtoupper(_('Settings'), 'utf-8'); ?></a>
									<a href="<?php echo $this->config->base_url; ?>support/my-tickets"><?php echo mb_strtoupper(_('View My Tickets'), 'utf-8'); ?></a>
									<a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo mb_strtoupper(_('Account Logs'), 'utf-8'); ?></a>
									<a href="<?php echo $this->config->base_url;?>logout"><?php echo mb_strtoupper(_('Logout'), 'utf-8'); ?></a>
								</div>
							</div>
						</li>
					</ul>
					<?php else:?>
					<div class="user_join_before">
						<a href="#" class="loginx" data-modal-div="login_box"><?php echo mb_strtoupper(_('Login'), 'utf-8'); ?></a>
						<a href="<?php echo $this->config->base_url;?>registration" class="registerx"><?php echo mb_strtoupper(_('Registration'), 'utf-8'); ?></a>
					</div>                                 
					<?php endif;?>
				</div>		
				<div class="lang">
					<ul class="list">
						<li class="tit">
							<a href="#" class="lang_tit" id="language_menu" data-menu="pull_language_list" data-dropdown="true"><?php echo mb_strtoupper($this->website->iso_to_lang(explode('_', $_COOKIE['dmn_language'])[0], $_COOKIE['dmn_language']), 'utf-8');?></a>
							<div class="pulldow_lang_link" id="pull_language_list" style="display: none;">
								<?php
								$languages = $this->website->lang_list();
								krsort($languages);
								foreach ($languages as $language => $flag):
									if($language != $_COOKIE['dmn_language'])
										echo '<a href="#" id="lang_' . $language . '" rel="">' . mb_strtoupper($this->website->iso_to_lang(explode('_', $language)[0], $language), 'utf-8') . '</a>';
								endforeach;
								?>
							</div>
						</li>
					</ul>
				</div>
			</article>
		</div>
		<div class="game_list_wrp">
			<div class="game_list_bx" id="pull_server_list" style="display: none;">
				<div class="game_list">
					<dl class="pc-list">
						<dt><?php echo _('Select Server'); ?></dt>
						<dd>
							<ul>
								<?php            
								$i=0;
								foreach($this->website->check_server_status() as $key=>$server):   
									if($server['image'] != 'off'):
								?>
								<li>
									<a href="#" data-modal-div="select_server"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/server_<?php echo $key;?>.png"><span></span><strong align="center"><?php echo $server['title'];?></strong></a>
								</li>
								<?php 
									else:
								?>
								 <li>
									<a href="#" data-modal-div="select_server"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/server_<?php echo $key;?>.png"><span></span><strong align="center"><?php echo $server['title'];?></strong></a>
								</li>
								<?php
								endif;
								$i++;
								endforeach; 
								?>
							</ul>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</section>
    <?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
	<!-- Coming Soon DMNCMS 1.1.5 -->
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
	<div id="warpper">
		<div id="header">
			<div id="header-side1">
				<div id="server-margin"></div>	
				<?php   
				$id = -1;
				$server_list = $this->website->check_server_status();
				foreach($server_list as $key => $server):   
					if(!$key % 2):
					unset($server_list[$key]);
					$id++;
					if($server['image'] != 'off'):
				?>						
					<div id="server-<?php echo $id;?>">
						<div id="server-name-left"><?php echo $server['title'];?></div>
						<div id="server-name-left-online"><?php echo $server['status_with_style'];?> (<?php echo $server['players'];?>)</div>
					</div>					
				<?php 
					else:
				?>
				<div id="server-<?php echo $id;?>">
					<div id="server-name-left"><?php echo $server['title'];?></div>
					<div id="server-name-left-online"><?php echo $server['status_with_style'];?></div>
				</div>
				<?php
					endif;
					endif;
				endforeach; 
				?>
			</div>				
			<div id="header-side2">
				<div id="server-margin-online"></div>
				<div id="total-online">
					<div id="total-online-players"><?php echo _('Total Online');?></div>
					<div id="online-count"><?php echo $this->website->total_online(60)['online'];?></div>
				</div>
			</div>
			<div id="header-side3">
				<div id="server-margin"></div>	
				<?php   
				$id = 1;		
				foreach($server_list as $key => $server):   					
					$id++;
					if($server['image'] != 'off'):
				?>						
					<div id="server-<?php echo $id;?>">
						<div id="server-name-right"><?php echo $server['title'];?></div>
						<div id="server-name-right-online"><?php echo $server['status_with_style'];?> (<?php echo $server['players'];?>)</div>
					</div>					
				<?php 
					else:
				?>
				<div id="server-<?php echo $id;?>">
					<div id="server-name-right"><?php echo $server['title'];?></div>
					<div id="server-name-right-online"><?php echo $server['status_with_style'];?></div>
				</div>
				<?php
					endif;
				endforeach; 
				?>	
			</div>	
		</div>
		<div id="navigation">
			<div id="menu" class="container">	
				<nav>
					<ul class="nav">
						<li><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo _('News'); ?>"><?php echo _('News'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo _('Registration'); ?>"><?php echo _('Registration'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo _('Downloads'); ?>"><?php echo _('Downloads'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo _('Rankings'); ?>"><?php echo _('Rankings'); ?></a></li>
						<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo _('Forum'); ?>" target="_blank"><?php echo _('Forum'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo _('Shop'); ?>"><?php echo _('Shop'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo _('Vote'); ?>"><?php echo _('Vote'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo _('Guides'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About'); ?></a></li>	
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
		<div id="sides">
			<div id="content-sides">
				<div id="content-small">