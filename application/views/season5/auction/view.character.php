<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Lot Character Info'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title">
                <?php $args = $this->request->get_args(); ?>
                <?php echo sprintf(_('Character %d '), $this->website->hex2bin($args[0])); ?>
            </h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    }
                    else{
                        ?>
                        <script>
                            $(document).ready(function () {
                                $('#inventory div').each(function () {
                                    App.initializeTooltip($(this), true, 'warehouse/item_info');
                                });
                                $('div[id^="item-slot-occupied-"]').each(function () {
                                    App.initializeTooltip($(this), true, 'warehouse/item_info');
                                });
                            })
                        </script>
                        <div id="auction_bet">
                            <div class="modal-header">
                                <h2><?php echo _('Make Bet'); ?></h2>
                                <a class="close" href="javascript:;"></a>
                            </div>
                            <div style="margin: 20px;">
                                <div class="form" style="text-align:center;">
                                    <?php
                                        if($my_bets != false){
                                            $placeholder = 'Increase your bet';
                                            echo 'Your Last Bet: <span id="last_bet">' . $my_bets['bet'] . '</span> ' . $this->website->translate_credits($this->config->config_entry('auction_' . $this->session->userdata(['user' => 'server']) . '|char_sell_price_type'), $this->session->userdata(['user' => 'server']));
                                        }
                                        else{
                                            $placeholder = 'Enter your bet';
                                        }
                                    ?>
                                    <form method="post" action="" name="auction_form" id="auction_form">
                                        <input type="hidden" name="char"
                                               value="<?php echo $this->website->hex2bin($args[0]); ?>"/>
                                        <input type="text" name="bet" id="bet" value="" required
                                               placeholder="<?php echo $placeholder; ?>" pattern="[0-9]+"
                                               title="Allowed only numbers: [0-9]"/>
                                        <button type="submit" class="auction_bet_button"
                                                id="make_bet"><?php echo _('Bet'); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <td colspan="2" style="padding-left: 15px;"><?php echo _('Information'); ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="width: 70px;">
                                    <img
                                        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/c_class/<?php echo strtolower($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png"
                                        alt="<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?>"/>
                                </td>
                                <td style="width: 240px;">
                                    <table style="width:100%;margin: 0 auto;">
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Character'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->Mcharacter->char_info['Name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Class'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Level'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->Mcharacter->char_info['cLevel']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Resets'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->Mcharacter->char_info[$this->config->config_entry('rankings|res_col')]; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Grand Reset'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->Mcharacter->char_info[$this->config->config_entry('rankings|g_res_col')]; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('PK Level'); ?></td>
                                            <td style="width:70%;text-align: left;"><?php echo $this->website->pk_level($this->Mcharacter->char_info['PkLevel']); ?>
                                                (<?php echo $this->Mcharacter->char_info['PkCount']; ?>)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Location'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo $this->website->get_map_name($this->Mcharacter->char_info['MapNumber']); ?>
                                                (<?php echo $this->Mcharacter->char_info['MapPosX']; ?>
                                                x<?php echo $this->Mcharacter->char_info['MapPosY']; ?>)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Strength'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo $this->Mcharacter->char_info['Strength']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Agility'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo $this->Mcharacter->char_info['Dexterity']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Vitality'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo $this->Mcharacter->char_info['Vitality']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Energy'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo $this->Mcharacter->char_info['Energy']; ?>
                                            </td>
                                        </tr>
                                        <?php if(in_array($this->Mcharacter->char_info['Class'], [64, 65, 66])){ ?>
                                            <tr>
                                                <td style="width:30%;text-align: left;"><?php echo _('Command'); ?></td>
                                                <td style="width:70%;text-align: left;">
                                                    <?php echo $this->Mcharacter->char_info['Leadership']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td style="width:30%;text-align: left;"><?php echo _('Last Bid'); ?></td>
                                            <td style="width:70%;text-align: left;">
                                                <?php echo ($auction_info['last_bid'] != NULL) ? $auction_info['last_bid'] : 'No Bids'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:100%;text-align: left;" colspan="2">
                                            <span id="auction_count_down"><script>$(document).ready(function () {
                                                        App.count_down('<?php echo date('Y/m/d h:i', $auction_info['auction_end_time']); ?>', '#auction_count_down');
                                                    });</script></span>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table style="text-align: center;width:100%;padding:10px;">
                            <tr>
                                <td style="text-align: center;">
                                    <button type="submit" class="button-style2"
                                            data-modal-div="auction_bet"><?php echo _('Make Bet'); ?></button>
                                </td>
                            </tr>
                        </table>
                        <div style="width: 100%;text-align: center;margin-top:10px;">
                            <div id="inventory"
                                 style="display: inline-block;position:relative; height:407px;width:400px; background:url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/inventories/inv_<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class'], true); ?>.png) no-repeat left top;">
                                <?php if($equipment[7] != 0){ ?>
                                    <div data-info="<?php echo $equipment[7]['hex']; ?>" id="wings"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[7]['item_id'], $equipment[7]['item_cat'], $equipment[7]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[2] != 0){ ?>
                                    <div data-info="<?php echo $equipment[2]['hex']; ?>" id="helm"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[2]['item_id'], $equipment[2]['item_cat'], $equipment[2]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[9] != 0){ ?>
                                    <div data-info="<?php echo $equipment[9]['hex']; ?>" id="pendant"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[9]['item_id'], $equipment[9]['item_cat'], $equipment[9]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[0] != 0){ ?>
                                    <div data-info="<?php echo $equipment[0]['hex']; ?>" id="sword"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[0]['item_id'], $equipment[0]['item_cat'], $equipment[0]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[1] != 0){ ?>
                                    <div data-info="<?php echo $equipment[1]['hex']; ?>" id="shield"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[1]['item_id'], $equipment[1]['item_cat'], $equipment[1]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[3] != 0){ ?>
                                    <div data-info="<?php echo $equipment[3]['hex']; ?>" id="armor"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[3]['item_id'], $equipment[3]['item_cat'], $equipment[3]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[4] != 0){ ?>
                                    <div data-info="<?php echo $equipment[4]['hex']; ?>" id="pants"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[4]['item_id'], $equipment[4]['item_cat'], $equipment[4]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[5] != 0){ ?>
                                    <div data-info="<?php echo $equipment[5]['hex']; ?>" id="gloves"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[5]['item_id'], $equipment[5]['item_cat'], $equipment[5]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[6] != 0){ ?>
                                    <div data-info="<?php echo $equipment[6]['hex']; ?>" id="boots"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[6]['item_id'], $equipment[6]['item_cat'], $equipment[6]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[10] != 0){ ?>
                                    <div data-info="<?php echo $equipment[10]['hex']; ?>" id="ring_left"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[10]['item_id'], $equipment[10]['item_cat'], $equipment[10]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                                <?php if($equipment[11] != 0){ ?>
                                    <div data-info="<?php echo $equipment[11]['hex']; ?>" id="ring_right"
                                         style="background: url(<?php echo $this->itemimage->load($equipment[11]['item_id'], $equipment[11]['item_cat'], $equipment[11]['level'], 0); ?>) no-repeat center center;">
                                        &nbsp;</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div style="float:left;width:320px;margin-top:5px;">
                            <div class="waretitle" style="width:255px;text-align:center;">Inventory</div>
                            <div>
                                <?php
                                    $inv_content = '';
                                    foreach($inventory AS $key => $item){
                                        if(isset($item['hex'])){
                                            $data = 'data-info="' . $item['hex'] . '"';
                                            $inv_content .= '<div id="item-slot-occupied-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:999;width:' . ($item['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:' . ($item['y'] * 32) . 'px;" ' . $data . '><img width="100%" height="100%" alt="' . $item['name'] . '" src="' . $this->itemimage->load($item['item_id'], $item['item_cat'], $item['level'], 0) . '" /></div>' . "\n";
                                        }
                                        else{
                                            $inv_content .= '<div id="item-slot-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:1;width:32px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:32px;"></div>' . "\n";
                                        }
                                    }
                                    echo $inv_content;
                                ?>
                            </div>

                            <?php if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_size') > 1920){ ?>
                                <div style="margin-top: 280px;">
                                    <div class="waretitle" style="width:255px;text-align:center;">Expanded Inventory 1
                                    </div>
                                    <?php
                                        $inv_content = '';
                                        foreach($inventory2 AS $key => $item){
                                            if(isset($item['hex'])){
                                                $data = 'data-info="' . $item['hex'] . '"';
                                                $inv_content .= '<div id="item-slot-occupied-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:999;width:' . ($item['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:' . ($item['y'] * 32) . 'px;" ' . $data . '><img width="100%" height="100%" alt="' . $item['name'] . '" src="' . $this->itemimage->load($item['item_id'], $item['item_cat'], $item['level'], 0) . '" /></div>' . "\n";
                                            }
                                            else{
                                                $inv_content .= '<div id="item-slot-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:1;width:32px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:32px;"></div>' . "\n";
                                            }
                                        }
                                        echo $inv_content;
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div style="float:left;margin-top:5px;">
                            <div>
                                <div class="waretitle" style="width:255px;text-align:center;">Personal Store</div>
                                <?php
                                    $inv_content = '';
                                    foreach($store AS $key => $item){
                                        if(isset($item['hex'])){
                                            $data = 'data-info="' . $item['hex'] . '"';
                                            $inv_content .= '<div id="item-slot-occupied-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:999;width:' . ($item['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:' . ($item['y'] * 32) . 'px;" ' . $data . '><img width="100%" height="100%" alt="' . $item['name'] . '" src="' . $this->itemimage->load($item['item_id'], $item['item_cat'], $item['level'], 0) . '" /></div>' . "\n";
                                        }
                                        else{
                                            $inv_content .= '<div id="item-slot-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:1;width:32px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:32px;"></div>' . "\n";
                                        }
                                    }
                                    echo $inv_content;
                                ?>
                            </div>
                            <?php if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_size') > 1920){ ?>
                                <div style="margin-top: 280px;">
                                    <div class="waretitle" style="width:255px;text-align:center;">Expanded Inventory 2
                                    </div>
                                    <?php
                                        $inv_content = '';
                                        foreach($inventory3 AS $key => $item){
                                            if(isset($item['hex'])){
                                                $data = 'data-info="' . $item['hex'] . '"';
                                                $inv_content .= '<div id="item-slot-occupied-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:999;width:' . ($item['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:' . ($item['y'] * 32) . 'px;" ' . $data . '><img width="100%" height="100%" alt="' . $item['name'] . '" src="' . $this->itemimage->load($item['item_id'], $item['item_cat'], $item['level'], 0) . '" /></div>' . "\n";
                                            }
                                            else{
                                                $inv_content .= '<div id="item-slot-' . $key . '" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; position:absolute; z-index:1;width:32px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/v.gif); height:32px;"></div>' . "\n";
                                            }
                                        }
                                        echo $inv_content;
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	