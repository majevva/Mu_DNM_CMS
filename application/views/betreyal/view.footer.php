<div class="sitemap_wrp" id="SiteMap"><h1>
<span><?php echo _('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>. <?php echo _('All Rights Reserved.'); ?></span><span><?php echo _('Powered By'); ?> <a href="http://dmncms.net" target="_blank">DmN MuCMS</a></span></h1>
<nav><!--
<div class="menu_list"><h2><span>Home</span></h2>
<ul id="gameSlideNav01">
							<li><a href="<?php echo $this->config->base_url; ?>">Announcements</a></li>
                            <li>         <a href="<?php echo $this->config->base_url; ?>">News</a></li>
							<li>         <a href="<?php echo $this->config->base_url; ?>">Updates</a></li>
							<li>         <a href="<?php echo $this->config->base_url; ?>">Events</a></li>
</ul>
</div>
<div class="menu_list"><h2><span>Rankings</span></h2>
<ul id="gameSlideNav02">
                            <li><a href="<?php echo $this->config->base_url; ?>rankings">Players</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings">Guilds</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings">Killers</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings">Voters</a></li>
</ul>
</div>
<div class="menu_list"><h2><span>Support</span></h2>
<ul id="gameSlideNav03">
                            <li><a href="<?php echo $this->config->base_url; ?>support" title="????">Account</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>support" title="????">Players</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>support" title="????">Hackers</a></li>
							<li><a href="<?php echo $this->config->base_url; ?>support" title="????">Donations</a></li>
</ul>
</div>-->

</nav>
	</div>
	<!-- e:??? sitemap -->

    





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
<div id="loading"><img
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif"
        alt=""/> <?php echo _('Loading...'); ?></div>
		
	  <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/scripts.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
	
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery.bxslider.min_4.1.2.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/select.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/ui.js"></script>
<?php

?>
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
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js"
    type="text/javascript"></script>
<script
    src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js"
    type="text/javascript"></script>
<?php
if ($this->request->get_method() == 'fortumo') {
    ?>
    <script src="http://fortumo.com/javascripts/fortumopay.js" type="text/javascript"></script>
    <?php
}
?>
<?php
if ($this->config->config_entry('main|show_debug_info') == 1) {
    $this->debug->mark('loading_time_end');
    echo $this->debug->run();
}
?>
</body>
</html>