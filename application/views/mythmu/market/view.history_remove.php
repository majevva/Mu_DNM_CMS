<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('History'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Market History'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)):
                        echo '<div class="e_note">' . $error . '</div>';
                    endif;
                    if(isset($success)):
                        echo '<div class="s_note">' . $success . '</div>';
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	