<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Grand Reset'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Once /  %d RR get rewarded', $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_req_res')); ?></h2>

            <div class="entry">
                <?php
                    if(!isset($disabled)){
                        if(isset($char_list) && $char_list != false){
                            ?>
                            <table class="ranking-table">
                                <thead>
                                <tr class="main-tr">
                                    <th><?php echo _('Character'); ?></th>
                                    <th><?php echo _('GR / Limit'); ?></th>
                                    <th><?php echo _('Res / Req'); ?></th>
                                    <th><?php echo _('Zen / Req'); ?></th>
                                    <th><?php echo _('Reward'); ?></th>
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
                                            <td>
												<span
                                                    id="gresets-<?php echo bin2hex($char['name']); ?>"><?php echo $char['gresets']; ?></span> / <?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_limit'); ?>
                                            </td>
                                            <td>
												<span
                                                    id="resets-<?php echo bin2hex($char['name']); ?>"><?php if($char['resets'] < $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_req_res')){ ?>
                                                        <span
                                                            style="color: red;"><?php echo $char['resets']; ?></span><?php }
                                                    else{ ?><?php echo $char[$this->config->config_entry('rankings|res_col')]; ?><?php } ?></span> / <?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_req_res'); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->website->zen_format($char['money']); ?> /
                                                <?php
                                                    echo $this->website->zen_format($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_req_zen'));
                                                ?>
                                            </td>
                                            <td>
                                                <div id="small_menu" align="justify">
                                                    <ul>
                                                        <?php
                                                            if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats') != 0){
                                                                if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats_save') == 1){
                                                                    if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_add_bonus_reset_stats') == 1){
                                                                        $gb_bonus_points = (($char['gresets'] + 1) * $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats')) + (($char['resets'] + 1) * $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_bonus_stats'));
                                                                    }
                                                                    else{
                                                                        $gb_bonus_points = ($char['gresets'] + 1) * $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats');
                                                                    }
                                                                }
                                                                else{
                                                                    if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_add_bonus_reset_stats') == 1){
                                                                        $gb_bonus_points = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats') + (($char['resets'] + 1) * $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_bonus_stats'));
                                                                    }
                                                                    else{
                                                                        $gb_bonus_points = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_stats');
                                                                    }
                                                                }
                                                                echo '<li><span style="padding-left: 10px;font-weight: bold;color: #666666;">' . _('Stats Bonus') . ' + ' . $gb_bonus_points . '</span></li>';
                                                            }
                                                            if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_credits') != 0)
                                                                echo '<li><span style="padding-left: 10px;font-weight: bold;color: #666666;">' . $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1') . ' ' . _('Bonus') . ' + ' . $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_credits') . '</span></li>';
                                                            if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_gcredits') != 0)
                                                                echo '<li><span style="padding-left: 10px;font-weight: bold;color: #666666;">' . $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2') . ' ' . _('Bonus') . ' + ' . $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|greset_bonus_gcredits') . '</span></li>';
                                                        ?>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><a href="#"
                                                   id="greset-char-<?php echo bin2hex($char['name']); ?>"><?php echo _('Grand Reset'); ?></a>
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
	