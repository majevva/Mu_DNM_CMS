<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Auction'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Add Character To Auction'); ?></h2>

            <div class="entry">
                <div style="float:right;">
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction">View All Lots</a>
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction/my-bets">My Bets</a>
                    <a class="custom_button" href="<?php echo $this->config->base_url; ?>auction/my-characters">My Characters</a>
                </div>
                <div style="padding-top:40px;">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	