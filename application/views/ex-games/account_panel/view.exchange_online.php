<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Trade Online Time'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('More online more can exchange and receive nice rewards'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    }
                    if(isset($success)){
                        echo '<div class="s_note">' . $success . '</div>';
                    }
                ?>
                <form method="post" action="<?php echo $this->config->base_url; ?>account-panel/exchange-online">
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <th style="text-align: left;padding-left: 15px;"
                                colspan="3"><?php echo _('Details'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:30%;text-align: left;padding-left: 15px;"><?php echo _('Online Hours'); ?></td>
                            <td style="width:70%;text-align: left;padding-left: 15px;"><?php echo $online_time; ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%;text-align: left;padding-left: 15px;"><?php echo _('Reward'); ?></td>
                            <td style="width:70%;text-align: left;padding-left: 15px;">
                                <?php
                                    $reward = (int)$this->config->config_entry('account|online_trade_reward');
                                    if($this->session->userdata('vip')){
                                        $reward += $this->session->userdata(['vip' => 'online_hour_exchange_bonus']);
                                    }
                                    echo (int)$reward * $online_time; ?><?php echo $this->website->translate_credits($this->config->config_entry('account|online_trade_reward_type'), $this->session->userdata(['user' => 'server'])); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="text-align:center;">
                        <button class="btn-enter auth" id="trade_hours" name="trade_hours"
                                type="submit"><?php echo _('Trade Now'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
