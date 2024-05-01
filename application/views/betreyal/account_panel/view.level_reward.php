<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Level Reward'); ?></h1>
        </div>
		<div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Receive reward for reaching some level'); ?></h2>
            <div class="entry">
                <script>
                    $(document).ready(function () {
                        $('a[id^="level-reward-"]').on('click', function (e) {
                            e.preventDefault();
                            var char = $(this).attr("id").split("-")[2];
                            var reward = $(this).attr("id").split("-")[3];
                            App.addLevelReward(char, reward);
                        });
                    });
                </script>
                <?php
                if (!empty($char_list)){
                    foreach ($char_list as $chars) {
                        ?>
                        <table class="add_to_card" cellspacing="0">
                        <thead>
                        <tr><th colspan="2" style="text-align:center;"><?php echo $chars['name']; ?></th></tr>
                        </thead>
                        <tbody>
						<tr>
							<td>
								<?php echo _('Level');?>
							</td>
							<td>
							   <?php echo $chars['level']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo _('Master Level');?>
							</td>
							<td>
							   <?php echo $this->Mcharacter->load_master_level($chars['name'], $this->session->userdata(array('user'=>'server'))) ?>
							</td>
						</tr>
						<tr>
							<td style="text-align:left;"><?php echo _('Achievable rewards');?></td>
							<td>
								<?php
								if(!empty($level_rewards)){
									$html = '<div class="ref-reward-dropdown"><button class="custom_button">'._('View Reward List').'</button><div class="ref-reward-dropdown-content">';
									foreach($level_rewards AS $key => $value){
										$reward = '';
										if($value['req_level'] > 0){
											$reward .= '<p>'._('Req Level').': '.$value['req_level'].'</p>';
										}
										if($value['req_mlevel'] > 0){
											$reward .= '<p>'._('Req Master Level').': '.$value['req_mlevel'].'</p>';
										}
										if($this->Mcharacter->check_claimed_level_rewards($key, $chars['name'], $this->session->userdata(array('user'=>'server')))){
											$reward .= '<p>'._('Already Claimed').'</p>';
										}
										else{
											$reward .= '<p>'._('Reward').': '.$value['reward'].' '.$this->website->translate_credits($value['reward_type'], $this->session->userdata(array('user'=>'server'))).'</p>';
										}
										$html .= '<a id="level-reward-'.$chars['name'].'-'.$key.'" href="#" data-info="'.$reward.'">'._('Reward').': '.$key.'</a>';
									}
									$html .= '</div></div>';
								}
								else{
									$html = _('No rewards achievable');
								}
								echo $html;
								?>
							</td>
						</tr>
                        </tbody>
                        </table>
						<br />
                        <?php
                    }
                }
                else{
                ?>
                    <div class="i_note"><?php echo _('No characters found.'); ?></div>
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
	