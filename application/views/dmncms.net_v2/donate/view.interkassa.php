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
				<?php echo _('With Interkassa'); ?>
			</h2>
			<div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    if (!empty($interkassa_packages)) {
                        foreach ($interkassa_packages as $packages) {
                            echo '<ul id="paypal-options">
									<li>
										<h4 class="left">' . $packages['package'] . '</h4>
										<h3 class="left"><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))) . ' (<span id="price_' . $packages['id'] . '">' . number_format($packages['price'], 0, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">' . $packages['currency'] . '</span>)</h3>
										<a class="right custom_button" href="'.$this->confog->base_url.'donate/interkassa/' . $packages['id'] . '">' . _('Buy Now') . '</a>
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