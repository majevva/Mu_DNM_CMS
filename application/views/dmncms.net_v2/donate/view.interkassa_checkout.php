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
                    ?>
					<div class="entry">
						<form action="<?php echo $payment->getFormAction(); ?>" method="post">
							<?php foreach ($payment->getFormValues() as $field => $value): ?>
							<input type="hidden" name="<?php echo $field; ?>" value="<?php echo $value; ?>" />
							<?php endforeach; ?>
							<input type="hidden" name="ik_x_userinfo" value="<?php echo $this->session->userdata(array('user' => 'username'));?>-server-<?php echo $this->session->userdata(array('user' => 'server'));?>" />
							<div style="text-align:center;">
								<button class="flatbtn-blu m5_top" type="submit"><?php echo _('Buy Now');?></button>
							</div>
						</form>
					</div>
					<?php
                }
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	