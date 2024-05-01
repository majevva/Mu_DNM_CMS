<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Media'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
			<?php echo _('Wallpapers'); ?>
			</h2>
            <div class="entry">
                <?php
                if (isset($error)):
                    ?>
                    <div class="i_note"><?php echo $error; ?></div>
                    <?php
                endif;
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.thumbnail a').colorbox({
                            rel: 'thumbnail a',
                            transition: "elastic",
                            maxWidth: "95%",
                            maxHeight: "95%"
                        });
                    });
                </script>
                <ul class="thumbnails wallpapers">
                    <?php
                    if (isset($gallery)) {
                        foreach ($gallery as $key => $value) {
                            echo '<li id="image-' . $value['id'] . '" class="thumbnail">
										<a style="background:url(' . $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($value['name'], '.', true) . '_thumb' . $this->website->strstr_alt($value['name'], '.', false) . ');" href="' . $this->config->base_url . 'assets/uploads/normal/' . $value['name'] . '"><img class="grayscale" src="' . $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($value['name'], '.', true) . '_thumb' . $this->website->strstr_alt($value['name'], '.', false) . '" alt=""></a>
									  </li>';
                        }
                    }
                    ?>
                </ul>
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
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	