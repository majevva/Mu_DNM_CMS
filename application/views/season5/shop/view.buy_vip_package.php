<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Buy vip'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php if(isset($vip_data['package_title'])){
                    echo $vip_data['package_title'];
                }
                else{
                    echo 'Undefined';
                } ?></h2>

            <div class="entry">
                <?php if(isset($package_error)): ?>
                    <div class="e_note"><?php echo $package_error; ?></div>
                <?php else: ?>
                    <?php
                    if(isset($error)):
                        echo '<div class="e_note">' . $error . '</div>';
                    endif;
                    if(isset($success)):
                        echo '<div class="s_note">' . $success . '</div>';
                    endif;
                    ?>
                    <form method="POST" action="" id="buy_vip">
                        <table class="add_to_card" cellspacing="0">
                            <thead>
                            <tr>
                                <th colspan="2"><?php echo _('Vip Package Details'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo _('Time'); ?></td>
                                <td><?php echo $this->website->seconds2days($vip_data['vip_time']); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo _('Price'); ?></td>
                                <td><?php echo $vip_data['price'] . ' ' . $this->website->translate_credits($vip_data['payment_type'], $vip_data['server']); ?></td>
                            </tr>
                            <?php if($vip_data['reset_price_decrease'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Reset Zen Discount'); ?></td>
                                    <td>
                                        -<?php echo $this->website->zen_format($vip_data['reset_price_decrease']); ?> <?php echo _('Zen'); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['reset_level_decrease'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Reset Level Decrease'); ?></td>
                                    <td>-<?php echo $vip_data['reset_level_decrease']; ?> <?php echo _('LvL'); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['grand_reset_bonus_credits'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Grand Reset Bonus Credits'); ?></td>
                                    <td><?php echo $vip_data['grand_reset_bonus_credits']; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['hide_info_discount'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Hide Character Info Discount'); ?></td>
                                    <td><?php echo $vip_data['hide_info_discount']; ?> %</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['pk_clear_discount'] > 0): ?>
                                <tr>
                                    <td><?php echo _('PK Clear Discount'); ?></td>
                                    <td>
                                        -<?php echo $this->website->zen_format($vip_data['pk_clear_discount']); ?> <?php echo _('Zen'); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['clear_skilltree_discount'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Clear SkillTree Discount'); ?></td>
                                    <td><?php echo $vip_data['clear_skilltree_discount']; ?> %</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['online_hour_exchange_bonus'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Online Hours Exchange Bonus Credits'); ?></td>
                                    <td><?php echo $vip_data['online_hour_exchange_bonus']; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['change_name_discount'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Change Character Name Discount'); ?></td>
                                    <td><?php echo $vip_data['change_name_discount']; ?>%</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['bonus_credits_for_donate'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Bonus Credits For Donation'); ?></td>
                                    <td><?php echo $vip_data['bonus_credits_for_donate']; ?>%</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['shop_discount'] > 0): ?>
                                <tr>
                                    <td><?php echo _('Shop Discount'); ?></td>
                                    <td><?php echo $vip_data['shop_discount']; ?>%</td>
                                </tr>
                            <?php endif; ?>
                            <?php if($vip_data['server_vip_package'] != NULL && $vip_data['server_bonus_info']): ?>
                                <tr>
                                    <th colspan="2"><?php echo _('Server Bonus Info'); ?><?php echo isset($vip_title) ? ': Vip ' . $vip_title : ''; ?></th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $vip_data['server_bonus_info']; ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="text-align:center;" colspan="2">
                                    <button type="submit" class="custom_button" id="buy_vip" name="buy_vip"
                                            value="buy_vip"><?php echo _('Buy Vip'); ?></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
