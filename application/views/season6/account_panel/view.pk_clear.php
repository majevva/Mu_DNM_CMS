<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('PK Clear'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Clear player kills.'); ?></h2>

            <div class="entry">
                <?php
                if (isset($char_list) && $char_list != false) {
                    ?>
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <th><?php echo _('Character'); ?></th>
                            <th><?php echo _('Price'); ?></th>
                            <th><?php echo _('Kills'); ?></th>
                            <th><?php echo _('PK Level'); ?></th>
                            <th><?php echo _('Manage'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($char_list as $char) {
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(array('user' => 'server')); ?>"><?php echo $char['name']; ?></a>
                                </td>
                                <td>
                                    <?php
                                        $price = $this->config->config_entry('character_' . $this->session->userdata(array('user' => 'server')) . '|pk_clear_price');
                                        if ($this->session->userdata('vip')){
                                            $price -= $this->session->userdata(array('vip' => 'pk_clear_discount'));
                                        }
                                        echo $this->website->zen_format($price);
                                    ?>
                                </td>
                                <td><?php echo $char['pkcount']; ?></td>
                                <td><?php echo $this->website->pk_level($char['pklevel']); ?></td>
                                <td><a href="#"
                                       id="pkclear-char-<?php echo bin2hex($char['name']); ?>"><?php echo _('PK Clear'); ?></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                } else {
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
	