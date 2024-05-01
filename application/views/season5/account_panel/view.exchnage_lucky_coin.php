<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Exchange Lucky Coins'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Exchange your lucky coins to items.'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    }
                    if(isset($success)){
                        echo '<div class="s_note">' . $success . '</div>';
                    }
                    if(isset($char_list) && $char_list != false){
                        ?>
                        <div class="form">
                            <form method="post" action="" id="exchnage_lucky_coin_form">
                                <table>
                                    <tr>
                                        <td style="width: 150px;"><?php echo _('character'); ?></td>
                                        <td>
                                            <select class="custom-select" name="character" id="character">
                                                <?php foreach($char_list as $char): ?>
                                                    <option
                                                        value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo _('Select Option To Exchange'); ?></td>
                                        <td>
                                            <input type="radio" name="lucky_coin" value="10"/> 10 Lucky Coin<br/>
                                            <input type="radio" name="lucky_coin" value="20"/> 20 Lucky Coin<br/>
                                            <input type="radio" name="lucky_coin" value="30"/> 30 Lucky Coin<br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" id="exchange_coins" name="exchange_coins"
                                                    class="button-style"><?php echo _('Exchange Coins'); ?></button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div
                            class="e_note"><?php echo _('Character not found.'); ?></div>
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
	