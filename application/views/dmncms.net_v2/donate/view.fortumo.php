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
				<?php echo _('With Fortumo'); ?>		
			</h2>
			<div class="entry">
               <div style="text-align: center;">
                    <a id="fmp-button" href="#"
                       rel="<?php echo $donation_config['service_id']; ?>?cuid=<?php echo $this->session->userdata(array('user' => 'username')); ?>-server-<?php echo $this->session->userdata(array('user' => 'server')); ?>&amp;callback_url=<?php echo $this->config->base_url; ?>payment/fortumo<?php if ($donation_config['sandbox'] == 1) { ?>&amp;test=ok<?php } ?>"><img
                            src="http://fortumo.com/images/fmp/fortumopay_96x47.png" width="96" height="47"
                            alt="Mobile Payments by Fortumo" border="0"/></a>
                </div>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	