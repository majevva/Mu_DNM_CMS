<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Reset'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Reset your character level'); ?></h2>

            <div class="entry">
                <?php
                    if(!isset($disabled)){
                        if(isset($char_list) && $char_list != false){
                            ?>
                            <table class="ranking-table">
                                <thead>
                                <tr class="main-tr">
                                    <th><?php echo _('Character'); ?></th>
                                    <th><?php echo _('Res / Limit'); ?></th>
                                    <th><?php echo _('LvL / Req'); ?></th>
                                    <th><?php echo _('Zen / Req'); ?></th>
                                    <th><?php echo _('Manage'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($char_list as $char){
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(['user' => 'server']); ?>"><?php echo $char['name']; ?></a>
                                            </td>
                                            <td><span
                                                    id="resets-<?php echo bin2hex($char['name']); ?>"><?php echo $char['resets']; ?></span> / <?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_limit'); ?>
                                            </td>
                                            <td style="padding:0;">
												<span
                                                    id="lvl-<?php echo bin2hex($char['name']); ?>"><?php if($char['level'] < $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_lvl')){ ?>
                                                        <span
                                                            style="color: red;"><?php echo $char['level']; ?></span><?php }
                                                    else{ ?><?php echo $char['level']; ?><?php } ?></span> / <?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_lvl'); ?>
                                            </td>
                                            <td><?php echo $this->website->zen_format($char['money']); ?> /
                                                <?php
                                                    if($this->config->config_entry('account|is_igcn_vip')){
                                                        $vip_time = $this->Maccount->check_vip_time_igcn();
                                                        if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_x_zen') == 1){
                                                            $res_money = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_money') * ($char['resets'] + 1);
                                                        }
                                                        else{
                                                            $res_money = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_money');
                                                        }
                                                        if($vip_time != 'None' && $vip_time != 'Expired'){
                                                            $disc_res = floor($res_money - (($res_money / 100) * $this->config->config_entry('account|igcn_vip_res_discount')));
                                                            echo $this->website->zen_format($disc_res);
                                                        }
                                                        else{
                                                            echo $this->website->zen_format($res_money);
                                                        }
                                                    }
                                                    else{
                                                        if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_x_zen') == 1){
                                                            $res_money = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_money') * ($char['resets'] + 1);
                                                        }
                                                        else{
                                                            $res_money = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_money');
                                                        }
                                                        echo $this->website->zen_format($res_money);
                                                    }
                                                ?>
                                            </td>
                                            <td><a href="#"
                                                   id="reset-char-<?php echo bin2hex($char['name']); ?>"><?php echo _('Reset'); ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        else{
                            ?>
                            <div class="e_note"><?php echo _('No characters found.'); ?></div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="e_note"><?php echo $disabled; ?></div>
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
	