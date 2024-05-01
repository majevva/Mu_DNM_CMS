<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Support'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
                        <?php echo _('My Support Requests'); ?>
                        <div style="float:right;"><a class="custom_button"
                                                     href="<?php echo $this->config->base_url; ?>support"><?php echo _('New Request'); ?></a>
                        </div>
                    </h2>
                    <div class="entry">
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th><?php echo _('Title'); ?></th>
                                <th><?php echo _('Last Reply'); ?></th>
                                <th><?php echo _('Status'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($ticket_list)):
                                foreach ($ticket_list AS $key => $ticket):
                                    $last_reply = $this->Msupport->get_last_reply_time($ticket['id']);
                                    if ($last_reply != false) {
                                        $lreply = date('d/m/Y g:i:s a', $last_reply['reply_time']);
                                    } else {
                                        $lreply = 'None';
                                    }
                                    $has_new_reply = '';
                                    if ($ticket['replied_by_user'] == 0) {
                                        $has_new_reply = ' (' . _('New Reply') . ')';
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $this->config->base_url; ?>support/read-ticket/<?php echo $ticket['id']; ?>"><?php echo $ticket['subject'] . $has_new_reply; ?></a>
                                        </td>
                                        <td><?php echo $lreply; ?></td>
                                        <td><?php echo $this->Msupport->readable_status($ticket['status']); ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                            else:
                                ?>
                                <div
                                    class="e_note"><?php echo _('You have no support requests.'); ?></div>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	