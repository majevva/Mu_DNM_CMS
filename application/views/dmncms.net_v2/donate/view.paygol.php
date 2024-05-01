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
				<?php echo _('With PayGol'); ?>
			</h2>
			<div class="entry">
                <div style="text-align: center;">
                    <form name="pg_frm" method="post" action="http://www.paygol.com/micropayment/paynow">
                        <input type="hidden" name="pg_serviceid"
                               value="<?php echo $donation_config['service_id']; ?>">
                        <input type="hidden" name="pg_currency"
                               value="<?php echo $donation_config['currency_code']; ?>">
                        <input type="hidden" name="pg_name"
                               value="Buy <?php echo $donation_config['reward']; ?> <?php echo $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(array('user' => 'server'))); ?>">
                        <input type="hidden" name="pg_custom"
                               value="<?php echo $this->session->userdata(array('user' => 'username')); ?>-server-<?php echo $this->session->userdata(array('user' => 'server')); ?>">
                        <input type="hidden" name="pg_price"
                               value="<?php echo $donation_config['service_price']; ?>">
                        <input type="hidden" name="pg_return_url"
                               value="<?php echo $this->config->base_url; ?>donate/paygol">
                        <input type="hidden" name="pg_cancel_url"
                               value="<?php echo $this->config->base_url; ?>donate/paygol">
                        <input type="image" name="pg_button"
                               src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0"
                               alt="Make payments with PayGol: the easiest way!"
                               title="Make payments with PayGol: the easiest way!">
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	