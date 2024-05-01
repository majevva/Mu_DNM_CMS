</article><div class="side_area_wrp">
        <aside class="user_wrap">
                <a href="<?php echo $this->config->base_url;?>registration" class="btn_login"><span>Register</span></a>
        </aside>




<article class="battle_wrp">
                <h3>Account Panel</h3>
                              <div style="    margin-bottom: 16px;
  border-bottom: 1px solid #e5e5e5;">
              
                </div>
            </article>
			<div class="box-style2">

        <div class="entry">
            <?php
            if ($this->session->userdata(array('user' => 'logged_in'))):
                $credits = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 1, $this->session->userdata(array('user' => 'id')));
                $credits2 = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 2, $this->session->userdata(array('user' => 'id')));
                ?>
<div >
              
				  <a href="#" data-modal-div="select_server" class="active">SWITCH SERVER</a>
				</div>
				
                <ul class="style4">

                   
                    <li class="w-coins"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?>
                        : <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></li>
                    <?php
                        if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1):
                            $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server')));
                    ?>
                    <li class="w-coins"><?php echo _('My'); ?> <?php echo _('WCoins'); ?>
                        : <span id="my_credits"><?php echo number_format($wcoin); ?></span></li>
                    <?php endif;?>
                    <li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo _('Vote Reward'); ?></a></li>					
                    <li><a href="<?php echo $this->config->base_url; ?>exchange-wcoins"><?php echo _('Exchange'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a></li>
                    <li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a></li>
					<li><a  href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a></li>
                </ul>
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
						<a href="<?php echo $this->config->base_url; ?>registration/resend-activation"><?php echo _('Resend Activation Email'); ?></a>
				</div>
                <?php
            endif;
            ?>
        </div>
    </div>

<article class="history_wrp">
                <h3><strong class="point">Server</strong>Status</h3>
                <div class="server_bx">
	 <?php
		$i = 0;
		foreach($this->website->check_server_status() as $key => $value):
			if($value['visible'] == 1){
				$info = ($value['image'] == 'on') ? array('online', 'style="color: #27c460"') : array('offline', '');
			$i++;												
		?>
			<div class="server" id="<?php echo 's'.$i.'_'.$info[0];?>">
				<a href="#"><?php echo $value['title'];?></a>
				<br>
				<span <?php echo $info[1];?>><?php echo $info[0];?> (<?php echo $value['players']*1;?>)</span>
			</div>
		<?php
			}
		endforeach;
		?>    
                </div>

            </article>	
	
<article class="history_wrp">
                <h3><strong class="point">TOP</strong>PLAYERS<a href="#" class="more" rel="">more</a></h3>
                <div class="server_bx">
     <?php 

		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){

				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
								});
								</script>
								<div id="top_players"></div>
							
							';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key])){
										echo ' ';
								}
							}
					echo '';
					
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
                </div>			          
            </article>	
	

<?php if ($this->config->config_entry('modules|last_market_items_module') == 1): ?>
	<article class="history_wrp">
    	<h3><?php echo _('Market'); ?></h3>
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
		$server_list = $this->website->server_list();
		foreach($server_list as $key => $server){
			if ($server['visible'] == 1  && isset($ranking_config[$key])){
					echo '<a style="color:#d6d58c;" id="switch_items_'.$key.'" href="#" data-count="'.$this->config->config_entry('modules|last_market_items_count').'" data-limit="20">'.$server['title'].'</a> ';
			}
			if(end($server_list) !== $server){
				echo '<span style="color:#BDE5F8;"> | </span>';
			}
		}	
        ?> 
		</span>
		<br /><br />	
 	</article>
    <?php endif; ?>		

					
          
</div></div>
    

     
        