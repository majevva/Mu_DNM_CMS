<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Donate'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('With PaymentWall'); ?>		
			</h2>
			<div class="entry">
                <div
                    style="background: rgba(255, 255, 255, 0.6);border: 1px solid rgba(0, 0, 0, 0.15);-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin:3px;">
                    <div style="padding: 5px; text-align: center;">
                        <iframe
                            src="http://wallapi.com/api/ps/?key=<?php echo $donation_config['api_key']; ?>&uid=<?php echo $this->session->userdata(array('user' => 'username')) . '-server-' . $this->session->userdata(array('user' => 'server')); ?>&widget=<?php echo $donation_config['widget']; ?>&customer[username]=<?php echo $this->session->userdata(array('user' => 'username')); ?>&email=<?php echo $this->session->userdata(array('user' => 'email')); ?>&customer[current_server]=<?php echo $this->session->userdata(array('user' => 'server')); ?>&history[registration_date]=<?php echo strtotime($this->session->userdata(array('user' => 'joined'))); ?>&history[login_number]=<?php echo $this->session->userdata(array('user' => 'id')); ?>&history[last_login_ip]=<?php echo $this->session->userdata(array('user' => 'last_ip')); ?>"
                            width="<?php echo $donation_config['width']; ?>"
                            height="<?php echo $donation_config['height']; ?>"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	