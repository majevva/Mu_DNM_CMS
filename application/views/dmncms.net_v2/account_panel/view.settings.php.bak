<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Account Settings'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Change Password'); ?>				
			</h2>
			<div class="entry">
                <div class="form">
                    <form method="post" action="<?php echo $this->config->base_url; ?>settings" id="password_change_form">
                        <table>
                            <tr>
                                <td style="width:150px;"><?php echo _('Old Password'); ?>:</td>
                                <td><input class="validate[required,minSize[<?php echo $config['min_password'];?>],maxSize[<?php echo $config['max_password'];?>]]" type="password" name="old_password" id="old_password" value=""/></td>
                            </tr>
                            <tr>
                                <td><?php echo _('New Password'); ?>:</td>
                                <td><input class="validate[required,minSize[<?php echo $config['min_password'];?>],maxSize[<?php echo $config['max_password'];?>]]" type="password" name="new_password" id="new_password" value=""/></td>
                            </tr>
                            <tr>
                                <td><?php echo _('Repeat New Password'); ?>:</td>
                                <td><input class="validate[required,minSize[<?php echo $config['min_password'];?>],maxSize[<?php echo $config['max_password'];?>],equals[new_password]]" type="password" name="new_password2" id="new_password2" value=""/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
			<?php if ($this->config->config_entry('account|allow_mail_change') == 1) { ?>
			<h2 class="title"><?php echo _('Change Email'); ?></h2>

			<div class="entry">
				<div class="form">
					<form method="post" action="<?php echo $this->config->base_url; ?>settings"
						  id="email_change_form">
						<table>
							<tr>
								<td style="width:150px;"><?php echo _('Current Email'); ?>
									:
								</td>
								<td><input class="validate[required,custom[email],maxSize[50]]" type="email"
										   name="email" id="email" value=""/></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button type="submit"
											class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<?php } ?>
			<?php if ($this->config->config_entry('account|allow_recover_masterkey') == 1) { ?>
			<h2 class="title"><?php echo _('Recover Master Key'); ?></h2>

			<div class="entry">
				<?php
				if (isset($error)) {
					echo '<div class="e_note">' . $error . '</div>';
				}
				if (isset($success)) {
					echo '<div class="s_note">' . $success . '</div>';
				}
				?>
				<div class="form">
					<form method="post" action="<?php echo $this->config->base_url; ?>settings"
						  id="recover_master_key">
						<table>
							<tr>
								<td style="width:150px;"></td>
								<td><?php echo _('Recover your master key if you have forgotten it.'); ?></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button type="submit" class="flatbtn-blu m5_top"
											name="recover_master_key"><?php echo _('Submit'); ?></button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
        <?php } ?>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	