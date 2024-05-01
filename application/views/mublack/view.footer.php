<div class="sitemap_wrp" id="SiteMap">
<h1><span>MUBLACK.NET offers fun and exciting PvP action for all players! Join the battle in this free MMORPG and compete to become the king, the supreme ruler of the world!</span></h1>
<nav>
<div class="menu_list"><h2><a href="#" rel=""><span>News</span></a></h2>
<ul id="gameSlideNav01">
<li><a href="#" rel="">Game News</a></li>
<li><a href="#" rel="">Forum News</a></li>
</ul>
</div>
<div class="menu_list"><h2><a href="#" rel=""><span>Guides</span></a></h2>
<ul id="gameSlideNav02">
<li><a href="#" rel="">InGame Guide</a></li>
<li><a href="#" rel="">Season 8 Story</a></li>
<li><a href="#" rel="">Technical guide</a></li>
</ul>
</div>
<div class="menu_list"><h2><a href="#" rel=""><span>Community</span></a></h2>
<ul id="gameSlideNav03">
<li><a href="#" rel="">Forum</a></li>
<li><a href="#" rel="">Facebook</a></li>
<li><a href="#" rel="">Twitter</a></li>
</ul>
</div>
<div class="menu_list"><h2><a href="#" rel=""><span>Media</span></a></h2>
<ul id="gameSlideNav04">
<li><a href="#" rel="">Videos</a></li>
<li><a href="#" rel="">Screen Shots</a></li>
<li><a href="#" rel="">Wall Papers</a></li>
</ul>
</div>
<div class="menu_list">
<h2><a href="#" rel=""><span>Support</span></a></h2>
<ul id="gameSlideNav05">
<li><a href="#" rel="">Skype: MuBlack-Support</a></li>
</ul>
</div>
</nav>
	</div>
<div id="select_server">
<div class="modal-header">
	<h2><?php echo __('Select Server'); ?></h2>
	<a class="close" href="javascript:;"></a>
</div>
<div style="margin: 20px;" class="form">
	<?php
		if(!$servers = $this->website->server_select_box('id="switch_server"')){
			echo '<b style="color: red;">' . __('Currently this is only one server.') . '</b>';
		}
		else{
			echo $servers;
		}
	?>
    </div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif" alt=""/> <?php echo __('Loading...'); ?></div>	
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>	
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/app.js?v8"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time());?>',
        ajax_page_load: 0
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
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url;?>assets/<?php echo $this->config->config_entry('main|template');?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php
if($this->request->get_method() == 'fortumo'){
?>
<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
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