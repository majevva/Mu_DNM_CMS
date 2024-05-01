<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php if (empty($error)) {
				echo $news['title'];
			} else {
				echo 'Undefined';
			} ?></h2>
	</div>
	<div class="content_rght_info">
		<?php
			 if (!empty($error)):
				echo '<div style="padding: 0 30px 0px 50px;"><div class="e_note">' . $error . '</div></div>';
			endif;
		?>
		<div class="news"><?php echo str_replace('Â', '&nbsp;', $news['news_content_full']); ?></div>
		<h6><?php echo _('Posted'); ?> <?php echo date('d / m / Y', $news['time']); ?></h6>			
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	