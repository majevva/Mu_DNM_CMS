<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
	<div id="messages"></div>

        <div id="box1">
			<?php
				if(empty($news)):
					echo '<div class="i_note">' . _('No News Articles') . '</div>';
				else:
					if($this->config->config_entry('news|storage') != 'facebook'):
						foreach($news as $key => $article):
							?>
							<div class="col-lg-12">
								<div class="thumbnail">
									<div class="thumbnail-header">
										<h3><a href="<?php echo $article['url']; ?>" class="hvr-underline-from-center"><?php echo $article['title']; ?></a></h3>
										<div class="social" style="margin-top: -34px;margin-left: 385px;position: absolute;">
											<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" tppabs="http://yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
											<script type="text/javascript" src="//yastatic.net/share2/share.js" tppabs="http://yastatic.net/share2/share.js" charset="utf-8"></script>
											<div class="ya-share2" style="" data-services="facebook,twitter,gplus" data-size="s" data-url="<?php echo $article['url']; ?>"></div>
										</div>
										<span class="clock"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/clocks.png" alt="clocks"><time><?php echo date('d / m / Y', $article['time']); ?></time></span>
									</div>
									<div class="caption">
										<div style="width:600px;"><?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content']))); ?></div>
									</div>
								</div>
							</div>
							<?php
						endforeach;
					else:
						echo '<div style="margin-left:90px;">' . str_replace('(document, script, facebook-jssdk)', '(document, \'script\', \'facebook-jssdk\')', $news['contents']) . '</div>';
					endif;
				endif;
			?>
			<?php
			if(isset($pagination)):
				echo '<div class="col-lg-4">'.$pagination.'</div>';
			endif;
			?>
		</div>		
   
<?php
	$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>