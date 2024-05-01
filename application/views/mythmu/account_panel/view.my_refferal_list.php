<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('My Refferals'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('View your reffered players'); ?></h2>

            <div class="entry">
                <?php if(!empty($my_refferal_list)): ?>
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <th><?php echo _('Refferal'); ?></th>
                            <th><?php echo _('Date Reffered'); ?></th>
                            <th><?php echo _('Reward Archieved'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($my_refferal_list as $refs): ?>
                            <tr>
                                <td><?php echo $refs['refferal']; ?></td>
                                <td><?php echo date('d / M / Y h:i', strtotime($refs['date_reffered'])); ?></td>
                                <td><?php
                                        $x = 0;
                                        for($i = $refs['res_count']; $i > 0; $i--):
                                            $x += ($i % $this->config->config_entry('registration|refferal_need_resets_' . $this->session->userdata(['user' => 'server'])) == 0) ? 1 : 0;
                                        endfor;
                                        echo ($x * $this->config->config_entry('registration|refferal_reward_after_resets')) . ' ' . $this->website->translate_credits($this->config->config_entry('registration|refferal_reward_type'), $this->session->userdata(['user' => 'server']));
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="i_note"><?php echo _('No reffered players.'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	