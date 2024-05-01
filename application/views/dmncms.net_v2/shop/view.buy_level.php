<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Buy Level'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Buy level for your character.'); ?>			
			</h2>
			<div class="entry">
				<?php
                if ($level_config != false && $level_config['active'] == 1) {
                    if (isset($not_found)) {
                        echo '<div class="e_note">' . $not_found . '</div>';
                    } else {
                        if (isset($error)) {
                            echo '<div class="e_note">' . $error . '</div>';
                        }
                        if (isset($success)) {
                            echo '<div class="s_note">' . $success . '</div>';
                        }
                        ?>
                        <div class="form">
                            <form method="POST" action="" id="buy_level_form" name="buy_level_form">
                                <table>
                                    <tr>
                                        <td style="width: 150px;"><?php echo _('Character'); ?>
                                            :
                                        </td>
                                        <td>
                                            <select name="character" id="character">
                                                <option
                                                    value=""><?php echo _('--SELECT--'); ?></option>
                                                <?php
                                                if ($char_list):
                                                    foreach ($char_list as $char): ?>
                                                        <option
                                                            value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo _('Level'); ?>:</td>
                                        <td>
                                            <?php if (!empty($level_config['levels'])) { ?>
                                                <select name="level" id="level">
                                                    <option
                                                        value=""><?php echo _('--SELECT--'); ?></option>
                                                    <?php
                                                    foreach ($level_config['levels'] as $level => $data) {
                                                        echo '<option value="' . $level . '">' . $level . ' lvl price ' . $data['price'] . ' ' . $this->website->translate_credits($data['payment_type'], $this->session->userdata(array('user' => 'server'))) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            <?php } else { ?>
                                                <?php echo _('No levels to select'); ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" id="buy_level_button"
                                                    class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <br/>
                        <?php
                    }
                } else {
                    echo '<div class="e_note">' . _('Buy level configuration not found for this server. Or disabled for this server.') . '</div>';
                }
                ?>
			</div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	