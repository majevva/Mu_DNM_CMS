<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Registration'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<?php
		if ($config['email_validation'] == 1):
			echo '<div class="s_note">' . _('Your account has been successfully created.') . ' <br />' . _('Please check your email for account activation link.') . '</div>';
		else:
			echo '<div class="s_note">' . _('Your account has been successfully created.') . ' <br />' . _('You can now login.') . '</div></div>';
		endif;
		?>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	