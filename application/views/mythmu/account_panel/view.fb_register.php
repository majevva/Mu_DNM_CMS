<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo _('Facebook Login'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo _('Facebook Account Register'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($errors)){
                        foreach($errors as $error){
                            echo '<div class="e_note">' . $error . '</div>';
                        }
                    }
                ?>
                <div class="form">
                    <form method="post" action="" id="fb_register_form" name="fb_register_form">
                        <input type="hidden" name="add_fb_account" value="1"/>
                        <input type="hidden" name="server" value="<?php echo $server; ?>"/>
                        <table>
                            <tr>
                                <td style="width: 150px;"><?php echo _('Username'); ?>:</td>
                                <td>
                                    <input type="text" name="user" id="user" value="<?php if(isset($_POST['user'])){
                                        echo $_POST['user'];
                                    } ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo _('Password'); ?>:</td>
                                <td>
                                    <input type="password" name="pass" id="pass" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo _('Repeat Password'); ?>:</td>
                                <td>
                                    <input type="password" name="rpass" id="rpass" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="button-style"><?php echo _('Submit'); ?></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	