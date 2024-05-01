</div></div>
						</div> </div>
            
        </div>
		
		
		<div id="evo-login" class="overlay">
    <a class="cancel" href="#"></a>
			<div class="loginnow">
        <div class="login">
                    <hr>
           <form id="login_form" name="loginform" method="post" action="">
                 <div class="login-box">
                    <i class="icon-user"></i><input id="login_input" class="ao" name="username" type="text" placeholder="<?php echo _('Username'); ?>">
                </div>
                <div class="pass-box">
                    <i class="icon-lock"></i><input id="password_input" class="ao" name="password" type="password" placeholder="<?php echo _('Password'); ?>">
                </div>
                <br>
                <button class="btn-enter" name="login_btn" type="submit" id="btn_s"><?php echo _('Login'); ?></button>
            </form>
            <hr>
            <div style="float:right"><a href="<?php echo $this->config->base_url; ?>lost-password"><font color="white"><?php echo _('Lost Password'); ?>?</font></a></div>
                </div>

    </div></div>
        <div class="sidebar">
            <div class="control-panel zoomIn wow" data-wow-delay="0s">
                <div class="heading"><?php echo _('Account Panel'); ?></div>
				            <?php
            if ($this->session->userdata(array('user' => 'logged_in'))):
                $credits = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 1, $this->session->userdata(array('user' => 'id')));
                $credits2 = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 2, $this->session->userdata(array('user' => 'id')));
                ?>
								
                    <div class="ra2"><?php echo _('Current Server'); ?>: <span><?php echo $this->session->userdata(array('user' => 'server_t')); ?> <img data-modal-div="select_server" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/switch.png" style="width: 13px;cursor: pointer;"/></span><br></div>
                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?>: <span id="my_credits"><?php echo number_format($credits['credits']); ?></span><br></a></div>
                    <?php
                        if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1):
                            $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server')));
                    ?>
						<div class="ra"><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('My'); ?> <?php echo _('WCoins'); ?>: <span id="my_credits"><?php echo number_format($wcoin); ?></span><br></a></div>
                    <?php endif;?>
					 <div class="ra"><a href="<?php echo $this->config->base_url; ?>donate/paymentwall"><?php echo _('Buy Credits with Cards/Gifts/etc'); ?></a><br></div>

                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Item Shop'); ?></a><br></div>
                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a><br></div>
                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a><br></div>
					 <div class="ra"><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo _('Vote for server'); ?></a><br></div>

                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a><br></div>
                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a><br></div>
                    <div class="ra"><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a><br></div>
					<?php 
					$plugins = $this->config->plugins();
					if(!empty($plugins)):
						foreach($plugins AS $plugin):
							if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1):
					?>
						<div class="ra"><a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a><br></div>
					<?php
						endif;
					endforeach;
					endif;
					?>
<div class="ra"><a  href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a></div>
  
				<?php
            else:
                ?>
				
             
                                    <a href="#evo-login">
                                        <div class="icon"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/ico-control1.png" alt="Control"></div><?php echo _('Account Panel'); ?>
                                    </a>
									<br>
                <a href="<?php echo $this->config->base_url; ?>lost-password"><div class="icon"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/ico-control2.png" alt="Control"></div><?php echo _('Lost Password?'); ?></a><br>
           
                                
  
                <?php
            endif;
            ?>
                 </div>
            
    
            
    

<?php 
		$ranking_config = $this->config->values('rankings_config');
		$server_list = $this->website->server_list();
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo ' <div class="information zoomIn wow" data-wow-delay="0s">
                <div class="heading">'._('Top Players').'</div>
                                    
            <div class="right1">


					
					
					
					
					
					
							<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
							});
							</script>
							<div id="top_players" style=" margin-bottom: 20px; "></div>';
							foreach ($server_list as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])){
										echo '<a sclass="top-servers" style="margin-left: 15px; text-align: center; padding: 3px; background: #e14b1b; border-radius: 3px; font-size: 11px; " href="#" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['player']['count_in_sidebar'].'">'.$server['title'].'</a> ';
									
								}
								
							}
					echo '    
</div>
</div>';
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
<?php
$ranking_config = $this->config->values('rankings_config');
		$server_list = $this->website->server_list();
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                    echo '
					
				
					  <div class="information zoomIn wow" data-wow-delay="0s">
                <div class="heading">'._('Top Guilds').'</div>
                                            
<div class="right2">

					
					
					
					
					
				
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
								});
								</script>
								<div id="top_guilds" style=" margin-bottom: 20px; "></div>
								
							';
                    foreach($this->website->server_list() as $key => $server){
                        if($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
                            echo '<a href="#" style="margin-left: 15px; text-align: center; padding: 3px; background: #e14b1b; border-radius: 3px; font-size: 11px; " id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
                        }
                    }
                    echo '    
</div>
                                            

                                     </div>';
                }
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?> 

                   
           
    


        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="footer">
    <div class="main-width">
<div class="counters">

        </div>
        <div class="copyright">
            <a class="totop" href="#top"></a>
            <?php echo _('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>. <?php echo _('All Rights Reserved.'); ?></br>
            <?php echo _('Powered By'); ?> <a href="http://dmncms.net">DMNCMS</a></br>
        </div>
        <div class="clear"></div>
    </div>
</div>



</div>	

<div id="select_server">
    <div class="modal-header">
        <h2><?php echo _('Select Server'); ?></h2>
        <a class="close" href="javascript:;"></a>
    </div>
    <div style="margin: 20px;" class="form">
        <?php
        if (!$servers = $this->website->server_select_box('id="switch_server"')) {
            echo '<b style="color: red;">' . _('Currently this is only one server.') . '</b>';
        } else {
            echo $servers;
        }
        ?>

    </div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>

<div id="loading"><img
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif"
        alt=""/> <?php echo _('Loading...'); ?></div>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time());?>',
        ajax_page_load: <?php echo $this->config->config_entry('main|use_ajax_page_load');?>
    };

    $(document).ready(
        App.initialize,
        <?php if($this->session->userdata(array('user'=>'logged_in'))): ?>
        App.checkSupportTickets(),
        <?php endif;?>
        App.locale = <?php echo $this->translations;?>
        <?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
        , App.count_down('<?php echo $this->config->config_entry("main|grand_open_timer");?>')
        <?php endif; ?>
        , App.initLocalization()
    );
</script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js"
    type="text/javascript"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js"
    type="text/javascript"></script>

<?php
if ($this->config->config_entry('main|show_debug_info') == 1) {
    $this->debug->mark('loading_time_end');
    echo $this->debug->run();
}
?>
</body>
</html>