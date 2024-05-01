<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Ban List'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title"><?php echo _('List Banned Players & Accounts'); ?></h2>
            <div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } else {
                    ?>
                    <ul class="tabrow">
                        <?php
                        $args = $this->request->get_args();

                        $i = 0;
                        foreach ($this->website->server_list() as $key => $server):
                            if ($server['visible'] == 1) {
                                $i++;
                                if ($def_server == $key)
                                    $selected = 'class="selected"';
                                else
                                    $selected = '';
                                ?>
                                <li <?php echo $selected; ?>><a
                                        href="<?php echo $this->config->base_url; ?>rankings/ban-list/chars/<?php echo $key; ?>"><?php echo $server['title']; ?></a>
                                </li>
                                <?php
                            }
                        endforeach;
                        ?>
                    </ul>
                    <ul class="tabrow">
                        <li <?php if ($def_type == 'chars') {
                            echo 'class="selected"';
                        } ?>>
                            <a href="<?php echo $this->config->base_url; ?>rankings/ban-list/chars/<?php echo $def_server; ?>"><?php echo _('Banned Chars'); ?></a>
                        </li>
                        <li <?php if ($def_type == 'accounts') {
                            echo 'class="selected"';
                        } ?>>
                            <a href="<?php echo $this->config->base_url; ?>rankings/ban-list/accounts/<?php echo $def_server; ?>"><?php echo _('Banned Accounts'); ?></a>
                        </li>
                    </ul>
                    <?php
                    if (isset($ban_list) && $ban_list != false) {
                        ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;"><?php echo _('Name'); ?></th>
                                <th style="text-align:center;"
                                    class="end"><?php echo _('Ban Time'); ?></th>
                                <th style="text-align:center;"
                                    class="end"><?php echo _('Ban Reason'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($ban_list as $players):
                                ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo($i++); ?></td>
                                    <td><?php echo $players['name']; ?></td>
                                    <td><?php echo $players['time']; ?></td>
                                    <td class="end"><?php echo $players['reason']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo '<div class="i_note">' . _('No Bans Found') . '</div>';
                    }
                }
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	