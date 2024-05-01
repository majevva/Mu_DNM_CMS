<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('History'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Market History'); ?>			
			</h2>
			 <div class="entry">
                <?php
                if (isset($error)):
                    echo '<div class="e_note">' . $error . '</div>';
                endif;
                if (isset($success)):
                    echo '<div class="s_note">' . $success . '</div>';
                endif;
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	