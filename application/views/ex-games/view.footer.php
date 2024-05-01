		</div>			
    </div>
</div>
<div class="cd-popup start" role="alert">
    <div class="cd-popup-container">
        <div class="login">
                    <hr>
           <form id="login_form" name="loginform" method="post" action="">
                 <div class="login-box">
                    <i class="icon-user"></i><input id="login_input" name="username" type="text" placeholder="<?php echo _('Username'); ?>">
                </div>
                <div class="pass-box">
                    <i class="icon-lock"></i><input id="password_input" name="password" type="password" placeholder="<?php echo _('Password'); ?>">
                </div>
                <br>
                <button class="btn-enter auth" name="login_btn" type="submit" id="btn_s"><?php echo _('Login'); ?></button>
            </form>
            <hr>
            <div><a href="<?php echo $this->config->base_url; ?>registration"><?php echo _('Registration'); ?></a></div>
            <div><a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo _('Lost Password'); ?>?</a></div>
                </div>

        <a href="#0" class="cd-popup-close img-replace">Close</a>
    </div>
</div>
<footer class="footer">
    <div class="container text-center">
        <p><?php echo _('Powered By'); ?> <a href="http://dmncms.net" target="_blank">DmN MuCMS</a></p>
		<p style="float:left;"><?php echo _('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>. <?php echo _('All Rights Reserved.'); ?></p>
        <a id="up" href="#"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/toparrow.png" class="toparrow scroll"></a>
		
    </div>
</footer>
<div id="select_server">
    <div class="modal-header">
        <h2><?php echo _('Select Server'); ?></h2>
        <a class="close" href="javascript:;"></a>
    </div>
    <div style="margin: 20px;" class="form">
        <?php
            if(!$servers = $this->website->server_select_box('id="switch_server"')){
                echo '<b style="color: red;">' . _('Currently this is only one server.') . '</b>';
            }
            else{
                echo $servers;
            }
        ?>

    </div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif"
        alt=""/> <?php echo _('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/smoothscroll.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/progressbar.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time());?>',
        ajax_page_load: <?php echo $this->config->config_entry('main|use_ajax_page_load');?>
    };

    $(document).ready(
        App.initialize,
        <?php if($this->session->userdata(['user'=>'logged_in'])): ?>
        App.checkSupportTickets(),
        <?php endif;?>
        App.locale = <?php echo $this->translations;?>
        <?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
        , App.count_down('<?php echo $this->config->config_entry("main|grand_open_timer");?>')
        <?php endif; ?>
        , App.initLocalization()
    );
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
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