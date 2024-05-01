<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1>Transfer characters</h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title">Transfer characters from <?php echo $this->website->get_title_from_server($this->session->userdata(['user' => 'server'])); ?>
                to <?php echo $this->website->get_title_from_server($transfer_to); ?> server</h2>

            <div class="entry">

                <?php if(isset($cant_proceed)){
                    echo '<div class="e_note">' . $cant_proceed . '</div>';
                }
                else{
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    }
                    ?>
                    <form method="post" action="">
                        <button type="submit" name="same_account" class="left button-style">Same Account</button>
                        <button type="submit" class="right button-style" id="change_acc">Other Account</button>
                    </form>
                    <div class="clearfix" style="padding-top:50px;"></div>
                    <div class="form" id="other_account" style="display: none;">
                        <form method="post" action="">
                            <table>
                                <tr>
                                    <td style="width: 150px;">Username:</td>
                                    <td>
                                        <input type="text" name="user" id="user" value=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td>
                                        <input type="password" name="pass" id="pass" value=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="submit" name="move_to_other"
                                                class="button-style"><?php echo _('Submit'); ?></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#change_acc').on('click', function (e) {
                                e.preventDefault();
                                if ($('#other_account').is(':hidden')) {
                                    $('#other_account').show();
                                }
                            });
                        });
                    </script>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	