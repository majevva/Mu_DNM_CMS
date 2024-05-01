<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
?>	
<div id="content">
	<div id="box1">
		<div class="title1">
			<h1><?php echo $this->translation->translate('my_refferals', 'My Refferals'); ?></h1>
		</div>
		<div class="box-style1" style="margin-bottom: 20px;">
			<h2 class="title"><?php echo $this->translation->translate('view_your_reffered_players', 'View your reffered players'); ?></h2>
			<div class="entry">
				<?php if(!empty($my_refferal_list)): ?>
				<table class="ranking-table">
					<thead>
					<tr class="main-tr">
						<td><?php echo $this->translation->translate('refferal', 'Refferal');?></td>
						<td><?php echo $this->translation->translate('date_reffered', 'Date Reffered');?></td>
						<td><?php echo $this->translation->translate('ref_reward_archieved', 'Reward Archieved');?></td>
					</tr>
					</thead>
					<tbody>	
					<?php foreach($my_refferal_list as $refs): ?>
					<tr>
						<td><?php echo $refs['refferal'];?></td>
						<td><?php echo  date('d / M / Y h:i', strtotime($refs['date_reffered']));?></td>
						<td><?php
							$x = 0;
							for($i = $refs['res_count'];$i > 0;$i--):
								$x += ($i % $this->config->config_entry('registration|refferal_need_resets_'.$this->session->userdata(array('user' => 'server'))) == 0) ? 1 : 0;
							endfor;
							echo ($x*$this->config->config_entry('registration|refferal_reward_after_resets')).' '.$this->website->translate_credits($this->config->config_entry('registration|refferal_reward_type'), $this->session->userdata(array('user' => 'server')));
							?>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				<?php else: ?>
				<div class="i_note"><?php echo $this->translation->translate('no_reffered_players', 'No reffered players.'); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.right_sidebar');
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>
	