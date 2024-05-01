<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Donate'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Choose Donation Method'); ?></h2>

            <div class="entry">
                <?php
                    if($donation_config != false){
                        echo '<div style="margin: 5px auto; text-align:center;">';
                        if(isset($donation_config['paypal']) && $donation_config['paypal']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paypal" class="btn-enter auth">' . _('PayPal') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paymentwall']) && $donation_config['paymentwall']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paymentwall" class="btn-enter auth">' . _('PaymentWall') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['fortumo']) && $donation_config['fortumo']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/fortumo" class="btn-enter auth">' . _('Fortumo') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paygol']) && $donation_config['paygol']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paygol" class="btn-enter auth">' . _('PayGol') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['2checkout']) && $donation_config['2checkout']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/two-checkout" class="btn-enter auth">' . _('2CheckOut') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['pagseguro']) && $donation_config['pagseguro']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/pagseguro" class="btn-enter auth">' . _('PagSeguro') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['superrewards']) && $donation_config['superrewards']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/superrewards" class="btn-enter auth">' . _('SuperRewars') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paycall']) && $donation_config['paycall']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paycall" class="btn-enter auth">' . _('Paycall') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['interkassa']) && $donation_config['interkassa']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/interkassa" class="btn-enter auth">' . _('Interkassa') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['cuenta_digital']) && $donation_config['cuenta_digital']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/cuenta-digital" class="btn-enter auth">' . _('Cuenta Digital') . '</a>&nbsp;';
                        }
                        $plugins = $this->config->plugins();
                        $is_any = false;
                        if(!empty($plugins)):
                            foreach($plugins AS $plugin):
                                if($plugin['installed'] == 1 && $plugin['donation_panel_item'] == 1):
                                    $is_any = true;
                                    echo '<a href="' . $plugin['module_url'] . '" class="btn-enter auth">' . $plugin['about']['name'] . '</a>&nbsp;';
                                endif;
                            endforeach;
                        endif;
                        if((!isset($donation_config['paypal']) || $donation_config['paypal']['active'] == 0) && (!isset($donation_config['paymentwall']) || $donation_config['paymentwall']['active'] == 0) && (!isset($donation_config['fortumo']) || $donation_config['fortumo']['active'] == 0) && (!isset($donation_config['paygol']) || $donation_config['paygol']['active'] == 0) && (!isset($donation_config['2checkout']) || $donation_config['2checkout']['active'] == 0) && (!isset($donation_config['pagseguro']) || $donation_config['pagseguro']['active'] == 0) && (!isset($donation_config['paycall']) || $donation_config['paycall']['active'] == 0) && (!isset($donation_config['interkassa']) || $donation_config['interkassa']['active'] == 0) && (!isset($donation_config['cuenta_digital']) || $donation_config['cuenta_digital']['active'] == 0) && (!isset($donation_config['superrewards']) || $donation_config['superrewards']['active'] == 0) && ($is_any == false)){
                            echo '<div class="e_note">' . _('No Donation Methods Found.') . '</div>';
                        }
                        echo '</div>';
                    }
                    else{
                        echo '<div class="e_note">' . _('Donation modules not configured for this server.') . '</div>';
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
	