<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('News'); ?></h2>
	</div>
	<div class="content_rght_info">
	<?php
		if (empty($news)):
			echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('No News Articles') . '</div></div>';
		else:
			if($this->config->config_entry('news|storage') != 'facebook'){
				foreach ($news as $key => $article):
					?>
					<h3><a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></h3>
					<div class="news"><?php echo str_replace('Â', '&nbsp;', $article['content']); ?></div>
					<h6><?php echo _('Posted'); ?> <?php echo date('d / m / Y', $article['time']); ?> <a href="<?php echo $article['url']; ?>"><img src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry("main|template");?>/images/msg-img.png" width="16" height="11" alt="<?php echo _('Discuss On Forum'); ?>" /></a></h6>	
					<?php
				endforeach;
			}
			else{
				echo '<div style="margin-left:90px;">'.str_replace('(document, script, facebook-jssdk)', '(document, \'script\', \'facebook-jssdk\')', $news['contents']).'</div>';
			}
		endif;
	?>
	<?php
	if (isset($pagination)) {
		?>
		<div style="padding:10px;text-align:center;">
			<table style="width: 100%;">
				<tr>
					<td><?php echo $pagination; ?></td>
				</tr>
			</table>
		</div>
		<?php
	}
	?>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	