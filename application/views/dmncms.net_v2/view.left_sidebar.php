<div class="content_left">
	<div class="game_servers">
    	<h2><?php echo _('Game Servers');?></h2>
        	<ul>
                <?php                   
                    foreach($this->website->check_server_status() as $key=>$server):   
                        if($server['image'] != 'off'):
                ?>
                <li>
                    <div class="game_servers_lft"><a href="#"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/server_<?php echo $key;?>.png" width="45" height="45" alt="game-img" /></a><h3><?php echo $server['title'];?></h3><span>ONLINE (<?php echo $server['players'];?>)</span><div class="clear"></div></div>
                    <div class="game_servers_rght"><a href="#"></a></div>
                    <div class="clear"></div>
                </li>
                <?php 
                    else:
                ?>
                 <li>
                    <div class="game_servers_lft"><a href="#"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/server_<?php echo $key;?>.png" width="45" height="45" alt="game-img" /></a><h3><?php echo $server['title'];?></h3><span style="color:red;">OFFLINE</span><div class="clear"></div></div>
                    <div class="game_servers_rght_off"><a href="#"></a></div>
                    <div class="clear"></div>
                </li>
                <?php
                endif;
                endforeach; 
                ?>
        		
    		</ul>
 	</div>
	<?php
	if ($this->session->userdata(array('user' => 'logged_in'))):
		$credits = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 1, $this->session->userdata(array('user' => 'id')));
		$credits2 = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 2, $this->session->userdata(array('user' => 'id')));
	?>
	<ul class="style4">
		<li class="first" style="text-align: center;"><?php echo _('Welcome'); ?>, <?php echo $this->session->userdata(array('user' => 'username')); ?></li>
		<li class="first" style="text-align: center;">
			<a href="<?php echo $this->config->base_url; ?>account-panel"><img class="avatar_frame" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/avatar.jpg"/></a>
		</li>
		<li><?php echo _('Current Server'); ?>:
			<span><?php echo $this->session->userdata(array('user' => 'server_t')); ?> <img
					data-modal-div="select_server"
					src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/switch.png"
					style="width: 13px;cursor: pointer;"/></span></li>
		<li class="w-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?>
			: <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></li>
		<li class="zz-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_2'); ?>
			: <span id="my_gold_credits"><?php echo number_format($credits2['credits']); ?></span></li>
		<?php
			if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1):
				$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server')));
		?>
		<li style="font-weight:bold;"><?php echo _('My'); ?> <?php echo _('WCoins'); ?>
			: <span id="my_credits"><?php echo number_format($wcoin); ?></span></li>
		<?php endif;?>
		<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a></li>
		<li><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a></li>
		<?php 
		$plugins = $this->config->plugins();
		if(!empty($plugins)):
			foreach($plugins AS $plugin):
				if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1):
		?>
			<li><a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a></li>
		<?php
			endif;
		endforeach;
		endif;
		?>
		<li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a> <span style="float:right;"><a style="text-decoration:underline" href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a></span></li>
	</ul>	
	<?php
	endif;
	?>
	<div class="side_menu">
    	<h2><?php echo _('Information'); ?></h2>
        <ul>
			<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About Server'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo _('Rules'); ?></a></li>
			<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" target="_blank"><?php echo _('Forum'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Donate'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>rankings/gm-list"><?php echo _('GM List'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>rankings/ban-list"><?php echo _('Ban List'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo _('Guides'); ?></a></li>
			<li><a href="<?php echo $this->config->base_url; ?>support"><?php echo _('Contact Us'); ?></a></li>
			<?php 
			$plugins = $this->config->plugins();
			if(!empty($plugins)):
				foreach($plugins AS $plugin):
					if($plugin['installed'] == 1 && $plugin['sidebar_public_item'] == 1):
			?>
				<li><a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a></li>
			<?php
				endif;
			endforeach;
			endif;
			?>
		</ul>
 	</div>
    <?php 
		$ranking_config = $this->config->values('rankings_config');
		$server_list = $this->website->server_list();
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Players').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
								});
								</script>
								<div id="top_players"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['player']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}
							
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Guilds').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \''.$srv.'\', '.$data['guild']['count_in_sidebar'].');
								});
								</script>
								<div id="top_guilds"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['guild'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_guilds_'.$key.'" data-count="'.$ranking_config[$key]['guild']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['voter']) && $data['voter']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Voters').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'votereward\', \''.$srv.'\', '.$data['voter']['count_in_sidebar'].');
								});
								</script>
								<div id="top_votereward"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['voter'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_votereward_'.$key.'" data-count="'.$ranking_config[$key]['voter']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}						
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['killer']) && $data['killer']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Killers').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'killer\', \''.$srv.'\', '.$data['killer']['count_in_sidebar'].');
								});
								</script>
								<div id="top_killer"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['killer'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_killer_'.$key.'" data-count="'.$ranking_config[$key]['killer']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['online']) && $data['online']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Online').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'online\', \''.$srv.'\', '.$data['online']['count_in_sidebar'].');
								});
								</script>
								<div id="top_online"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['online'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_online_'.$key.'" data-count="'.$ranking_config[$key]['online']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['bc']) && $data['bc']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top BC').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'bc\', \''.$srv.'\', '.$data['bc']['count_in_sidebar'].');
								});
								</script>
								<div id="top_bc"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['bc'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_bc_'.$key.'" data-count="'.$ranking_config[$key]['bc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['ds']) && $data['ds']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top DS').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'ds\', \''.$srv.'\', '.$data['ds']['count_in_sidebar'].');
								});
								</script>
								<div id="top_ds"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['ds'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_ds_'.$key.'" data-count="'.$ranking_config[$key]['ds']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['cc']) && $data['cc']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top CC').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'cc\', \''.$srv.'\', '.$data['cc']['count_in_sidebar'].');
								});
								</script>
								<div id="top_cc"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['cc'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_cc_'.$key.'" data-count="'.$ranking_config[$key]['cc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){
					echo '<div class="characters_main">
							<h2>'._('Top Duelers').'</h2>
							<ul id="top_sidebar">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'duels\', \''.$srv.'\', '.$data['duels']['count_in_sidebar'].');
								});
								</script>
								<div id="top_duels"></div>
							</ul>
							<span style="float:right;margin-right:28px;margin-top:5px">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['duels'])){
										echo '<a style="color:#d6d58c;" href="#" id="switch_top_duels_'.$key.'" data-count="'.$ranking_config[$key]['duels']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
								if(end($server_list) !== $server){
									echo '<span style="color:#f40b37;"> | </span>';
								}
							}	
					echo '</span><br /><br />
							<div class="more">               
							<a href="'.$this->config->base_url.'rankings">'._('More rankings').'</a>
						</div></div>';					
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		
	?>
	<?php if ($this->config->config_entry('modules|last_market_items_module') == 1): ?>
    <div class="latestforum_main">
    	<h2><?php echo _('Market'); ?></h2>
		<?php
		if ($this->session->userdata(array('user' => 'logged_in'))):
			$server = $this->session->userdata(array('user' => 'server'));
		else:
			$server = array_keys($this->website->server_list())[0];
		endif;
		?>				
		<script>
		$(document).ready(function () {
			App.loadLatestItems('<?php echo $server;?>', <?php echo $this->config->config_entry('modules|last_market_items_count');?>, 20);
		});
		</script>
		<ul id="lattest_items"></ul>
		<span style="float:right;margin-right:28px;margin-top:5px">
		<?php
		foreach ($server_list as $key => $server){
			if ($server['visible'] == 1  && isset($ranking_config[$key])){
					echo '<a style="color:#d6d58c;" id="switch_items_'.$key.'" href="#" data-count="'.$this->config->config_entry('modules|last_market_items_count').'" data-limit="20">'.$server['title'].'</a> ';
			}
			if(end($server_list) !== $server){
				echo '<span style="color:#f40b37;"> | </span>';
			}
		}	
        ?> 
		</span>
		<br /><br />	
 	</div>
    <?php endif; ?>
	<?php if ($this->config->values('event_config', array('events', 'active')) == 1): ?>
	<div class="latestforum_main">
    	<h2><?php echo  _('Events'); ?></h2>
        <div id="events"></div>
		<script type="text/javascript">
			$(document).ready(function () {
				App.getEventTimes();
			});
		</script>    
 	</div> 
    <?php endif; ?>
    <?php if($this->config->config_entry('modules|recent_forum_module') == 1): ?>   
    <div class="latestforum_main">
    	<h2><?php echo _('Recent Forum Topics'); ?></h2>
            <?php 
            if($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), $this->config->config_entry('modules|recent_forum_rss_count'), $this->config->config_entry('modules|recent_forum_rss_cache_time'))){
            ?>
        	<ul>
                <?php
                foreach($load_rss as $key => $rss): 
                ?>  
                   <li>
                    <div class="latestforum"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/ball_icon.png" width="38" height="38" alt="game-img" /><h3><a href="<?php echo $rss['link'];?>"><?php echo $this->website->set_limit($rss['title'], 40, '..');?></a></h3><span>Posted <?php echo date('d-m-Y, H:i', strtotime($rss['pubDate']));?></span><div class="clear"></div></div><div class="clear"></div>
                </li>
                <?php 
                endforeach; 
                ?>
    		</ul>
            <?php
            }
            else{
                echo '<span style="padding-left:20px;color:#d6d58c;">'._('No Data').'</span>';
            }
            ?>
 	</div>
    <?php endif; ?>
    <div class="shape2"></div>  
</div>
<div class="content_rght">
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.lattest_guides_list');
?>