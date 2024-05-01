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
				<?php echo _('With Cuenta Digital'); ?>	
			</h2>
			<div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    if (!empty($cuenta_digital_packages)) {
                        foreach ($cuenta_digital_packages as $packages) {
                            if ($this->session->userdata('vip')){
                                $packages['reward'] += ($packages['reward'] / 100) * $this->session->userdata(array('vip' => 'bonus_credits_for_donate'));
                            }
                            echo '<ul id="paypal-options">
									<li>
										<h4 class="left">' . $packages['package'] . '</h4>
										<h3 class="left"><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))) . ' (<span id="price_' . $packages['id'] . '">' . number_format($packages['price'], 1, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">'.$packages['currency'].'</span>)</h3>
										<a class="right custom_button" style="margin-top: 8px;" href="'.$this->config->base_url.'donate/cuenta-digital/' . $packages['id'] . '">' . _('Buy Now') . '</a>
									</li>
							</ul>';
                        }
                    } else {
                        echo '<div class="i_note">' . _('No Cuenta Digital Packages Found.') . '</div>';
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