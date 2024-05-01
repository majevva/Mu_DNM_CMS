</div>
<div class="clear"></div>
<div class="left_shape1"></div>
<div class="right_shape1"></div>
                </div>
            </div>
    </div>	
    <!-- aincontent ends -->   
    <!-- footer starts -->
    <div class="footer">
    <div class="footer_in_main">
    <div class="footer_in">
        <div class="footer_nav">
            <ul>
                <li class="no_bg"><a href="<?php echo $this->config->base_url;?>home"><?php echo _('News');?></a></li>
                <li><a href="<?php echo $this->config->base_url;?>downloads"><?php echo _('Files');?></a></li>
                <li><a href="<?php echo $this->config->base_url;?>rankings"><?php echo _('Rankings');?></a></li>
                <li><a href="<?php echo $this->config->base_url;?>registration"><?php echo _('Registration');?></a></li>
                <li class="last"><a href="<?php echo $this->config->config_entry('main|forum_url');?>"><?php echo _('Forum');?></a></li>
            </ul>
            <div class="clear"></div>
        </div>   
        <div class="footer_bottom">
        <div class="copyrights">
        	<p><?php echo _('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?> <br /> <?php echo _('Powered By'); ?> <a href="http://dmncms.net" target="_blank">DmN MuCMS</a>.</p>
        </div>
        </div>
        <div class="left_shape"></div>
        <div class="rght_shape"></div>
        </div>
        </div>
   </div>
    <!-- footer ends -->    
</div>
<div id="login_box" class="login_box">
    <h1><?php echo _('Account Panel'); ?></h1>
	<a class="close_login" href="javascript:;"></a>
    <form id="login_form" name="loginform" method="post" action="">
		<label for="username"><?php echo _('Username'); ?>:</label>
		<input type="text" name="username" id="login_input" maxlength="10" class="txtfield" value="" />
		<label for="password"><?php echo _('Password'); ?>:</label>
		<input type="password" name="password" id="password_input" maxlength="20" class="txtfield" value="" />
		<div><input type="submit" name="login" id="login" class="flatbtn-blu" value="<?php echo _('Login'); ?>" /> <?php echo $this->website->fb_login('input', 'flatbtn'); ?></div>
		<div style="padding-top:5px;"><a href="<?php echo $this->config->base_url;?>registration"><?php echo _('Registration'); ?></a> / <a href="<?php echo $this->config->base_url;?>lost-password"><?php echo _('Lost Password'); ?>?</a></div>
    </form>
</div>
<div id="select_server">
    <div class="modal-header">
        <h2><?php echo _('Select Server'); ?></h2>
        <a class="close" href="javascript:;"></a>
    </div>
    <div style="margin: 20px;">
        <?php
        if (!$servers = $this->website->server_select_box('id="switch_server"')) {
            echo '<b style="color: red;">' . _('Currently this is only one server.') . '</b>';
        } else {
            echo $servers;
        }
        ?>

    </div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif" alt=""/> <?php echo _('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/jquery.bxslider.min.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/app.js"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time());?>',
        ajax_page_load: <?php echo $this->config->config_entry('main|use_ajax_page_load');?>
    };

    $(document).ready(
        App.initialize,
        <?php if($this->session->userdata(array('user'=>'logged_in'))): ?>
        App.checkSupportTickets(),
        <?php endif;?>
        App.locale = <?php echo $this->translations;?>
        <?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
        , App.count_down('<?php echo $this->config->config_entry("main|grand_open_timer");?>')
        <?php endif; ?>
        , App.initLocalization()
    );
</script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php
if($this->request->get_method() == 'fortumo'){
?>
<script src="http://fortumo.com/javascripts/fortumopay.js" type="text/javascript"></script>
<?php
}
?>
<?php 
if($this->config->config_entry('main|show_debug_info') == 1){
    $this->debug->mark('loading_time_end');
    echo $this->debug->run();
}
?>
</body>
</html>