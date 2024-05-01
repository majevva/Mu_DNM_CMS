<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Files'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<?php
            if (empty($downloads)):
                echo '<div class="i_note">' . _('Currently no download links.') . '</div>';
            else:
                foreach ($downloads as $download):
                    ?>
                    <div class="other">
                        <h2 class="title"><?php echo htmlspecialchars($download['link_name']); ?></h2>
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
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	