<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Logs'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Account Credits History'); ?>			
			</h2>
			<div class="entry">
                <table class="ranking-table">
                    <thead>
                    <tr class="main-tr">
                        <th>#</th>
                        <th><?php echo _('Info'); ?></th>
                        <th><?php echo _('Amount'); ?></th>
                        <th><?php echo _('Date'); ?></th>
                        <th><?php echo _('Ip Address'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($logs as $log):
                        if ($log['amount'] >= 0) {
                            $amount = '<span style="color: green;">' . $log['amount'] . '</span>';
                        } else {
                            $amount = '<span style="color: red;">' . $log['amount'] . '</span>';
                        }
                        ?>
                        <tr>
                            <td><?php echo $log['pos']; ?></td>
                            <td><?php echo $log['text']; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo date('d/m/Y, H:i', $log['date']); ?></td>
                            <td><?php echo $log['ip']; ?></td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
                <?php
                if (isset($pagination)):
                    ?>
                    <table style="width: 100%;">
                        <tr>
                            <td><?php echo $pagination; ?></td>
                        </tr>
                    </table>
                    <?php
                endif;
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	