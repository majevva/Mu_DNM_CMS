<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Warehouse'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('View or sell your items'); ?></h2>
            <div class="entry">
                <div style="float:right;">
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>warehouse/web"><?php echo _('Web Warehouse'); ?></a>
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a>
                    <a class="btn-enter auth"
                       href="<?php echo $this->config->base_url; ?>market/history"><?php echo _('History'); ?></a>
                </div>
                <div style="padding-top:40px;"></div>
                <?php
                    if(isset($error)){
                        echo '<div class="alert-box e_note">' . $error . '</div>';
                    }
                    else{
                    if($this->config->config_entry('market|module_status') == 1){
                        ?>
                        <script>
                            var total = 0;
                            var tax = 0;
                            $(document).ready(function () {
                                $('div.square').each(function () {
                                    App.initializeTooltip($(this), true, 'warehouse/item_info');
                                });

                                $('#payment_method').on('change', function () {
                                    if ($.inArray($(this).val(), ['4', '5', '6', '7', '8', '9']) !== -1) {
                                        $('#price_with_tax').hide('slow');
                                    }
                                    else {
                                        $('#price_with_tax').show('slow');
                                    }
                                });
                            });

                            function calculate_tax(val) {
                                $(document).ready(function () {
                                    if ((val.toString().search(/^-?[0-9]+$/) != 0)) {
                                        $('#price').val('0');
                                        $('#price_tax').val('0');
                                    }
                                    else {
                                        total = (parseInt(val) / 100) * parseInt(<?php echo $this->config->config_entry('market|sell_tax');?>);
                                        tax = Math.round((parseInt(val) + total));
                                        $('#price_tax').val(tax);
                                    }
                                });
                            }

                            $(document).ready(function () {
                                $('#highlight').on('click', function () {
                                    if (this.checked) {
                                        App.notice('<?php echo _('Info');?>', 'success', '<?php echo vsprintf(_('You Item Will Be Highlighted In Market. Price %d %s.'), [$this->config->config_entry('market|price_highlight'), $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1')]); ?>', 1);
                                    }
                                    else {
                                        $('.message-box').hide();
                                    }
                                });
                            });
                        </script>
                        <div id="option_buttons" style="display:none;">
                            <button type="submit" class="btn-enter auth"
                                    <?php if($this->config->config_entry('warehouse|allow_move_to_web_warehouse') == 1) { ?>style="float:left;"
                                    <?php }else{ ?>style="margin: 0 auto;"<?php } ?>
                                    id="sell_item_show"><?php echo _('Sell Item'); ?></button>
                            <?php if($this->config->config_entry('warehouse|allow_move_to_web_warehouse') == 1){ ?>
                                <button type="submit" class="btn-enter auth" style="float:right;"
                                        id="move_to_web_wh"><?php echo _('Move To Web'); ?></button><?php } ?>
                        </div>
                        <div style="clear:both;"></div>
						<div style="padding-top:5px;"></div>
                        <div class="form" id="sell_item">
                            <form method="post" action="<?php echo $this->config->base_url; ?>warehouse"
                                  id="sell_item_form">
                                <?php $this->csrf->writeToken(); ?>
                                <table>
                                    <tr>
                                        <td><?php echo _('Payment Type'); ?></td>
                                        <td>
                                            <select class="custom-select" name="payment_method" id="payment_method">
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_credits') == 1){ ?>
                                                    <option
                                                        value="1"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_gcredits') == 1){ ?>
                                                    <option
                                                        value="2"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_zen') == 1){ ?>
                                                    <option
                                                        value="3"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_3'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_chaos') == 1){ ?>
                                                    <option
                                                        value="4"><?php echo _('Jewel Of Chaos'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_bless') == 1){ ?>
                                                    <option
                                                        value="5"><?php echo _('Jewel Of Bless'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_soul') == 1){ ?>
                                                    <option
                                                        value="6"><?php echo _('Jewel Of Soul'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_life') == 1){ ?>
                                                    <option
                                                        value="7"><?php echo _('Jewel Of Life'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_creation') == 1){ ?>
                                                    <option
                                                        value="8"><?php echo _('Jewel Of Creation'); ?></option><?php } ?>
                                                <?php if($this->config->config_entry('warehouse|allow_sell_for_harmony') == 1){ ?>
                                                    <option
                                                        value="9"><?php echo _('Jewel Of Harmony'); ?></option><?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:150px;"><?php echo _('Price'); ?></td>
                                        <td><input type="text" name="price" id="price" value="0"
                                                   onblur="calculate_tax($('#price').val());"
                                                   onkeyup="calculate_tax($('#price').val());"/></td>
                                    </tr>
                                    <tr id="price_with_tax">
                                        <td><?php echo _('Price + Tax'); ?>
                                            (<?php echo $this->config->config_entry('market|sell_tax'); ?>%)
                                        </td>
                                        <td><input type="text" name="price_tax" id="price_tax" value="0" disabled/></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo _('Selling Period'); ?></td>
                                        <td>
                                            <select class="custom-select" name="time" id="time">
                                                <option value="1">
                                                    1 <?php echo _('Day'); ?></option>
                                                <option value="2">
                                                    2 <?php echo _('Days'); ?></option>
                                                <option value="3">
                                                    3 <?php echo _('Days'); ?></option>
                                                <option value="4">
                                                    4 <?php echo _('Days'); ?></option>
                                                <option value="5">
                                                    5 <?php echo _('Days'); ?></option>
                                                <option value="7">
                                                    7 <?php echo _('Days'); ?></option>
                                                <option value="14">
                                                    14 <?php echo _('Days'); ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php
                                        if(isset($char_list) && $char_list != false):
                                            ?>
                                            <tr>
                                                <td><?php echo _('Seller'); ?></td>
                                                <td>
                                                    <select class="custom-select" name="char" id="char">
                                                        <?php foreach($char_list as $char): ?>
                                                            <option
                                                                value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                        endif;
                                    ?>
                                    <tr>
                                        <td><label for="highlight"><?php echo _('Highlight Item'); ?></label>
                                        </td>
                                        <td><input type="checkbox" name="highlight" id="highlight" value="1"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" id="sell_item_button" class="btn-enter auth"><?php echo _('Sell Items'); ?></button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div style="padding-top:5px;"></div>
                    <?php
                        }
                        if($this->config->config_entry('warehouse|allow_delete_item') == 1): ?>
                        <div
                            class="i_note"><?php echo _('Right mouse click if you want to delete item.'); ?></div>
                        <?php
                    endif;
                        $float = '';
                        if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_size') > 1920){
                            $float = 'float:left;';
                        }
                        $wh_content = '<div class="wh_items" style="' . $float . 'background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/wh.jpg)" id="wh_content">' . "\n";
                        for($i = 1; $i <= 120; $i++){
                            if(isset($items[$i])){
                                $wh_content .= '<div id="item-slot-' . $i . '" class="square" style="margin-top:' . ($items[$i]['yy'] * 32) . 'px; margin-left:' . ($items[$i]['xx'] * 32) . 'px; width:' . ($items[$i]['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/wh_root_on.png); height:' . ($items[$i]['y'] * 32) . 'px;" data-info="' . $items[$i]['hex'] . '"><img alt="' . $items[$i]['name'] . '" src="' . $this->itemimage->load($items[$i]['item_id'], $items[$i]['item_cat'], $items[$i]['level'], 0) . '" /></div>' . "\n";
                            }
                            else{
                                $wh_content .= '<div id="item-slot-' . $i . '"></div>' . "\n";
                            }
                        }
                        $wh_content .= '</div>';
                        echo $wh_content;
                        if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_size') > 1920){
                            $wh_content2 = '<div class="wh_items" style="float:right; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/wh.jpg)">';
                            foreach($items AS $key => $item){
                                if($key > 120){
                                    $wh_content2 .= '<div id="item-slot-' . $key . '" class="square" style="margin-top:' . ($item['yy'] * 32) . 'px; margin-left:' . ($item['xx'] * 32) . 'px; width:' . ($item['x'] * 32) . 'px; background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/wh_root_on.png); height:' . ($item['y'] * 32) . 'px;" data-info="' . $item['hex'] . '"><img alt="' . $item['name'] . '" src="' . $this->itemimage->load($item['item_id'], $item['item_cat'], $item['level'], 0) . '" /></div>' . "\n";
                                }
                            }
                            $wh_content2 .= '</div><div style="clear:both;"></div>';
                            echo $wh_content2;
                        }
                        ?>
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
	