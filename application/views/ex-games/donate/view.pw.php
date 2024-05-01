<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Donate'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('With PaymentWall'); ?></h2>

            <div class="entry">
                <div
                    style="background: rgba(255, 255, 255, 0.6);border: 1px solid rgba(0, 0, 0, 0.15);-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin:3px;">
                    <div style="padding: 5px; text-align: center;">
                        <iframe
                            src="http://wallapi.com/api/ps/?key=<?php echo $donation_config['api_key']; ?>&uid=<?php echo $this->session->userdata(['user' => 'username']) . '-server-' . $this->session->userdata(['user' => 'server']); ?>&widget=<?php echo $donation_config['widget']; ?>&customer[username]=<?php echo $this->session->userdata(['user' => 'username']); ?>&email=<?php echo $this->session->userdata(['user' => 'email']); ?>&customer[current_server]=<?php echo $this->session->userdata(['user' => 'server']); ?>&history[registration_date]=<?php echo strtotime($this->session->userdata(['user' => 'joined'])); ?>&history[login_number]=<?php echo $this->session->userdata(['user' => 'id']); ?>&history[last_login_ip]=<?php echo $this->session->userdata(['user' => 'last_ip']); ?>"
                            width="<?php echo $donation_config['width']; ?>"
                            height="<?php echo $donation_config['height']; ?>"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	