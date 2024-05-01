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
				<?php echo _('Set New Email'); ?>				
			</h2>
			 <div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                }
                if (isset($success)) {
                    echo '<div class="s_note">' . $success . '</div>';
                }
                if ($set_new_email == true) {
                    ?>
                    <div class="form">
                        <form method="post" action="" id="set_new_email_form">
                            <table>
                                <tr>
                                    <td style="width:150px;"><?php echo _('New Email'); ?>
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
                    <?php
                }
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	