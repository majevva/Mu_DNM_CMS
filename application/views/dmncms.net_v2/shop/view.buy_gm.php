<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Buy GM'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Buy GameMaster status for your character'); ?>				
			</h2>
			<div class="entry">
                <?php
                if (isset($not_found)) {
                    echo '<div class="e_note">' . $not_found . '</div>';
                } else {
                    if (isset($error)):
                        echo '<div class="e_note">' . $error . '</div>';
                    endif;
                    if (isset($success)):
                        echo '<div class="s_note">' . $success . '</div>';
                    endif;
                    ?>
                    <div class="form">
                        <form method="POST" action="" id="buy_gm_form" name="buy_gm_form">
                            <table>
                                <tr>
                                    <td style="width: 150px;"><?php echo _('Character'); ?></td>
                                    <td>
                                        <select class="custom-select" name="character" id="character">
                                            <option
                                                value=""><?php echo _('--SELECT--'); ?></option>
                                            <?php
                                            if ($char_list):
                                                foreach ($char_list as $char):
                                                    if ($char['CtlCode'] != $this->config->config_entry('buygm|gm_ctlcode')):
                                                        ?>
                                                        <option
                                                            value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
                                                        <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo _('Price'); ?></td>
                                    <td><?php echo $this->config->config_entry('buygm|price'); ?> <?php echo $this->website->translate_credits($this->config->config_entry('buygm|price_t')); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" id="buy_gm_button"
                                                class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <br/>
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