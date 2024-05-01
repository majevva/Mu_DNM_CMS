<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Files'); ?></h1>
        </div>
		<?php
			if(empty($downloads)):
				echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('Currently no download links.') . '</div></div>';
			else:
				foreach($downloads as $download):
					?>
					<div class="box-style1" style="margin-bottom: 20px;">
						<h3 class="title"><?php echo htmlspecialchars($download['link_name']); ?></h3>
						<div class="entry">
							<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td align="left" style="padding-bottom: 10px; padding-left: 20px;">
										<?php echo _('Description'); ?>:
										<b><?php echo htmlspecialchars($download['link_desc']); ?></b><br/>
										<?php echo _('Size'); ?>:
										<b><?php echo htmlspecialchars($download['link_size']); ?></b><br/>
										<?php echo _('Type'); ?>:
										<b><?php echo htmlspecialchars($download['link_type']); ?></b><br/>
									</td>
									<td width="200px" align="right"><a
											href="<?php echo htmlspecialchars($download['link_url']); ?>"
											target="_blank"><img
												src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/download.png"
												title="<?php echo _('Download'); ?>"
												border="0"></a></td>
								</tr>
							</table>
						</div>
					</div>
					<?php
				endforeach;
			endif;
		?>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	