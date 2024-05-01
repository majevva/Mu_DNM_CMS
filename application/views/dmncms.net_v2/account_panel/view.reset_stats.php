<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Reset Stats'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Reassign your stats'); ?>				
			</h2>
			<div class="entry">
                <?php
                if ($this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|allow_reset_stats') == 1) {
                    if (isset($char_list) && $char_list != false) {
                        ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th><?php echo _('Character'); ?></th>
                                <th><?php echo _('New LevelUp Points'); ?></th>
                                <?php if ($this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|reset_stats_price') > 0) { ?>
                                    <th><?php echo _('Price'); ?></th>
                                <?php } ?>
                                <th><?php echo _('Manage'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($char_list as $char) {
                                $char_info = $this->Mcharacter->check_char($char['name']);
                                $new_stats = 0;
                                if ($this->Mcharacter->char_info['Strength'] > 25) {
                                    $new_stats += $this->Mcharacter->char_info['Strength'] - 25;
                                }
                                if ($this->Mcharacter->char_info['Dexterity'] > 25) {
                                    $new_stats += $this->Mcharacter->char_info['Dexterity'] - 25;
                                }
                                if ($this->Mcharacter->char_info['Energy'] > 25) {
                                    $new_stats += $this->Mcharacter->char_info['Energy'] - 25;
                                }
                                if ($this->Mcharacter->char_info['Vitality'] > 25) {
                                    $new_stats += $this->Mcharacter->char_info['Vitality'] - 25;
                                }
                                if (in_array($this->Mcharacter->char_info['Class'], array(64, 65, 66)) && $this->Mcharacter->char_info['Leadership'] > 25) {
                                    $new_stats += $this->Mcharacter->char_info['Leadership'] - 25;
                                }
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(array('user' => 'server')); ?>"><?php echo $char['name']; ?></a>
                                    </td>
                                    <td>
                                        <span
                                            id="new-stats-<?php echo bin2hex($char['name']); ?>"><?php echo $new_stats; ?></span>
                                    </td>
                                    <?php if ($this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|reset_stats_price') > 0) { ?>
                                        <td><?php echo $this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|reset_stats_price'); ?><?php echo $this->website->translate_credits($this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|reset_stats_payment_type'), $this->session->userdata(array('user' => 'server'))); ?></td>
                                    <?php } ?>
                                    <td><a href="#"
                                           id="reset-stats-char-<?php echo bin2hex($char['name']); ?>"><?php echo _('Reset Stats'); ?></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        ?>
                        <div
                            class="e_note"><?php echo _('Character not found.'); ?></div>
                        <?php
                    }
                } else {
                    ?>
                    <div
                        class="e_note"><?php echo _('Reset Stats Disabled'); ?></div>
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