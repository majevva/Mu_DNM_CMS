<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Search Characters & Guilds'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title"><?php echo _('Find any character, guild'); ?></h2>
            <div class="entry">
                <?php
                if (isset($error)) {
                    echo '<div class="e_note">' . $error . '</div>';
                } 
				?>
				<div class="form">
				<form method="post" action="">
					<table>
						<tr>
							<td>
								<input type="text" id="name" name="name" value="" />
							</td>
							<td>
								&nbsp;<button type="submit" class="flatbtn-s"><?php echo _('Submit');?></button>
							</td>
						</tr>
					</table>
				</form>
				</div>
				<?php
				if (isset($list_players) && $list_players != false) {
				?>
					<div style="padding-top:10px;">
						<h2 style="padding: 5px 5px 0px 2px;letter-spacing: 1px;font-size: 20px;"><?php echo _('Characters'); ?></h2>
					</div>
					<table class="ranking-table">
						<thead>
						<tr class="main-tr">
							<th style="text-align:center;">#</th>
							<th style="text-align:center;"><?php echo _('Name'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($list_players as $result):
							?>
							<tr>
								<td style="text-align:center;"><?php echo($i++); ?></td>
								<td><a href="<?php echo $result['url']; ?>"><?php echo $result['name']; ?></a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php
				}
				if (isset($list_guilds) && $list_guilds != false) {
				?>
					<div style="padding-top:10px;">
						<h2 style="padding: 5px 5px 0px 2px;letter-spacing: 1px;font-size: 20px;"><?php echo _('Guilds'); ?></h2>
					</div>
					<table class="ranking-table">
						<thead>
						<tr class="main-tr">
							<th style="text-align:center;">#</th>
							<th style="text-align:center;"><?php echo _('Name'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($list_guilds as $gresult):
							?>
							<tr>
								<td style="text-align:center;"><?php echo($i++); ?></td>
								<td><a href="<?php echo $gresult['url']; ?>"><?php echo $gresult['name']; ?></a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php
				}		
				if(!isset($error) && (!isset($list_players) || $list_players == false) && (!isset($list_guilds) || $list_guilds == false)){
					echo '<div class="i_note">' . _('Search result did not return any data') . '</div>';
				}
                ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	