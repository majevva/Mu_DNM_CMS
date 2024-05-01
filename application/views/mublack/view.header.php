<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]><html lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="author" content="neo6 - Salvis87@inbox.lv" />
	<meta name="keywords" content="<?php echo $this->meta->request_meta_keywords();?>" />
	<meta name="description" content="<?php echo $this->meta->request_meta_description();?>" />
	<title><?php echo $this->meta->request_meta_title();?></title>
	<link rel="shortcut icon" href="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/favicon.ico" /> 
	<link rel="stylesheet" href="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/css/style.css?v5" type="text/css" />
	<?php
		if(isset($css)):
			foreach($css as $style):
				echo $style;
			endforeach;
		endif;
	?>
	<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/js/jquery-ui.min.js"></script>
	<?php
		if(isset($scripts)):
			foreach($scripts as $script):
				echo $script;
			endforeach;
		endif;
	?>
</head>
<body>
<section class="gnb_one_wrp game_gnb">	
<div class="gnb_one_bx">		
<a href="#" class="gnb_logo" rel=""><span class="none">WEBZEN</span></a>		
<nav>			
<ul class="menu">						
<li><a href="<?php echo $this->config->base_url;?>vote-reward" class="game" rel=""><?php echo __('Vote');?></a></li>			
</ul>		
</nav>        
<article class="user_conect_wrp">		    
<div class="user_conect">			
<div class="user_join_before">				
<?php
	$languages = $this->website->lang_list();
	krsort($languages);
	$i = 0;
	foreach($languages as $language => $flag):
		$i++;
		$padding = ($i == 1) ? '' : 'style="padding-left:5px"';
		if($_COOKIE['dmn_language'] == $language){
			echo '<a href="#" title="' . $flag . '" ' . $padding . ' class="f16"><span class="active flag ' . strtolower($flag) . '"></span></a>' . "\n";
		}
		else{
			echo '<a href="#" id="lang_' . $language . '" title="' . $flag . '" ' . $padding . ' class="f16"><span class="nonactive flag ' . strtolower($flag) . '"></span></a>' . "\n";
		}
	endforeach;
?>
</div>		    </div>		    

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
			<li><a href="#" class="sp_sns twt" target="_blank" rel="nofollow">Twitter</a></li>
			<li><a href="#" class="sp_sns face" target="_blank" rel="nofollow">Facebook</a></li>
			<li><a href="#" class="sp_sns tube" target="_blank" rel="nofollow">Youtube</a></li>
			<li><a href="#" class="sp_sns wikia" target="_blank" rel="nofollow">wikia</a></li>
		</ul>
	</div>
</div>
<div class="lnb_wrp">
	<div class="lnb_bx" >
		<div class="lnb_logo"><a href="<?php echo $this->config->base_url;?>">MUOnline</a></div>
		<!-- s:starter -->
		<aside class="starter_wrp">
			<a href="<?php echo $this->config->base_url;?>downloads"><button type="button" class="btn_starter">
				<strong class="blind">DOWNLOAD</strong>
				<span class="front"></span>
				<span class="back02"></span>
				<span class="back03"></span>
				<span class="back04"></span>
				<span class="back05"></span>
				<span class="back06"></span>
				<span class="back07"></span>
				<span class="back08"></span>
				<span class="back09"></span>
				<span class="back10"></span>
				<span class="back11"></span>
			</button></a>
		</aside>
		
<nav class="lnb_nav" id="GameNavi">
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>home" rel="" class=""><strong><?php echo __('News');?></strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>registration" rel="" class=""><strong><?php echo __('Registration');?></strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>downloads" rel="" class=""><strong><?php echo __('Files');?></strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->base_url;?>rankings" rel="" class=""><strong><?php echo __('Rankings');?></strong></a></h2></div>
<div class="menu_list"><h2><a href="<?php echo $this->config->config_entry('main|forum_url');?>" rel="" class=""><strong><?php echo __('Forum');?></strong></a></h2></div>

         </nav>
	</div>
</div>
<article class="promotion_wrp">
            <div class="promotion_bx">
            <div id="banner">
									<div id="col1">
										<div class="promRoundBox"></div>
										<ol class="items">
											<li class="item">
												<span onclick="App.tooltipImageShow('<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/1.png')"></span>
												<img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/1.png" alt=""  />
											</li>
											<li class="item">
												<span onclick="App.tooltipImageShow('<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/2.png')"></span>
												<img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/2.png" alt=""  />
											</li>
											
										</ol>
										<div class="rollingIconWrap">
											<div class="bgFirst"></div>
											<div class="rollingIcon">
												<button type="button" data-pic="0" name="#" class="active"></button>
												<button type="button" data-pic="1" name="#"></button>
												
											</div>
										</div>
									</div>					
																
								</div>
            </div>
            <div class="promotion_title_box">
				<?php
				$status = $this->website->check_server_status();
				$i = -1;
				$select_server = 0;
				if($status != false):
				?>
				<table class="info-button">
					<tr>
						<?php
							foreach($status as $key => $value):
								if($value['visible'] == 1){
									$i++;
									if($this->session->userdata(['user' => 'logged_in'])):
										if($this->session->userdata(['user' => 'server']) == $value['server']):
											$select_server = $i;
										endif;
									endif;
									?>
									<td onclick="App.changeServerInfo(<?php echo $i; ?>);" id="sButton-<?php echo $i; ?>">
										<?php echo $value['title']; ?>
										<div id="online-<?php echo $i; ?>" style="display: none;" data-server="<?php echo $value['server']; ?>"><?php echo $value['players']; ?></div>
										<div id="status-<?php echo $i; ?>" style="display: none;" data-server="<?php echo $value['server']; ?>"><?php echo $value['status_with_style']; ?></div>
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
				<p style="font-family: 'Ebrima';font-size: 13px;color: #FFFFFF;text-transform: uppercase;text-shadow: 1px 1px 1px rgba(0,0,0,.45), 0 0 5px rgba(0,0,0,.95);padding: 3px; font-weight: normal;margin-left: 30px;"><?php echo __('Status');?> : <span id="sStatus">&nbsp;</span></p>
				<p style="font-family: 'Ebrima';font-size: 13px;color: #FFFFFF;text-transform: uppercase;text-shadow: 1px 1px 1px rgba(0,0,0,.45), 0 0 5px rgba(0,0,0,.95);padding: 3px; font-weight: normal;margin-left: 30px;"><?php echo __('Top Players');?> : <a id="sPlayerLink" href="#"><span id="sPlayer">&nbsp;</span></a></p>
				<p style="font-family: 'Ebrima';font-size: 13px;color: #FFFFFF;text-transform: uppercase;text-shadow: 1px 1px 1px rgba(0,0,0,.45), 0 0 5px rgba(0,0,0,.95);padding: 3px; font-weight: normal;margin-left: 30px;"><?php echo __('Top Guilds');?> : <a id="sGuildLink" href="#"><span id="sGuild">&nbsp;</span></a></p>	
				<p style="font-family: 'Ebrima';font-size: 13px;color: #FFFFFF;text-transform: uppercase;text-shadow: 1px 1px 1px rgba(0,0,0,.45), 0 0 5px rgba(0,0,0,.95);padding: 3px; font-weight: normal;margin-left: 30px;"><?php echo __('Server Time');?> : <span id="ServerTime">&nbsp;</span></p>
				<?php endif;?>
			</div>
</article>
<div class="site_line_wrp">
	<div class="contents_wrp">        
		<article class="contents_area_wrp">
			<aside class="banner_main">
					<a href="<?php echo $this->config->base_url; ?>vote-reward"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/images/register.png" style="width:240px;height:72px" alt=""></a>
					<a href="<?php echo $this->config->base_url; ?>registration"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/images/donate.png" style="width:240px;height:72px" alt=""></a>
					<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>//images/forums.png" style="width:240px;height:72px" alt=""></a>
			</aside>

