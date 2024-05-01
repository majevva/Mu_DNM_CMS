<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Add Stats'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Add level up points. Str. Agi. Vit. etc'); ?>				
			</h2>
			<div class="entry">
                <?php
                if (isset($char_list) && $char_list != false) {
                    ?>
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <th><?php echo _('Character'); ?></th>
                            <th><?php echo _('Level Up Points'); ?></th>
                            <th><?php echo _('Manage'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($char_list as $char) {
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(array('user' => 'server')); ?>"><?php echo $char['name']; ?></a>
                                </td>
                                <td>
                                    <?php echo $char['points']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $this->config->base_url; ?>add-stats/<?php echo bin2hex($char['name']); ?>"><?php echo _('Add Stats'); ?></a>
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
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	