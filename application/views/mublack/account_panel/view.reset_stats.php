<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Reset Stats'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Reassign your stats'); ?></h2>

            <div class="entry">
                <?php
                    if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|allow_reset_stats') == 1){
                        if(isset($char_list) && $char_list != false){
                            ?>
                            <table class="ranking-table">
                                <thead>
                                <tr class="main-tr">
                                    <th><?php echo __('Character'); ?></th>
                                    <th><?php echo __('New LevelUp Points'); ?></th>
                                    <?php if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price') > 0){ ?>
                                        <th><?php echo __('Price'); ?></th>
                                    <?php } ?>
                                    <th><?php echo __('Manage'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($char_list as $char){
                                        $this->Mcharacter->check_char($char['name']);
                                        
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(['user' => 'server']); ?>"><?php echo $char['name']; ?></a>
                                            </td>
                                            <td>
                                        <span
                                            id="new-stats-<?php echo bin2hex($char['name']); ?>"><?php echo $this->Mcharacter->calculateNewStats(); ?></span>
                                            </td>
                                            <?php if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price') > 0){ ?>
                                                <td><?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price'); ?><?php echo $this->website->translate_credits($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_payment_type'), $this->session->userdata(['user' => 'server'])); ?></td>
                                            <?php } ?>
                                            <td><a href="#"
                                                   id="reset-stats-char-<?php echo bin2hex($char['name']); ?>"><?php echo __('Reset Stats'); ?></a>
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
                            <div
                                class="e_note"><?php echo __('Character not found.'); ?></div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div
                            class="e_note"><?php echo __('Reset Stats Disabled'); ?></div>
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
	