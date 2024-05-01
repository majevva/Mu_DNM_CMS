<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Donate'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('With PayPal'); ?>				
			</h2>
			<div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    if (!empty($paypal_packages)) {
                        foreach ($paypal_packages as $packages) {
							$price = $packages['price'];
							if(isset($donation_config['paypal_fee']) && $donation_config['paypal_fee'] != ''){
								$fee = ($donation_config['paypal_fee'] / 100) * $packages['price'];
								$price = $packages['price'] + $fee;							
							}						
							if(isset($donation_config['paypal_fixed_fee']) && $donation_config['paypal_fixed_fee'] != ''){
								$price += $donation_config['paypal_fixed_fee'];
							}
                            echo '<ul id="paypal-options">
									<li>
										<h4 class="left">' . $packages['package'] . '</h4>
										<h3 class="left"><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))) . ' (<span id="price_' . $packages['id'] . '" data-price-tax="' . number_format($price, 2, '.', ',') . '">' . number_format($packages['price'], 1, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">' . $packages['currency'] . '</span>)</h3>
										<button class="right custom_button" id="buy_paypal_' . $packages['id'] . '_' . $donation_config['sandbox'] . '" style="margin-top: 8px;" value="buy_paypal_' . $packages['id'] . '">' . _('Buy Now') . '</button>
									</li>
							</ul>';
                        }
                    } else {
                        echo '<div class="i_note">' . _('No Paypal Packages Found.') . '</div>';
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