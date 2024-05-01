<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Online Players'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title"><?php echo _('List online players'); ?></h2>
            <div class="entry">
                 <?php
                if (isset($error)) {
                    echo '<div class="i_note">' . $error . '</div>';
                } else {
                    ?>
                    <script>
                        $(document).ready(function () {
                            $('#content_1').show();
                        });
                    </script>
                    <ul class="tabrow">
                        <?php
                        $args = $this->request->get_args();

                        $i = 0;
                        foreach ($this->website->server_list() as $key => $servers):
                            if ($servers['visible'] == 1) {
                                $i++;
                                if (!empty($args) && ($args[0] == $key))
                                    $selected = 'class="selected"';
                                else
                                    $selected = '';
                                ?>
                                <li <?php echo $selected; ?>><a
                                        href="<?php echo $this->config->base_url; ?>rankings/online-players/<?php echo $key; ?>"><?php echo $servers['title']; ?></a>
                                </li>
                                <?php
                            }
                        endforeach;
                        ?>
                    </ul>
                <?php
                if (isset($online) && $online != false){
                ?>
                    <table class="ranking-table">
                        <thead>
                        <tr class="main-tr">
                            <th style="text-align:center;">#</th>
                            <th style="text-align:center;"><?php echo _('Name'); ?></th>
                            <th style="text-align:center;"><?php echo _('Class'); ?></th>
							<th style="text-align:center;"><?php echo _('Level'); ?></th>
							<?php if($config['online_list']['display_resets'] == 1):?>
							<th style="text-align:center;"><?php echo _('Resets'); ?></th>
							<?php endif;?>
							<?php if($config['online_list']['display_gresets'] == 1):?>
							<th style="text-align:center;"><?php echo _('Grand Reset'); ?></th>
							<?php endif;?>
                            <th style="text-align:center;"><?php echo _('Connect Time'); ?></th>
                            <th style="text-align:center;"
                                class="end"><?php echo _('Connected Since'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($online as $players):
                            ?>
                            <tr>
                                <td style="text-align:center;"><?php echo($i++); ?></td>
                                <td>
                                    <?php if($config['online_list']['display_country'] == 1):?><img src="<?php echo $this->config->base_url; ?>assets/flags/<?php echo $players['country'];?>.gif" title="<?php echo $players['country'];?>" /><?php endif;?> <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($players['name']); ?>/<?php echo $server; ?>"><?php echo $players['name']; ?></a>
                                </td>
                                <td><?php echo $players['class']; ?></td>
								<td><?php echo $players['level']; ?></td>
								<?php if($config['online_list']['display_resets'] == 1):?>
								<td><?php echo $players['resets']; ?></td>
								<?php endif;?>
								<?php if($config['online_list']['display_gresets'] == 1):?>
								<td><?php echo $players['gresets']; ?></td>
								<?php endif;?>
                                <td style="text-align:center;"><?php echo $players['server']; ?></td>
                                <td class="end"><?php echo $players['connecttime']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                }
                else {
                    echo '<div class="i_note">' . _('No Players Found') . '</div>';
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