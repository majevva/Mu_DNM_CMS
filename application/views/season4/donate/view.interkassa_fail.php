<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Donate'); ?></h1>
        </div>
        <div style="padding: 0 30px 0px 50px;">
            <div class="e_note"><?php echo _('Your payment failed. Please try again or contact support.'); ?></div>
        </div>

    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	