<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('About Server'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Information About'); ?> <?php echo $this->config->config_entry('main|servername'); ?></h2>

            <div class="entry">
                <div style="float:right;">
                    <?php
                    foreach ($this->website->server_list() as $key => $server):
                        if ($server['visible'] == 1):
                            ?>
                            <a class="custom_button"
                               href="<?php echo $this->config->base_url; ?>about/stats/<?php echo $key; ?>"><?php echo $server['title']; ?> <?php echo _('Statistics'); ?></a>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
                <div style="padding-top:40px;">
                    <?php echo _('Evo Mu Online opened on 25. february 2017! Server is based on custom S6ep3 server files with custom wings and events!.'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	