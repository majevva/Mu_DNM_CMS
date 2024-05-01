<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Facebook Login'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Facebook Account Register'); ?>		
			</h2>
			<div class="entry">
                <?php
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        echo '<div class="e_note">' . $error . '</div>';
                    }
                }
                ?>
                <div class="form">
                    <form method="post" action="" id="fb_register_form" name="fb_register_form">
                        <input type="hidden" name="add_fb_account" value="1"/>
                        <input type="hidden" name="server" value="<?php echo $server; ?>"/>
                        <table>
                            <tr>
                                <td style="width: 150px;"><?php echo _('Username'); ?>:</td>
                                <td><input class="validate[required,minSize[<?php echo $config['min_username'];?>],maxSize[<?php echo $config['max_username'];?>]]" type="text" name="user" id="user" value="<?php if (isset($_POST['user'])) {echo $_POST['user'];} ?>"/></td>
                            </tr>
							<?php if($config['req_secret'] == 1):?>
							<tr>
								<td><?php echo _('Secret Questions'); ?>:</td>
								<td>
									<select name="fpas_ques" id="fpas_ques" class="validate[required]">
										<?php
										foreach ($this->website->secret_questions() as $key => $value):
										?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
										endforeach;
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo _('Secret Answer'); ?>:</td>
								<td>
									<input class="validate[required,minSize[4],maxSize[50]]" type="text" name="fpas_answ" id="fpas_answ" value=""/>
								</td>
							</tr>
							<?php endif;?>
							<?php if($config['generate_password'] == 0):?>
                            <tr>
								<td><?php echo _('Password'); ?>:</td>
								<td>
									<input class="validate[required,minSize[<?php echo $config['min_password'];?>],maxSize[<?php echo $config['max_password'];?>]]" type="password" name="pass" id="pass" value=""/>
								</td>
							</tr>
							<tr>
								<td><?php echo _('Repeat Password'); ?>:</td>
								<td>
									<input class="validate[required,minSize[<?php echo $config['min_password'];?>],maxSize[<?php echo $config['max_password'];?>],equals[pass]]" type="password" name="rpass" id="rpass" value=""/>
								</td>
							</tr>
							<?php endif;?>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
                                </td>
                            </tr>
                        </table>
                    </form>
					<script type="text/javascript">
                        $(document).ready(function () {
                            $("#fb_register_form").validationEngine();
                        });
                    </script>
                </div>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	