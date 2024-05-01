</div>
</div>
<div id="mods-sides">
	<?php if ($this->config->config_entry('modules|last_market_items_module') == 1): ?>
	<div id="item-market">	
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
		<div id="lattest_items"></div>				
		<div id="market-servers">
		<?php
		foreach ($this->website->server_list() as $key => $server):
			if ($server['visible'] == 1):
				?>
				<a href="#" id="switch_items_<?php echo $key; ?>" data-count="<?php echo $this->config->config_entry('modules|last_market_items_count');?>" data-limit="20"><?php echo $server['title']; ?></a>
				<?php
			endif;
		endforeach;
		?>
		</div>
	</div>
	<?php endif; ?>
	<div id="sides-acp-top">
		<div><?php echo $this->website->fb_login(); ?></div>
		<div id="top-s1">
			<div id="sides-top"><?php echo _('Account Panel'); ?></div>
			<div id="sides-content">
				<?php
				if ($this->session->userdata(array('user' => 'logged_in'))):
					$credits = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 1, $this->session->userdata(array('user' => 'id')));
					$credits2 = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 2, $this->session->userdata(array('user' => 'id')));
				?>
				<div style="padding:10px;">
					<div class="title" style="font-size: 11px; "><font color="gold"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?> : <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></font></div>
					<div class="title" style="font-size: 11px; "><font color="gold"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_2'); ?> : <span id="my_gold_credits"><?php echo number_format($credits2['credits']); ?></span></font></div>
					<?php if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1): $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server'))); ?>
					<div class="title" style="font-size: 11px; "><font color="gold"><?php echo _('WCoins'); ?> <span id="my_credits"><?php echo number_format($wcoin); ?></span></font></div>
					<?php endif;?>
					<a  href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a><br>			
					<a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a><br>
					<a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a><br>
					<a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a><br>
					<a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a><br>
					<a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a><br>
					<?php 
					$plugins = $this->config->plugins();
					if(!empty($plugins)):
						foreach($plugins AS $plugin):
							if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1):
					?>
						<a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a>
					<?php
						endif;
					endforeach;
					endif;
					?>
					<a href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a><br>
				</div>
				<?php
				else:
				?>
				<div style="text-align:center;margin-top:10px;">				
					<form id="login_form" method="post" action="<?php echo $this->config->base_url; ?>">
						<input type="text" name="username" placeholder="<?php echo _('Username'); ?>" id="login_input" maxlength="10" class="txtfield" value="">
						<input type="password" name="password" placeholder="<?php echo _('Password'); ?>" id="password_input" maxlength="20" class="txtfield" value="">
						<div><input type="submit" name="login" id="login-button" class="flatbtn-blu" value="<?php echo _('Login'); ?>" /></div>
					</form>
					<br>
					<a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo _('Registration'); ?>"><?php echo _('Registration'); ?></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo _('Lost Password'); ?>?</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php 
		$ranking_config = $this->config->values('rankings_config');
		$server_list = $this->website->server_list();
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '<div id="top-s2">
						<div id="sides-top">'._('Top Players').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
							});
							</script>
							<div id="top_players"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['player']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>				   	
	</div>
	<div id="sides-acp-top">
	<?php 
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
					echo '<div id="top-s1">
						<div id="sides-top">'._('Top Guilds').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'guilds\', \''.$srv.'\', '.$data['guild']['count_in_sidebar'].');
							});
							</script>
							<div id="top_guilds"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['guild'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_guilds_'.$key.'" data-count="'.$ranking_config[$key]['guild']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				if(isset($data['killer']) && $data['killer']['is_sidebar_module'] == 1){
					echo '<div id="top-s2">
						<div id="sides-top">'._('Top Killers').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'killer\', \''.$srv.'\', '.$data['killer']['count_in_sidebar'].');
							});
							</script>
							<div id="top_killer"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['killer'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_killer_'.$key.'" data-count="'.$ranking_config[$key]['killer']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
	?>		
	</div>
	<div id="sides-acp-top">
	<?php 
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['voter']) && $data['voter']['is_sidebar_module'] == 1){
					echo '<div id="top-s1">
						<div id="sides-top">'._('Top Voters').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'votereward\', \''.$srv.'\', '.$data['voter']['count_in_sidebar'].');
							});
							</script>
							<div id="top_votereward"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['voter'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_votereward_'.$key.'" data-count="'.$ranking_config[$key]['voter']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				if(isset($data['online']) && $data['online']['is_sidebar_module'] == 1){
					echo '<div id="top-s2">
						<div id="sides-top">'._('Top Online').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'online\', \''.$srv.'\', '.$data['online']['count_in_sidebar'].');
							});
							</script>
							<div id="top_online"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['online'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_online_'.$key.'" data-count="'.$ranking_config[$key]['online']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
	?>		
	</div>
	<div id="sides-acp-top">
	<?php 
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['bc']) && $data['bc']['is_sidebar_module'] == 1){
					echo '<div id="top-s1">
						<div id="sides-top">'._('Top BC').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'bc\', \''.$srv.'\', '.$data['bc']['count_in_sidebar'].');
							});
							</script>
							<div id="top_bc"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['bc'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_bc_'.$key.'" data-count="'.$ranking_config[$key]['bc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				if(isset($data['ds']) && $data['ds']['is_sidebar_module'] == 1){
					echo '<div id="top-s2">
						<div id="sides-top">'._('Top DS').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'ds\', \''.$srv.'\', '.$data['ds']['count_in_sidebar'].');
							});
							</script>
							<div id="top_ds"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['ds'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_ds_'.$key.'" data-count="'.$ranking_config[$key]['ds']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
	?>		
	</div>
	<div id="sides-acp-top">
	<?php 
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['cc']) && $data['cc']['is_sidebar_module'] == 1){
					echo '<div id="top-s1">
						<div id="sides-top">'._('Top CC').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'cc\', \''.$srv.'\', '.$data['cc']['count_in_sidebar'].');
							});
							</script>
							<div id="top_cc"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['cc'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_cc_'.$key.'" data-count="'.$ranking_config[$key]['cc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){
					echo '<div id="top-s2">
						<div id="sides-top">'._('Top Duelers').'</div>
						<div id="sides-content">
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'duels\', \''.$srv.'\', '.$data['duels']['count_in_sidebar'].');
							});
							</script>
							<div id="top_duels"></div><div style="text-align:center;">';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['duels'])){
										echo '<a sclass="top-servers" href="#" id="switch_top_duels_'.$key.'" data-count="'.$ranking_config[$key]['duels']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '</div></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
	?>		
	</div>
	<?php if ($this->config->values('event_config', array('events', 'active')) == 1): ?>
	<div id="sides-acp-top">
		<div id="top-s1">
			<div id="sides-top"><?php echo  _('Events'); ?></div>
			<div id="sides-content">
				<div id="events" style="padding:5px;"></div>
				<script type="text/javascript">
					$(document).ready(function () {
						App.getEventTimes();
					});
				</script> 
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div id="mux-imgs">
		<a href="<?php echo $this->config->base_url; ?>account-panel/my-referral-list"><div id="img1"></div></a>
		<a href="<?php echo $this->config->base_url; ?>vote-reward"><div id="img2"></div></a>	
	</div>
</div>
</div>
</div>