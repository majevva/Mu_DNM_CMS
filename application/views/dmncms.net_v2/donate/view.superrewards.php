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
				<?php echo _('With SuperRewards'); ?>
			</h2>
			<div class="entry">
                 <div
                    style="background: rgba(255, 255, 255, 0.6);border: 1px solid rgba(0, 0, 0, 0.15);-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin:3px;">
                    <div style="text-align: center;">
                        <iframe src="https://wall.superrewards.com/super/offers?h=<?php echo $donation_config['app_hash'];?>&uid=<?php echo urlencode($this->session->userdata(array('user' => 'username')) . '-server-' . $this->session->userdata(array('user' => 'server'))); ?>" frameborder="0" width="570" style="min-height:450px;height:0 auto;" scrolling="auuto"></iframe>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	