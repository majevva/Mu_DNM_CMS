<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Change Name'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Change Name History'); ?>		
			</h2>
			<div class="entry">
				<?php
                if (isset($error)) {
                    echo '<div class="i_note">' . $error . '</div>';
                } else {
                    ?>
                    <?php
                    if (isset($change_history) && $change_history != false) {
                        ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;"><?php echo _('Old Name'); ?></th>
                                <th style="text-align:center;"><?php echo _('New Name'); ?></th>
                                <th style="text-align:center;"><?php echo _('Date'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($change_history as $history):
                                ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo($i++); ?></td>
                                    <td><?php echo $history['old_name']; ?></td>
                                    <td><?php echo $history['new_name']; ?></td>
                                    <td class="end"><?php echo date('d/m/Y, H:i', strtotime($history['change_date'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo '<div class="i_note">' . _('You have not changed any character name') . '</div>';
                    }
                }
                ?>
			</div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	