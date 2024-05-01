<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Registration'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<?php
        if (isset($error)):
            ?>
            <div class="e_note"><?php echo $error; ?></div>
            <?php
        endif;
        if (isset($success)):
            ?>
            <div class="s_note"><?php echo $success; ?></div>
            <?php
        endif;
        ?>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	