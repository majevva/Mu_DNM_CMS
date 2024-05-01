<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url; ?>admincp">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo $this->config->base_url; ?>admincp/manage-settings/reset">Reset Settings</a></li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header well">
                <h2><i class="icon-edit"></i> Add New Reset Settings</h2>
            </div>
            <div class="box-content">
                <?php
                if (isset($error)) {
                    if (is_array($error)) {
                        foreach ($error AS $note) {
                            echo '<div class="alert alert-error">' . $note . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-error">' . $error . '</div>';
                    }
                }
                if (isset($success)) {
                    echo '<div class="alert alert-success">' . $success . '</div>';
                }
                ?>
                <form class="form-horizontal" method="POST" action="">
                    <fieldset>
                        <legend></legend>
                        <div class="control-group">
                            <label class="control-label" for="server">Server</label>

                            <div class="controls">
                                <select name="server" id="server">
                                    <?php foreach ($servers as $key => $server): ?>
                                        <option value="<?php echo $key; ?>"
                                                <?php if (isset($_POST['server']) && $key == $_POST['server']){ ?>selected="selected"<?php } ?>><?php echo $servers[$key]['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="sreset">Starting Reset</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="sreset" name="sreset"
                                       value="<?php if (isset($_POST['sreset'])) {
                                           echo $_POST['sreset'];
                                       } ?>" placeholder="0"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ereset">Ending Reset</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="ereset" name="ereset"
                                       value="<?php if (isset($_POST['ereset'])) {
                                           echo $_POST['ereset'];
                                       } ?>" placeholder="9999"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="money">Required Zen</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="money" name="money"
                                       value="<?php if (isset($_POST['money'])) {
                                           echo $_POST['money'];
                                       } ?>" placeholder="9999"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="money_x_reset">Is Zen Multiplied by Resets</label>

                            <div class="controls">
                                <select name="money_x_reset" id="money_x_reset">
                                    <option value="0"
                                            <?php if (isset($_POST['money_x_reset']) && 0 == $_POST['money_x_reset']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['money_x_reset']) && 1 == $_POST['money_x_reset']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="level">Required level</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="level" name="level"
                                       value="<?php if (isset($_POST['level'])) {
                                           echo $_POST['level'];
                                       } ?>" placeholder="400"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reset_cooldown">Reset CoolDown</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="reset_cooldown" name="reset_cooldown"
                                       value="<?php if (isset($_POST['reset_cooldown'])) {
                                           echo $_POST['reset_cooldown'];
                                       } ?>" placeholder="60"/>

                                <p>How often can make resets, value should be set in seconds</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_magic">Clear MagicList</label>

                            <div class="controls">
                                <select name="clear_magic" id="clear_magic">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_magic']) && 0 == $_POST['clear_magic']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_magic']) && 1 == $_POST['clear_magic']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_inventory">Clear Inventory</label>
                            <div class="controls">
                                <select name="clear_inventory" id="clear_inventory">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_inventory']) && 0 == $_POST['clear_inventory']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_inventory']) && 1 == $_POST['clear_inventory']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_exp_inventory">Clear Expanded Inventory</label>
                            <div class="controls">
                                <select name="clear_exp_inventory" id="clear_exp_inventory">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_exp_inventory']) && 0 == $_POST['clear_exp_inventory']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_exp_inventory']) && 1 == $_POST['clear_exp_inventory']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_equipment">Clear Equipment</label>
                            <div class="controls">
                                <select name="clear_equipment" id="clear_equipment">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_equipment']) && 0 == $_POST['clear_equipment']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_equipment']) && 1 == $_POST['clear_equipment']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_store">Clear Personal Store</label>
                            <div class="controls">
                                <select name="clear_store" id="clear_store">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_store']) && 0 == $_POST['clear_store']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_store']) && 1 == $_POST['clear_store']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_stats">Clear Stats</label>

                            <div class="controls">
                                <select name="clear_stats" id="clear_stats">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_stats']) && 0 == $_POST['clear_stats']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_stats']) && 1 == $_POST['clear_stats']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="new_stat_points">New Stat Points</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="new_stat_points" name="new_stat_points"
                                       value="<?php if (isset($_POST['new_stat_points'])) {
                                           echo $_POST['new_stat_points'];
                                       } ?>" placeholder="0"/>

                                <p>Every stat changed to this value if Clear Stats is activated</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_level_up">Clear LevelUp Points</label>

                            <div class="controls">
                                <select name="clear_level_up" id="clear_level_up">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_level_up']) && 0 == $_POST['clear_level_up']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_level_up']) && 1 == $_POST['clear_level_up']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="new_free_points">New LevelUp Points</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="new_free_points" name="new_free_points"
                                       value="<?php if (isset($_POST['new_free_points'])) {
                                           echo $_POST['new_free_points'];
                                       } ?>" placeholder="0"/>

                                <p>LevelUpPoints changed to this value if Clear LevelUp Points is activated</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dw">Bonus LevelUp Points DW</label>

                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" size="16" id="bonus_lvl_up_dw" name="bonus_lvl_up_dw"
                                           value="<?php if (isset($_POST['bonus_lvl_up_dw'])) {
                                               echo $_POST['bonus_lvl_up_dw'];
                                           } ?>" placeholder="0"/>
                                    <button class="btn" type="button" id="apply_to_all_classes">Apply To All Classes
                                    </button>
                                </div>
                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_sm">Bonus LevelUp Points SM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_sm" name="bonus_lvl_up_sm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_sm'])) {
                                           echo $_POST['bonus_lvl_up_sm'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_gm">Bonus LevelUp Points GM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_gm" name="bonus_lvl_up_gm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_gm'])) {
                                           echo $_POST['bonus_lvl_up_gm'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dk">Bonus LevelUp Points DK</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dk" name="bonus_lvl_up_dk"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dk'])) {
                                           echo $_POST['bonus_lvl_up_dk'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bk">Bonus LevelUp Points BK</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bk" name="bonus_lvl_up_bk"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bk'])) {
                                           echo $_POST['bonus_lvl_up_bk'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bm">Bonus LevelUp Points BM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bm" name="bonus_lvl_up_bm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bm'])) {
                                           echo $_POST['bonus_lvl_up_bm'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_fe">Bonus LevelUp Points ELF</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_fe" name="bonus_lvl_up_fe"
                                       value="<?php if (isset($_POST['bonus_lvl_up_fe'])) {
                                           echo $_POST['bonus_lvl_up_fe'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_me">Bonus LevelUp Points ME</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_me" name="bonus_lvl_up_me"
                                       value="<?php if (isset($_POST['bonus_lvl_up_me'])) {
                                           echo $_POST['bonus_lvl_up_me'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_he">Bonus LevelUp Points HE</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_he" name="bonus_lvl_up_he"
                                       value="<?php if (isset($_POST['bonus_lvl_up_he'])) {
                                           echo $_POST['bonus_lvl_up_he'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_mg">Bonus LevelUp Points MG</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_mg" name="bonus_lvl_up_mg"
                                       value="<?php if (isset($_POST['bonus_lvl_up_mg'])) {
                                           echo $_POST['bonus_lvl_up_mg'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dm">Bonus LevelUp Points DM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dm" name="bonus_lvl_up_dm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dm'])) {
                                           echo $_POST['bonus_lvl_up_dm'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dl">Bonus LevelUp Points DL</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dl" name="bonus_lvl_up_dl"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dl'])) {
                                           echo $_POST['bonus_lvl_up_dl'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_le">Bonus LevelUp Points LE</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_le" name="bonus_lvl_up_le"
                                       value="<?php if (isset($_POST['bonus_lvl_up_le'])) {
                                           echo $_POST['bonus_lvl_up_le'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_su">Bonus LevelUp Points SUM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_su" name="bonus_lvl_up_su"
                                       value="<?php if (isset($_POST['bonus_lvl_up_su'])) {
                                           echo $_POST['bonus_lvl_up_su'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bs">Bonus LevelUp Points BS</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bs" name="bonus_lvl_up_bs"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bs'])) {
                                           echo $_POST['bonus_lvl_up_bs'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dim">Bonus LevelUp Points DIM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dim" name="bonus_lvl_up_dim"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dim'])) {
                                           echo $_POST['bonus_lvl_up_dim'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_rf">Bonus LevelUp Points RF</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_rf" name="bonus_lvl_up_rf"
                                       value="<?php if (isset($_POST['bonus_lvl_up_rf'])) {
                                           echo $_POST['bonus_lvl_up_rf'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_fm">Bonus LevelUp Points FM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_fm" name="bonus_lvl_up_fm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_fm'])) {
                                           echo $_POST['bonus_lvl_up_fm'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_gl">Bonus LevelUp Points GL</label>
                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_gl" name="bonus_lvl_up_gl"
                                       value="<?php if (isset($_POST['bonus_lvl_up_gl'])) {
                                           echo $_POST['bonus_lvl_up_gl'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_ml">Bonus LevelUp Points ML</label>
                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_ml" name="bonus_lvl_up_ml"
                                       value="<?php if (isset($_POST['bonus_lvl_up_ml'])) {
                                           echo $_POST['bonus_lvl_up_ml'];
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_credits">Bonus Credits</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_credits" name="bonus_credits"
                                       value="<?php if (isset($_POST['bonus_credits'])) {
                                           echo $_POST['bonus_credits'];
                                       } ?>" placeholder="0"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_gcredits">Bonus Gold Credits</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_gcredits" name="bonus_gcredits"
                                       value="<?php if (isset($_POST['bonus_gcredits'])) {
                                           echo $_POST['bonus_gcredits'];
                                       } ?>" placeholder="0"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_gr_points">Bonud GR StatPoints</label>

                            <div class="controls">
                                <select name="bonus_gr_points" id="bonus_gr_points">
                                    <option value="0"
                                            <?php if (isset($_POST['bonus_gr_points']) && 0 == $_POST['bonus_gr_points']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['bonus_gr_points']) && 1 == $_POST['bonus_gr_points']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>

                                <p>Add earned bonus grand reset points</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="clear_masterlevel">Clear MasterLevel</label>

                            <div class="controls">
                                <select name="clear_masterlevel" id="clear_masterlevel">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_masterlevel']) && 0 == $_POST['clear_masterlevel']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_masterlevel']) && 1 == $_POST['clear_masterlevel']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>

                                <p>Clear master level and experience on reset</p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name="add_reset_settings">Add settings
                            </button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>