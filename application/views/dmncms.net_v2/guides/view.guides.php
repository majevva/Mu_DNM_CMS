<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Guides'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <?php
			if (empty($guides)):
				echo '<div class="i_note">' . _('No Guides Articles') . '</div>';
			else:
			?>
			<div class="entry">
				<ul class="style2">
			<?php
				$i = 0;
				foreach ($guides as $key => $article):
				$style = ($i == 0) ? 'class="first"' : '';
			?>
				<li <?php echo $style;?>><a href="<?php echo $this->config->base_url;?>guides/read/<?php echo $this->website->seo_string($article['title']);?>/<?php echo $article['id'];?>"><?php echo $article['title'];?><a/></li>	
						
					
			<?php
				$i++;
				endforeach;   
			?>
				</ul>
			</div>	
			<?php endif;?>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	