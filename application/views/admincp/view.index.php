<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url; ?>admincp">Home</a> <span class="divider">/</span></li>
            <li>Dashboard</li>
        </ul>
    </div>
    <div class="sortable row-fluid">
        <a class="well span3 top-block" href="<?php echo $this->config->base_url; ?>admincp/account-manager">
            <div>Total Accounts</div>
            <div><?php echo $total_acccounts; ?></div>
        </a>
        <a class="well span3 top-block" href="<?php echo $this->config->base_url; ?>admincp/character-manager">
            <div>Total Characters</div>
            <div><?php echo $total_characters; ?></div>
        </a>
        <a class="well span3 top-block" href="#">
            <div>Total Guilds</div>
            <div><?php echo $total_guilds; ?></div>
        </a>
        <a class="well span3 top-block" href="#">
            <div>Online</div>
            <div><?php echo $total_online; ?></div>
        </a>
    </div>
	<?php 
	if($available_upgrades != false){
	?>
	<div class="box-content alerts span11">
		<div class="alert alert-info ">
			<?php if(isset($available_upgrades['lattest_version'])){ ?>
			<h4 class="alert-heading" style="font-size:16px;">Version <?php echo key($available_upgrades['lattest_version']);?> of the DmN MuCMS is now available.</h4>
			<p>
				<p><b>Whats New?</b></p>
				<?php echo $available_upgrades['lattest_version'][key($available_upgrades['lattest_version'])]['change_log'];?>
				<?php if($available_upgrades['lattest_version'][key($available_upgrades['lattest_version'])]['is_auto_update'] == 0){?>
				<p>This version requires manual upgrade, <a href="<?php echo $this->config->base_url;?>setup/index.php?action=upgrade/index/<?php echo urlencode(key($available_upgrades['lattest_version']));?>">UPGRADE NOW!</a></p>
				<?php 
				} 
				else{
					echo '<p><a href="">UPGRADE NOW!</a></p>';
				}
				?>
			</p>
			<div style="paddint-top:5px;"></div>
			<?php } ?>
			<?php 
			if(isset($available_upgrades['sub_versions'])){
				asort($available_upgrades['sub_versions']);
				foreach($available_upgrades['sub_versions'] AS $key => $value){
			?>
			<h4 class="alert-heading" style="font-size:16px;">Version <?php echo $key;?> of the DmN MuCMS is now available.</h4>
			<p>
				<p><b>Whats New?</b></p>
				<?php echo $value['change_log'];?>
				<?php if($value['is_auto_update'] == 0){?>
				<p>This version requires manual upgrade, <a href="<?php echo $this->config->base_url;?>setup/index.php?action=upgrade/index/<?php echo urlencode($key);?>">UPGRADE NOW!</a></p>
				<?php 
				} 
				else{
					echo '<p><a href="">UPGRADE NOW!</a></p>';
				}
				?>
			</p>
			<div style="paddint-top:5px;"></div>
			<?php
				}
			} 
			?>
		</div>
	</div>
	<?php	
	}
	?>
    <div class="box span11">
        <div class="box-header well">
            <h2><i class="icon-list"></i> License Information</h2>

        </div>
        <div class="box-content">
            <table class="table">
                <tbody>
                <tr>
                    <td><span class="green">CMS Version</span></td>
                    <td><?php echo $license[10]; ?></td>
                </tr>
                <tr>
                    <td><span class="green">License Key</span></td>
                    <td><?php echo $license[0]; ?></td>
                </tr>
                <tr>
                    <td><span class="green">Customer Email</span></td>
                    <td><?php echo $license[1]; ?></td>
                </tr>
                <tr>
                    <td><span class="green">Registered Domain</span></td>
                    <td><?php echo $license[4]; ?></td>
                </tr>
                <tr>
                    <td><span class="green">Registered Directory</span></td>
                    <td><?php echo $license[5]; ?></td>
                </tr>
                <tr>
                    <td><span class="green">License Expiry Date</span></td>
                    <td><?php echo is_numeric($license[8]) ? date('d-M-Y, H:i:s', $license[8]) : $license[8]; ?></td>
                </tr>
                <?php if($license[8] != 'LifeTime'):?>
                <tr>
                    <td><span class="green">Renew License</span></td>
                    <td>
                        <?php
                        $prepend = '';
                        if ($license[9] != 'undefined') {
                            $prepend .= $license[9].'-'.$license[11].'/?do=renew';
                        }
                        ?>
                        
                    </td>
                </tr>
				<?php endif;?>
                <tr>
                    <td><span class="green">Release License</span></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/span-->
    <div class="box span6">
        <div class="box-header well">
            <h2><i class="icon-list"></i> Registration Statistics</h2>

        </div>
        <div class="box-content">
            <ul class="dashboard-list">
                <?php
                if ($this->website->is_multiple_accounts() == true):
                    foreach ($this->website->server_list() AS $key => $server):
                        ?>
                        <li>
                            <a href="#">
                                <span class="green"><?php echo $stats[$key]['reg_day']; ?></span>
                                Registrations Today <?php echo $this->website->get_title_from_server($key); ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="red"><?php echo $stats[$key]['reg_week']; ?></span>
                                Registrations This Week <?php echo $this->website->get_title_from_server($key); ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="blue"><?php echo $stats[$key]['reg_month']; ?></span>
                                Registrations This Month <?php echo $this->website->get_title_from_server($key); ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                else:
                    ?>
                    <li>
                        <a href="#">
                            <span class="green"><?php echo $stats['reg_day']; ?></span>
                            Registrations Today
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="red"><?php echo $stats['reg_week']; ?></span>
                            Registrations This Week
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="blue"><?php echo $stats['reg_month']; ?></span>
                            Registrations This Month
                        </a>
                    </li>
                    <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
    <!--/span-->
    <div class="box span5">
        <div class="box-header well">
            <h2><i class="icon-list"></i> Admin Login Logs</h2>

        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Ip</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (count($login_attemts) > 0):
                    foreach ($login_attemts as $attemt):
                        ?>
                        <tr>
                            <td><span class="green"><?php echo $attemt['memb___id']; ?></span></td>
                            <td><?php echo $attemt['ip']; ?></td>
                            <td><?php echo date('Y-m-d h:i:s', strtotime($attemt['time'])); ?></td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/span-->
</div>