</div>
<div class="col-lg-3 players" style="float:right;">
	<div class="sidebar-head">
		<h2><?php echo _('Language'); ?></h2>
		
	</div>
	<div style="text-align:center;">
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
	</div>
</div>
<div style="clear:right;"></div>
<div class="col-lg-3 players" style="float:right;">
	<div class="sidebar-head">
		<h2 id="doc_time" style="width: 275px; margin-top: -9px;"><?php echo _('Server Time'); ?>: <span style="color: #ff8c00;" id="ServerTime"></span></h2>
	</div>
</div>
<div style="clear:right;"></div>
<?php 
if($this->session->userdata(['user' => 'logged_in'])): 
	$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
    $credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
?>
<div class="col-lg-3 forumposts" style="float:right;">
	<div class="sidebar-head clearfix">
		<h2><?php echo _('Account Panel'); ?></h2>
	</div>     
	<div class="posts2 sidebar-content2">
		<div class="postscut">
			<ul class="style3">
				<li class="first" style="text-align: center;"><?php echo _('Welcome'); ?>
					, <?php echo $this->session->userdata(['user' => 'username']); ?></li>
				
				<li><?php echo _('Current Server'); ?>: <span><?php echo $this->session->userdata(['user' => 'server_t']); ?> <img
							data-modal-div="select_server"
							src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/switch.png"
							style="width: 13px;cursor: pointer;"/></span></li>
				<li class="w-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1'); ?>
					: <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></li>
				<li class="zz-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2'); ?>
					: <span id="my_gold_credits"><?php echo number_format($credits2['credits']); ?></span></li>
				<?php
					if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1):
						$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
						?>
						<li class="w-coins"><?php echo _('My'); ?> <?php echo _('WCoins'); ?>: <span
								id="my_credits"><?php echo number_format($wcoin); ?></span></li>
					<?php endif; ?>
				<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a>
				</li>
				<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a>
				</li>
				<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a>
				</li>
				<li>
					<a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a>
				</li>
				<li>
					<a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a>
				</li>
				<li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a>
				</li>
				<?php
					$plugins = $this->config->plugins();
					if(!empty($plugins)):
						foreach($plugins AS $plugin):
							if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1):
								?>
								<li>
									<a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a>
								</li>
								<?php
							endif;
						endforeach;
					endif;
				?>
				<li><a style="text-decoration:underline" href="<?php echo $this->config->base_url; ?>logout"><?php echo _('Logout'); ?></a></li>
			</ul>
		</div>
	</div>
</div>
<div style="clear:right;"></div>
<?php endif;?>
<div class="col-lg-3 players" style="float:right;">
	<div class="sidebar-head">
		<h2><?php echo _('Rankings');?></h2>
	</div>
    <div class="players-stats sidebar-content" id="sortplayers">
		<?php
		$ranking_config = $this->config->values('rankings_config');
        $i = 0;
        foreach($ranking_config AS $srv => $data){
            if($data['active'] == 1){
                if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                    echo '<script>
						$(document).ready(function () {
							App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
						});
						</script>
						<div class="table mix PvP">
						<div id="top_players"></div>
						<br/>
						<span style="float:right;margin-right:28px">';
						foreach($this->website->server_list() as $key => $server){
							if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
								echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
							}
						}
						echo '</span></div>';
                }
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                    echo '<div class="table mix Guild">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
								});
								</script>
								<div id="top_guilds"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
                    foreach($this->website->server_list() as $key => $server){
                        if($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
                            echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
                        }
                    }
                    echo '</span></div>';
                }
                $i++;
                if($i == 1){
                    break;
                }
            }
        }
		?>  
		<?php if($this->config->values('event_config', ['events', 'active']) == 1): ?>
		<div class="table mix Events" id="events">
		<script type="text/javascript">
			$(document).ready(function () {
				App.getEventTimes();
			});
		</script>
		</div>  
		<?php endif; ?>
		<div style="margin-left: 56.5px;" class="filters">
			<button class="btn btn-default btn-xs filter" data-filter=".PvP"><?php echo _('Players');?></button>
			<button class="btn btn-default btn-xs filter" data-filter=".Guild"><?php echo _('Guilds');?></button>
			<?php if($this->config->values('event_config', ['events', 'active']) == 1): ?>
			<button class="btn btn-default btn-xs filter" data-filter=".Events"><?php echo _('Events');?></button>
			<?php endif; ?>
		</div>
	</div>
</div>
<div style="clear:right;"></div>
<div class="col-lg-3 forumposts" style="float:right;">
	<div class="sidebar-head clearfix">
		<h2><?php echo _('Menu'); ?></h2>
	</div>     
	<div class="posts sidebar-content">
		<div class="postscut">
			<ul class="style4">
                <li class="first"><a
                        href="<?php echo $this->config->base_url; ?>about"><?php echo _('About Server'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo _('Rules'); ?></a></li>
                <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"
                       target="_blank"><?php echo _('Forum'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Donate'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>rankings/gm-list"><?php echo _('GM List'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>rankings/ban-list"><?php echo _('Ban List'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo _('Guides'); ?></a></li>
                <li><a href="<?php echo $this->config->base_url; ?>support"><?php echo _('Contact Us'); ?></a></li>
                <?php
                    $plugins = $this->config->plugins();
                    if(!empty($plugins)):
                        foreach($plugins AS $plugin):
                            if($plugin['installed'] == 1 && $plugin['sidebar_public_item'] == 1):
                                ?>
                                <li>
                                    <a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a>
                                </li>
                                <?php
                            endif;
                        endforeach;
                    endif;
                ?>
            </ul>
		</div>
	</div>
</div>
<div style="clear:right;"></div>
<?php if($this->config->config_entry('modules|recent_forum_module') == 1): ?>
<div class="col-lg-3 forumposts" style="float:right;">
	<div class="sidebar-head clearfix">
		<h2><?php echo _('Recent Forum Topics'); ?></h2>
	</div>     
	<div class="posts sidebar-content">
		<div class="postscut">
			<?php
				if($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), $this->config->config_entry('modules|recent_forum_rss_count'), $this->config->config_entry('modules|recent_forum_rss_cache_time'))){
					foreach($load_rss as $key => $rss):
						?>
						<div class="post">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/ava.png" style="width: 32px; height: 32px; float: left;" class="question">
							<a href="<?php echo $rss['link']; ?>"><?php echo $this->website->set_limit($rss['title'], 28, '..'); ?></a>
							<p href="#" class="author"><time><?php echo date('d M Y H:i', strtotime($rss['pubDate'])); ?></time></p>
						</div>
						<?php
					endforeach;				
				}
				else{
					echo '<div class="i_note">' . _('No Data') . '</div>';
				}
			?>
		</div>
	</div>
</div>
<div style="clear:right;"></div>
<?php endif;?>