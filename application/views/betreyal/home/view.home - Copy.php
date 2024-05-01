<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>





<article class="page_list">

<div class="sec_fir2">

                    <article class="mMuDiary_wrap">
                        
<!--  s: 뮤 다이어리  -->
<?php
                if (empty($news)):
                    echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('No News Articles') . '</div></div>';
                else:
                    if($this->config->config_entry('news|storage') != 'facebook'){
                        foreach ($news as $key => $article):
                            ?>
<div class="left">
    <h2><?php echo $article['title']; ?></h2>
    <ul>
                <li>
                    <a href="<?php echo $article['url']; ?>">
                        <div class="thumb"><img src="<?php echo $article['icon']; ?>" alt=""></div>
                        <strong class="tit"><?php echo $article['title']; ?></strong>
                        <span class="txt">
                            <?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content']))); ?>
                        </span>
                    </a>
                </li>
    </ul>
    <a href="<?php echo $article['url']; ?>" class="btn_more"><?php echo $article['title']; ?></a>
</div>
<?php
                        endforeach;
                    }
                    else{
                        echo '<div style="margin-left:90px;">'.str_replace('(document, script, facebook-jssdk)', '(document, \'script\', \'facebook-jssdk\')', $news['contents']).'</div>';
                    }
                endif;
                ?>
    <!--  e: 뮤 다이어리  -->

                        
                        


                            

                <?php
                if (isset($pagination)) {
                    ?>
                    <div>
                        <table style="/* width: 213px; */margin: 0 auto;float: right;">
                            <tr>
                                <td><?php echo $pagination; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
                ?>      
                    </article>

                    
<article class="mRecomPrd_wrap">
    <h2><?php echo _('Market'); ?></h2>
						<?php if ($this->config->config_entry('modules|last_market_items_module') == 1): ?>
								<?php
								if ($this->session->userdata(array('user' => 'logged_in'))):
									$server = $this->session->userdata(array('user' => 'server'));
								else:
									$server = array_keys($this->website->server_list())[0];
								endif;
								?>				
								<script>
								$(document).ready(function () {
									App.loadLatestItems('<?php echo $server;?>', <?php echo $this->config->config_entry('modules|last_market_items_count');?>, 20);
								});
								</script>
								<div id="lattest_items"></div>
						<?php endif; ?>

</article>

                    
                </div>
				
				<div class="sec_sec">

                    <!-- s: 공지사항/패치노트 -->
                   <div class="recent_bbs_wrap">                       
                        
<article class="mNotice_wrap">
    <h2><a href="#" class="on">Resets</a></h2>
    <div class="cont show">
        <ul>
                   <?php 

		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){

				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
								});
								</script>
								<div id="top_players"></div>
							
							';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key])){
										echo ' ';
								}
							}
					echo '';
					
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
        </ul>
        <a href="<?php echo $this->config->base_url; ?>rankings" class="btn_more">more</a>
    </div>
</article>

                        

                        
<article class="mPatch_wrap">
    <h2><a href="#">Guilds</a></h2>
    <div class="cont">
        <ul>
                    
		
		<?php 

		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){

				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 0){
					echo '
								<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \''.$srv.'\', '.$data['guild']['count_in_sidebar'].');
								});
								</script>
								<div id="top_guilds"></div>
							
							';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key])){
										echo ' ';
								}
							}
					echo '';
					
				}
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
        </ul>
        <a href="<?php echo $this->config->base_url; ?>rankings" class="btn_more">more</a>
    </div>
</article>

<?php            
								$i=0;
								foreach($this->website->check_server_status() as $key=>$server):   
									if($server['image'] != 'off'):
								?>
								<a href="#" data-modal-div="select_server" class="active"><?php echo _('Select Server'); ?></a>
								<?php
								endif;
								$i++;
								endforeach; 
								?>  <Br><br>                      
                    </div>
                    <!-- e: 공지사항/패치노트 -->

                    <!-- s: 공성전/크라이울프 공방전 -->
             <br>
                    <!-- e: 공성전/크라이울프 공방전 -->

                    
<!-- s: 바로가기 -->
<ul class="quick_link_wrap">
        <li><a href="http://www.muonline.co.kr/news/mu-diary/detail/6207?page=2&amp;category=1801" target="_blank"><img src="http://upload.webzen.co.kr/Files/Mu/banner/2015/01/29/201501291AC6F63A114D4F87.gif" alt="전화 상담용 번호"></a></li>
        <li><a href="http://pcbang.webzen.co.kr" target="_blank"><img src="http://upload.webzen.co.kr/Files/Mu/banner/2015/01/28/20150128EAD242EE67964D34.gif" alt="PC방 "></a></li>
        <li><a href="http://cafe.naver.com/muing" target="_blank"><img src="http://upload.webzen.co.kr/Files/Mu/banner/2015/01/28/20150128CE6708C6E49D4E1C.gif" alt="뮤잉"></a></li>
</ul>
<!-- e: 바로가기 -->

                    
                </div>
    
</article>

<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>