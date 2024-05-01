<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
if (empty($news)):
	echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('No News Articles') . '</div></div>';
else:
	if($this->config->config_entry('news|storage') != 'facebook'){
		foreach ($news as $key => $article):
			?>
			
	<div id="news-id">
		<div id="news-title"><?php echo $article['title']; ?></div>
		<?php if($article['icon'] != 'http://'){?><div id="news-img"><img src="<?php echo $article['icon'];?>"></div><?php }?>
		<div id="news-info">
			<div id="update"><?php echo _('Announcement');?></div>
			<div id="time"><?php echo _('Posted'); ?> <?php echo date('d / m / Y', $article['time']); ?></div>
		</div>
		<div id="news-content">
		<?php echo str_replace('Â', '&nbsp;', $article['content']); ?>								
			<?php if ($this->config->config_entry('news|storage') != 'dmn'): ?>
				<p class="links"><span class="comments"><a
							href="<?php echo $article['url']; ?>"
							target="_blank"><?php echo _('Discuss On Forum'); ?></a></span>
				</p>
			<?php endif; ?>
		</div>
	</div>
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
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>