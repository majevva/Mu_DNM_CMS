<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('History'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Market History'); ?></h2>

            <div class="entry">
                <div style="float:right;">
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a>
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>warehouse/web"><?php echo _('Web Warehouse'); ?></a>
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a>
                </div>
                <div style="padding-top:40px;"></div>
                <script>
                    $(document).ready(function () {
                        $('span[id^="market_item_"]').each(function () {
                            App.initializeTooltip($(this), true, 'warehouse/item_info_image');
                        });
                    });
                </script>
                <?php if(isset($items) && !empty($items)): ?>
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <td>#</td>
                            <td><?php echo _('Item'); ?></td>
                            <td><?php echo _('Price'); ?></td>
                            <td><?php echo _('Status'); ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($items as $item):
                                if($item['sold'] == 1){
                                    $status = _('Sold');
                                }
                                elseif($item['removed'] == 1){
                                    $status = _('Removed');
                                }
                                else{
                                    $status = '<a href="' . $this->config->base_url . 'market/remove/' . $item['id'] . '">' . _('Remove') . '</a>';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $item['pos']; ?></td>
                                    <td><span id="market_item_<?php echo $item['pos']; ?>"
                                              data-info="<?php echo $item['item']; ?>"><?php echo $item['name']; ?></span>
                                    </td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $status; ?></td>
                                </tr>
                                <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if(isset($pagination)):
                        ?>
                        <table style="width: 100%;">
                            <tr>
                                <td><?php echo $pagination; ?></td>
                            </tr>
                        </table>
                        <?php
                    endif;
                    ?>
                    <?php
                else:
                    ?>
                    <div
                        class="w_note"><?php echo _('No Items Found.'); ?></div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	