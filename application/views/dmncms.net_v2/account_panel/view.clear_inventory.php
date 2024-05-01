<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Clear Inventory'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Clear character inventory, equipment etc..'); ?>				
			</h2>
			<div class="entry">
                <?php
                if (isset($char_list) && $char_list != false) {
                    ?>
                    <div class="form">
                        <form method="post" action="<?php echo $this->config->base_url; ?>clear-inventory"
                              id="clear_inventory_form">
                            <table>
                                <tr>
                                    <td style="width: 150px;"><?php echo _('character'); ?></td>
                                    <td>
                                        <select class="custom-select" name="character" id="character">
                                            <?php foreach ($char_list as $char): ?>
                                                <option
                                                    value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo _('Select Option(s) To Clear'); ?></td>
                                    <td><input type="checkbox" name="inventory"
                                               value="1"/> <?php echo _('Inventory'); ?>
                                        <br/>
                                        <?php if ($this->website->get_value_from_server($this->session->userdata(array('user' => 'server')), 'wh_size') > 1920): ?>
                                            <input type="checkbox" id="exp_inv_1" name="exp_inv_1"
                                                   value="1"/> <?php echo _('Expanded Inventory'); ?> 1
                                            <br/>
                                            <input type="checkbox" id="exp_inv_2" name="exp_inv_2"
                                                   value="1"/> <?php echo _('Expanded Inventory'); ?> 2
                                            <br/>
                                        <?php endif; ?>
                                        <input type="checkbox" id="equipment" name="equipment"
                                               value="1"/> <?php echo _('Equipment'); ?>
                                        <br/>
                                        <input type="checkbox" id="store" name="store"
                                               value="1"/> <?php echo _('Personal Store'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" id="clear_inv_button"
                                                class="flatbtn-blu m5_top"><?php echo _('Clear Inventory'); ?></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                } else {
                    ?>
                    <div
                        class="e_note"><?php echo _('Character not found.'); ?></div>
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