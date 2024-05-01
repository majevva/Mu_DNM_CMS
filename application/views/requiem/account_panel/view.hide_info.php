<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Hide Info'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Hide inventory / location from others'); ?></h2>

            <div class="entry">
                <table class="ranking-table">
                    <thead>
                    <tr class="main-tr">
                        <th style="text-align: left;padding-left: 15px;"
                            colspan="3"><?php echo _('Details'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width:30%;text-align: left;padding-left: 15px;"><?php echo _('Hide Till'); ?></td>
                        <td style="width:70%;text-align: left;padding-left: 15px;"><?php echo $hide_time; ?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;text-align: left;padding-left: 15px;"><?php echo _('Hide Info'); ?></td>
                        <td style="width:70%;text-align: left;padding-left: 15px;"><?php echo _('Everyone can\'t see location or inventory items on all chars'); ?></td>
                    </tr>
                    <tr>
                        <td style="width:30%;text-align: left;padding-left: 15px;"><?php echo _('Hide Price'); ?></td>
                        <td style="width:70%;text-align: left;padding-left: 15px;">
                            <?php
                            $price = $this->config->config_entry('account|hide_char_price');
                            if ($this->session->userdata('vip')){
                                $price -= ($price / 100) * $this->session->userdata(array('vip' => 'hide_info_discount'));
                            }

                            echo $price; ?> <?php echo $this->website->translate_credits($this->config->config_entry('account|hide_char_price_type'), $this->session->userdata(array('user' => 'server'))); ?>, <?php echo $this->config->config_entry('account|hide_char_days'); ?> <?php echo _('days'); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="text-align:center;">
                    <button class="custom_button"
                            id="hide_chars"><?php echo _('Hide Now'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	