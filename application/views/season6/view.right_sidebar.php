<div id="sidebar">
    <div class="box-style2">
        <div class="title2">
            <h2><?php echo _('Account Panel'); ?></h2>
        </div>
        <div class="entry">
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
                    <li><?php echo _('Current Server'); ?>: <span><?php echo $this->session->userdata(array('user' => 'server_t')); ?> <img data-modal-div="select_server" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/switch.png" style="width: 13px;cursor: pointer;"/></span></li>
                    <li class="w-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?>: <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></li>
                    <li class="zz-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_2'); ?>: <span id="my_gold_credits"><?php echo number_format($credits2['credits']); ?></span></li>
                    <?php
                        if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1):
                            $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server')));
                    ?>
						<li class="w-coins"><?php echo _('My'); ?> <?php echo _('WCoins'); ?>: <span id="my_credits"><?php echo number_format($wcoin); ?></span></li>
                    <?php endif;?>
                    <li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a></li>
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
                </ul>
                <span style="float:right;"><a style="text-decoration:underline" href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a></span>
                <?php
            else:
                ?>
                <div style="text-align:center;margin:0 auto;">
                    <div><?php echo $this->website->fb_login(); ?></div>
                    <form id="login_form" method="post" action="<?php echo $this->config->base_url; ?>">
                        <input type="text" name="username" id="login_input" maxlength="10" class="input-main" style="width:182px;" placeholder="<?php echo _('Username'); ?>" value=""/>
                        <input type="password" name="password" id="password_input" maxlength="20" class="input-main" style="width:182px;" placeholder="<?php echo _('Password'); ?>" value=""/>
                        <div style="margin-left:15px">
                            <input type="submit" id="submit" value="<?php echo _('Login'); ?>" class="button-style" style="border:none;cursor:pointer "/>
                        </div>
                    </form>
                    <a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo _('Lost Password'); ?>?</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->config->base_url; ?>registration"><?php echo _('Registration'); ?></a><br/>
                </div>
                <?php
            endif;
            ?>
            <br/><br/>
        </div>
    </div>
    <div class="box-style2">
        <div class="title2">
            <h2><?php echo _('Information'); ?></h2>
        </div>
        <div class="entry">
            <ul class="style4">
                <li class="first"><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About Server'); ?></a></li>
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
    </div>
    <?php if ($this->config->config_entry('modules|last_market_items_module') == 1): ?>
        <div class="box-style2">
            <div class="title2">
                <h2><?php echo _('Market'); ?></h2>
            </div>
            <div class="entry">
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
                <br/>
			<span style="float:right;margin-right:28px">
			<?php
            foreach ($this->website->server_list() as $key => $server):
                if ($server['visible'] == 1):
                    ?>
                    <a href="#" id="switch_items_<?php echo $key; ?>" data-count="<?php echo $this->config->config_entry('modules|last_market_items_count');?>" data-limit="20"><?php echo $server['title']; ?></a>
                    <?php
                endif;
            endforeach;
            ?>
			</span>
                <br/><br/>
            </div>
        </div>
    <?php 
		endif; 
		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Players').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
								});
								</script>
								<div id="top_players"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])){
										echo '<a href="#" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['player']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
					
				}
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Guilds').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \''.$srv.'\', '.$data['guild']['count_in_sidebar'].');
								});
								</script>
								<div id="top_guilds"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
									echo '<a href="#" id="switch_top_guilds_'.$key.'" data-count="'.$ranking_config[$key]['guild']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['voter']) && $data['voter']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Voters').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'votereward\', \''.$srv.'\', '.$data['voter']['count_in_sidebar'].');
								});
								</script>
								<ul class="style4" id="top_votereward"></ul>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['voter'])){
									echo '<a href="#" id="switch_top_votereward_'.$key.'" data-count="'.$ranking_config[$key]['voter']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['killer']) && $data['killer']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Killers').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'killer\', \''.$srv.'\', '.$data['killer']['count_in_sidebar'].');
								});
								</script>
								<div id="top_killer"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['killer'])){
									echo '<a href="#" id="switch_top_killer_'.$key.'"  data-count="'.$ranking_config[$key]['killer']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['online']) && $data['online']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Online').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'online\', \''.$srv.'\', '.$data['online']['count_in_sidebar'].');
								});
								</script>
								<div id="top_online"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['online'])){
									echo '<a href="#" id="switch_top_online_'.$key.'" data-count="'.$ranking_config[$key]['online']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['bc']) && $data['bc']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top BC').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'bc\', \''.$srv.'\', '.$data['bc']['count_in_sidebar'].');
								});
								</script>
								<div id="top_bc"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['bc'])){
									echo '<a href="#" id="switch_top_bc_'.$key.'" data-count="'.$ranking_config[$key]['bc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['ds']) && $data['ds']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top DS').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'ds\', \''.$srv.'\', '.$data['ds']['count_in_sidebar'].');
								});
								</script>
								<div id="top_ds"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['ds'])){
									echo '<a href="#" id="switch_top_ds_'.$key.'" data-count="'.$ranking_config[$key]['ds']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['cc']) && $data['cc']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top CC').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'cc\', \''.$srv.'\', '.$data['cc']['count_in_sidebar'].');
								});
								</script>
								<div id="top_cc"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['cc'])){
									echo '<a href="#" id="switch_top_cc_'.$key.'" data-count="'.$ranking_config[$key]['cc']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){
					echo '<div class="box-style2">
							<div class="title2">
								<h2>'._('Top Duelers').'</h2>
							</div>
							<div class="entry">
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'duels\', \''.$srv.'\', '.$data['duels']['count_in_sidebar'].');
								});
								</script>
								<div id="top_duels"></div>
								<br/>
							<span style="float:right;margin-right:28px">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1 && isset($ranking_config[$key]['duels'])){
									echo '<a href="#" id="switch_top_duels_'.$key.'" data-count="'.$ranking_config[$key]['duels']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span><br/><br/></div></div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		if ($this->config->config_entry('modules|recent_forum_module') == 1): ?>
        <div class="box-style2">
            <div class="title2">
                <h2><?php echo _('Recent Forum Topics'); ?></h2>
            </div>
            <div class="entry">
                <div style="padding-left: 10px;">
                    <?php
                    if ($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), $this->config->config_entry('modules|recent_forum_rss_count'), $this->config->config_entry('modules|recent_forum_rss_cache_time'))) {
                        ?>
                        <ul class="style4">
                            <?php
                            foreach ($load_rss as $key => $rss):
                                $first = ($key == 0) ? 'class="first"' : '';
                                ?>
                                <li <?php echo $first; ?>><a
                                        href="<?php echo $rss['link']; ?>"><?php echo $rss['title']; ?></a></li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                        <?php
                    } else {
                        echo '<div class="i_note">' . _('No Data') . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->config->values('event_config', array('events', 'active')) == 1): ?>
        <div class="box-style2">
            <div class="title2">
                <h2><?php echo _('Events'); ?></h2>
            </div>
            <div class="entry">
                <div id="events"></div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        App.getEventTimes();
                    });
                </script>
            </div>
        </div>
    <?php endif; ?>
</div>