</article><div class="side_area_wrp">
	<aside class="user_wrap">
		<a href="<?php echo $this->config->base_url;?>registration" class="btn_login"><span><?php echo __('Registration');?></span></a>
	</aside>
	<article class="battle_wrp">
		<h3><?php echo __('Account Panel'); ?></h3>
        <div style="margin-bottom: 16px;border-bottom: 1px solid #e5e5e5;"></div>
    </article>
			<div class="entry">  
			<?php
			if($this->session->userdata(array('user'=>'logged_in'))):
				$credits = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 1, $this->session->userdata(array('user'=>'id')));
				$credits2 = $this->website->get_user_credits_balance($this->session->userdata(array('user' => 'username')), $this->session->userdata(array('user' => 'server')), 2, $this->session->userdata(array('user'=>'id')));
			?>
			<nav class="sub_lnb_wrp" id="subGameNavi">
			<ol class="sub_menu_bx">
			 <li class="even"><?php echo __('Current Server'); ?>: <span><?php echo $this->session->userdata(array('user' => 'server_t'));?> <img data-modal-div="select_server" src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/images/switch.png" style="width: 13px;cursor: pointer;"/></span></li>
							<li  class="even"><?php echo __('My'); ?> <?php echo $this->config->config_entry('credits_'.$this->session->userdata(array('user' => 'server')).'|title_1');?>: <span id="my_credits"><?php echo number_format($credits['credits']);?></span></li>
							<li  class="even  last_child"><?php echo __('My'); ?> <?php echo $this->config->config_entry('credits_'.$this->session->userdata(array('user' => 'server')).'|title_2');?>: <span id="my_gold_credits"><?php echo number_format($credits2['credits']);?></span></a></li>
							
							</ol>  </nav>         
						<nav class="sub_lnb_wrp" id="subGameNavi">
			<h3><?php echo __('Welcome'); ?>, <?php echo $this->session->userdata(array('user' => 'username'));?></h3>
			<ol class="sub_menu_bx">
				<li class="even"><a href="<?php echo $this->config->base_url;?>warehouse"><?php echo __('Warehouse'); ?></a></li>
				<li class="even"><a href="<?php echo $this->config->base_url;?>account-panel"><?php echo __('Account Panel'); ?></a></li>
				<li class="even"><a href="<?php echo $this->config->base_url;?>account-logs"><?php echo __('Account Logs'); ?></a></li>
				<li class="even"><a href="<?php echo $this->config->base_url;?>settings"><?php echo __('Settings'); ?></a></li>
			<li  class="even  last_child"><a style="text-decoration:underline" href="<?php echo $this->config->base_url; ?>logout"><?php echo __('Logout'); ?></a></li></ol>  </nav>		
			<?php
			else:
			?>
			<div style="text-align:center;margin:0 auto;">
			<div><?php echo $this->website->fb_login(); ?></div>
			<form id="login_form" method="post" action="<?php echo $this->config->base_url;?>">	
				<input type="text" name="username" id="login_input" maxlength="20" class="input-main" style="width:182px;" placeholder="<?php echo __('Username'); ?>" value="" />			
				<input type="password" name="password" id="password_input" maxlength="20" class="input-main" style="width:182px;" placeholder="<?php echo __('Password'); ?>" value="" />
				<div style="margin-left:15px">
					<input type="submit" id="submit" value="<?php echo __('Login'); ?>" class="button-style" style="border:none;cursor:pointer" />
				</div>
			</form>
			<a href="<?php echo $this->config->base_url;?>lost-password"><?php echo __('Lost Password'); ?>?</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->config->base_url;?>registration"><?php echo __('Registration'); ?></a><br/>
			</div>
			<?php
			endif;
			?>
			<br /><br />
		</div>
<article class="history_wrp">
                <h3><strong class="point">Castle</strong> Siege<a href="#" class="more" rel="">more</a></h3>
                <div class="server_bx">
     
                </div>
                <?php
                	$cs_info = $this->website->get_cs_info();	
                ?>
        		<div class="winner">
                    <div class="char">Guild <strong><?php echo $cs_info['guild'];?></strong></div>
                </div>
            </article>
			<article class="history_wrp">
                <h3><strong class="point">Server</strong>Status<a href="#" class="more" rel="">more</a></h3>
                <div class="server_bx">
     
                </div>
        <?php
        $online = 0;
        $max = 500;
        foreach($this->website->check_server_status() as $key => $value):
        	$online += $value['players'];
        endforeach;
        $percentage = floor(100 * $online / $max);
        ?>
        <div style="border: 1px solid #e6e6e6;font-size:11px;height: 15px;clear: both;  border-radius: 5px;border-top: 0;text-align: center;line-height: 117%;text-shadow: #000 0px 0 3px;">
		 <div style="background: #56af23;
		  color: #fff;
		  border-radius: 5px;height: 15px;width: <?php echo $online;?>%;background: -moz-linear-gradient(left, #56af23 0%, #ff0000 100%);
		  background: -webkit-gradient(linear, left top, right top, color-stop(0%,#56af23), color-stop(100%,#ff0000));
		  background: -webkit-linear-gradient(left, #56af23 0%,#ff0000 100%);
		  background: -o-linear-gradient(left, #56af23 0%,#ff0000 100%);
		  background: -ms-linear-gradient(left, #56af23 0%,#ff0000 100%);
		  background: linear-gradient(to right, #56af23 0%,#ff0000 100%);
		  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#56af23', endColorstr='#ff0000',GradientType=1 );"><?php echo $online;?></div>                
		 </div>
</article>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            
            <aside class="sns_facebook_wrp">
                <h3>Facebook Fans</h3>
                <div style="border-top: 1px solid #d9d9d9;">
<div class="fb-page" data-href="https://www.facebook.com/pages/EliteMu-Online/330040833711351" data-width="280" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/EliteMu-Online/330040833711351"><a href="https://www.facebook.com/pages/EliteMu-Online/330040833711351">EliteMu Online</a></blockquote></div></div></aside>    
</div></div> 
        