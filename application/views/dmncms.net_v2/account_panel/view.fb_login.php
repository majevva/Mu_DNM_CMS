<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.header');
	$this->load->view($this->config->config_entry('main|template').DS.'view.left_sidebar');
?>	                     
<div class="news_main">
	<div class="heding">
		<h2><?php echo _('Facebook Login'); ?></h2>
	</div>
	<div class="content_rght_info m5">
		<div class="other">
            <h2 class="title">
				<?php echo _('Facebook Account Login'); ?>		
			</h2>
			<div class="entry">
                <?php if ($this->website->is_multiple_accounts() == true): ?>
                    <div class="form">
                        <form method="post" action="" id="fb_login_form">
                            <table>
                                <tr>
                                    <td style="width: 150px;"><?php echo _('Server'); ?>
                                        :
                                    </td>
                                    <td>
                                        <select name="server" id="server">
                                            <option value="">Select Server</option>
                                            <?php
                                            foreach ($this->website->server_list() as $key => $server):
                                                ?>
                                                <option
                                                    value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </td>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit"
                                                class="flatbtn-blu m5_top"><?php echo _('Submit'); ?></button>
                                    </td>
                                </tr>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</div>
</div>                 
<?php
	$this->load->view($this->config->config_entry('main|template').DS.'view.footer');
?>	