<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
                <?php
                if (empty($news)):
                    echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('No News Articles') . '</div></div>';
                else:
                    if($this->config->config_entry('news|storage') != 'facebook'){
                        foreach ($news as $key => $article):
                            ?>
								
							
							
							
							
                   <center><h1><font color="#a3bdf4"><?php echo $article['title']; ?> </font></h1><br></center>
                        <div class="title"><?php echo $article['title']; ?></div>
                        <div class="text">
                            <p><?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content']))); ?></p></div>
                        <div class="info">
                            <div class="date">Date: </div>
                            <div class="clear"></div>
                        </div>
                    	
							
                            
                                            <?php if ($this->config->config_entry('news|storage') != 'dmn'): ?>
                                                <p class="links"><span class="comments"><a
                                                            href="<?php echo $article['url']; ?>"
                                                            target="_blank"><?php echo _('Discuss On Forum'); ?></a></span>
                                                </p>
                                            <?php endif; ?>
                                        
                            <?php
                        endforeach;
                    }
                    else{
                        echo '<div style="margin-left:90px;">'.str_replace('(document, script, facebook-jssdk)', '(document, \'script\', \'facebook-jssdk\')', $news['contents']).'</div>';
                    }
                endif;
                ?>
                <?php
                if (isset($pagination)) {
                    ?>
                    <div style="padding:10px;text-align:center;">
                        <table style="width: 100%;">
                            <tr>
                                <td><?php echo $pagination; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
                ?>
<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>