<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Resend activation code'); ?></h2>
	</div>
	<div class="content_rght_info">
	<div class="entry">
		<?php
		if (isset($error)):
			if (is_array($error)):
				foreach ($error as $er):
					echo '<div class="e_note">' . $er . '</div>';
				endforeach;
			else:
				echo '<div class="e_note">' . $error . '</div>';
			endif;
		endif;
		if (isset($success)):
			echo '<div class="s_note">' . $success . '</div>';
		endif;
		if(isset($not_required)){
			 echo '<div class="e_note">' . $not_required . '</div>';
		}
		else{
		?>
		<div class="form other">
			<form method="post" action="" id="resend_activation_form" name="resend_activation_form">
				<table>
					<?php if ($this->website->is_multiple_accounts() == true): ?>
						<tr>
							<td style="width: 150px;"><?php echo _('Server'); ?>:</td>
							<td>
								<select name="server" id="server" class="validate[required]">
									<option value=""><?php echo _('Select Server'); ?></option>
									<?php
									foreach ($this->website->server_list() as $key => $server):
									?>
										<option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
									<?php
									endforeach;
									?>
								</select>
							</td>
						</tr>
					<?php endif; ?>
					<tr>
						<td style="width: 150px;"><?php echo _('Email'); ?>:</td>
						<td><input type="text" name="email" id="email" value="" class="validate[required,custom[email],maxSize[50]]" /></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
						<tr>
							<td><?php echo _('Security'); ?>:</td>
							<td><div class="QapTcha"></div></td>
						</tr>
					<?php endif; ?>
					<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 2): ?>
						<tr>
							<td><?php echo _('Security'); ?>:</td>
							<td><?php echo $this->recaptcha->recaptcha_get_html($security_config['recaptcha_pub_key']); ?></td>
						</tr>
					<?php endif; ?>
					<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 3): ?>
						<script src="https://www.google.com/recaptcha/api.js"></script>
						<tr>
							<td><?php echo _('Security'); ?>:</td>
							<td><div class="g-recaptcha" data-sitekey="<?php echo $security_config['recaptcha_pub_key'];?>"></div></td>
						</tr>
					<?php endif; ?>
					<tr>
						<td></td>
						<td><button type="submit" class="button-style"><?php echo _('Submit'); ?></button></td>
					</tr>
				</table>
			</form>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
				App.buildCaptcha('.QapTcha');
				<?php endif; ?>
				$("#resend_activation_form").validationEngine();
			});
		</script>
		<?php
		}
		?>
	</div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	