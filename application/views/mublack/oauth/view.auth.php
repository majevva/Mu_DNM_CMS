<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('OAuth Authorization'); ?></h1>
        </div>
		<div class="box-style1" style="margin-bottom:55px;">
        <?php
            if(isset($errors)):
                ?>
                <div style="padding: 0 30px 0px 50px;">
                    <div class="e_note"><?php echo $errors['error_description']; ?></div>
                </div>
                <?php
            else:
        ?>
		<div class="entry">
			<div class="form">
				<form method="post" action="<?php echo $this->config->base_url;?>oauth/authorize?client_id=<?php echo $client_id;?>&redirect_uri=<?php echo $redirect_uri;?>&response_type=<?php echo $response_type;?>&state=<?php echo $state;?>">
				  <label>Do You Want To Authorize <?php echo $client_id;?>?</label><br />
				  <input type="submit" name="authorize" value="yes">
				  <input type="submit" name="authorize" value="no">
				</form>
			</div>
		</div>
		<?php endif;?>
		</div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	