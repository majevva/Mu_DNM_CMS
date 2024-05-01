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
				<?php echo _('With 2 CheckOut'); ?>		
			</h2>
			<div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    if (!empty($packages)) {
                        foreach ($packages as $package) {
                            if ($this->session->userdata('vip')){
                                $package['reward'] += ($package['reward'] / 100) * $this->session->userdata(array('vip' => 'bonus_credits_for_donate'));
                            }
                            echo '<ul id="paypal-options">
									<li>
										<h4 class="left">' . $package['package'] . '</h4>
										<h3 class="left"><span id="reward_' . $package['id'] . '">' . $package['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))) . ' (<span id="price_' . $package['id'] . '">' . number_format($package['price'], 0, '.', ',') . '</span> <span id="currency_' . $package['id'] . '">' . $package['currency'] . '</span>)</h3>
										<a class="right custom_button" style="margin-top: 8px;" href="' . $this->config->base_url . 'donate/two-checkout/' . $package['id'] . '">' . _('Buy Now') . '</a>
									</li>
							</ul>';
                        }
                    } else {
                        echo '<div class="i_note">' . _('No 2Checkout Packages Found.') . '</div>';
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