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
				<?php echo _('With PayCall'); ?>	
			</h2>
			<div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    if (!empty($paycall_packages)) {
                        foreach ($paycall_packages as $packages) {
                            if ($this->session->userdata('vip')){
                                $packages['reward'] += ($packages['reward'] / 100) * $this->session->userdata(array('vip' => 'bonus_credits_for_donate'));
                            }
                            echo '<ul id="paypal-options">
									<li>
										<h4 class="left">' . $packages['package'] . '</h4>
										<h3 class="left"><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))) . ' (<span id="price_' . $packages['id'] . '">' . number_format($packages['price'], 0, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">$</span>)</h3>
										<button class="right custom_button" id="buy_paycall_' . $packages['id'] . '" style="margin-top: 8px;" value="buy_paycall_' . $packages['id'] . '">' . _('Buy Now') . '</button>
									</li>
							</ul>';
                        }
                    } else {
                        echo '<div class="i_note">' . _('No PayCall Packages Found.') . '</div>';
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