<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Change Class'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Change character class.'); ?></h2>

            <div class="entry">
                <?php
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
                        <form method="POST" action="" id="buy_class_form" name="buy_class_form">
                            <table>
                                <tr>
                                    <td style="width: 150px;"><?php echo _('Character'); ?></td>
                                    <td>
                                        <select name="character" id="select_char">
                                            <option
                                                value=""><?php echo _('--SELECT--'); ?></option>
                                            <?php
                                            if ($char_list):
                                                foreach ($char_list as $char):
                                                    ?>
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
                                    <td><?php echo _('Class'); ?></td>
                                    <td>
                                        <select name="class_select" id="class_select">
                                            <option value="" disabled="disabled"
                                                    selected="selected"><?php echo _('--SELECT--'); ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo _('Price'); ?></td>
									<td>
										<?php 
											$price = $changeclass_config['price'];
											if ($this->session->userdata('vip')){
												$price -= ($price / 100) * $this->session->userdata(array('vip' => 'change_class_discount'));
											}
											echo $price; ?> <?php echo $this->website->translate_credits($changeclass_config['payment_type']);  
										?>
									</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" id="buy_class_button"
                                                class="button-style"><?php echo _('Submit'); ?></button>
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
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
