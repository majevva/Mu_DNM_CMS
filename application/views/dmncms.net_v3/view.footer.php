<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
?>
<div id="footer">
	<div id="footer-warpper">
		<div id="footer-left">
			<div>
				<a href="<?php echo $this->config->base_url; ?>home" title="<?php echo _('News'); ?>"><?php echo _('News'); ?></a> - 
				<a href="<?php echo $this->config->base_url; ?>support"><?php echo _('Support'); ?></a> - 
				<a href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a> - 
				<a href="<?php echo $this->config->base_url; ?>rules"><?php echo _('Rules'); ?></a>
			</div>
			<div id="copy">
				<?php echo _('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>. <?php echo _('All Rights Reserved.'); ?><br />
				<?php echo _('Powered By'); ?><a href="http://dmncms.net" target="_blank">DmN MuCMS</a>
			</div>
		</div>
		<div id="footer-right">
			<div id="rss-title"><?php echo _('Recent Forum Topics'); ?></div>
			<?php 
			if ($this->config->config_entry('modules|recent_forum_module') == 1){ 
				if ($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), 3, $this->config->config_entry('modules|recent_forum_rss_cache_time'))) {
					foreach ($load_rss as $key => $rss):
						$first = ($key == 0) ? 'class="first"' : '';
				 ?>							
				<div id="rss-module">
				<div id="rss-icon"></div>
					<div id="rss-info" <?php echo $first; ?>>
						<div><a href="<?php echo $rss['link']; ?>"><?php echo $this->website->set_limit($rss['title'], 60, '.');?></a></div>
						<div><?php echo $rss['pubDate']; ?></div>
					</div>
				</div> 
				<?php
					endforeach;
				} else {
					echo '<div class="i_note">' . _('No Data') . '</div>';
				}
				}
			?>			
		</div>
	</div>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php
if ($this->request->get_method() == 'fortumo') {
    ?>
    <script src='https://assets.fortumo.com/fmp/fortumopay.js' type='text/javascript'></script>
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