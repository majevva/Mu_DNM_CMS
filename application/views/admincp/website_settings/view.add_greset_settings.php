<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url; ?>admincp">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo $this->config->base_url; ?>admincp/manage-settings/greset">Grand Reset Settings</a>
            </li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header well">
                <h2><i class="icon-edit"></i> Add New Grand Reset Settings</h2>
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
                            <label class="control-label" for="sreset">Starting GReset</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="sreset" name="sreset"
                                       value="<?php if (isset($_POST['sreset'])) {
                                           echo htmlspecialchars($_POST['sreset'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ereset">Ending GReset</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="ereset" name="ereset"
                                       value="<?php if (isset($_POST['ereset'])) {
                                           echo htmlspecialchars($_POST['ereset'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="9999"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="money">Required Zen</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="money" name="money"
                                       value="<?php if (isset($_POST['money'])) {
                                           echo htmlspecialchars($_POST['money'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="9999"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="money_x_reset">Is Zen Multiplied by Grand Reset</label>

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
                                           echo htmlspecialchars($_POST['level'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="400"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="reset">Required reset</label>
                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="reset" name="reset"
                                       value="<?php if (isset($_POST['reset'])) {
                                           echo htmlspecialchars($_POST['reset'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="100"/>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="clear_all_resets">Clear All Resets</label>
                            <div class="controls">
                                <select name="clear_all_resets" id="clear_all_resets">
                                    <option value="0"
                                            <?php if (isset($_POST['clear_all_resets']) && 0 == $_POST['clear_all_resets']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['clear_all_resets']) && 1 == $_POST['clear_all_resets']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>
								<p>Clear all character resets or only resets required above.</p>
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
                                           echo htmlspecialchars($_POST['new_stat_points'], ENT_QUOTES, 'UTF-8');
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
                                           echo htmlspecialchars($_POST['new_free_points'], ENT_QUOTES, 'UTF-8');
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
                                               echo htmlspecialchars($_POST['bonus_lvl_up_dw'], ENT_QUOTES, 'UTF-8');
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
                                           echo htmlspecialchars($_POST['bonus_lvl_up_sm'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_gm">Bonus LevelUp Points GM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_gm" name="bonus_lvl_up_gm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_gm'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_gm'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dk">Bonus LevelUp Points DK</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dk" name="bonus_lvl_up_dk"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dk'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_dk'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bk">Bonus LevelUp Points BK</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bk" name="bonus_lvl_up_bk"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bk'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_bk'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bm">Bonus LevelUp Points BM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bm" name="bonus_lvl_up_bm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bm'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_bm'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_fe">Bonus LevelUp Points ELF</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_fe" name="bonus_lvl_up_fe"
                                       value="<?php if (isset($_POST['bonus_lvl_up_fe'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_fe'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_me">Bonus LevelUp Points ME</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_me" name="bonus_lvl_up_me"
                                       value="<?php if (isset($_POST['bonus_lvl_up_me'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_me'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_he">Bonus LevelUp Points HE</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_he" name="bonus_lvl_up_he"
                                       value="<?php if (isset($_POST['bonus_lvl_up_he'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_he'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_mg">Bonus LevelUp Points MG</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_mg" name="bonus_lvl_up_mg"
                                       value="<?php if (isset($_POST['bonus_lvl_up_mg'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_mg'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dm">Bonus LevelUp Points DM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dm" name="bonus_lvl_up_dm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dm'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_dm'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dl">Bonus LevelUp Points DL</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dl" name="bonus_lvl_up_dl"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dl'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_dl'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_le">Bonus LevelUp Points LE</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_le" name="bonus_lvl_up_le"
                                       value="<?php if (isset($_POST['bonus_lvl_up_le'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_le'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_su">Bonus LevelUp Points SUM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_su" name="bonus_lvl_up_su"
                                       value="<?php if (isset($_POST['bonus_lvl_up_su'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_su'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_bs">Bonus LevelUp Points BS</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_bs" name="bonus_lvl_up_bs"
                                       value="<?php if (isset($_POST['bonus_lvl_up_bs'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_bs'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_dim">Bonus LevelUp Points DIM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_dim" name="bonus_lvl_up_dim"
                                       value="<?php if (isset($_POST['bonus_lvl_up_dim'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_dim'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_rf">Bonus LevelUp Points RF</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_rf" name="bonus_lvl_up_rf"
                                       value="<?php if (isset($_POST['bonus_lvl_up_rf'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_rf'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_fm">Bonus LevelUp Points FM</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_fm" name="bonus_lvl_up_fm"
                                       value="<?php if (isset($_POST['bonus_lvl_up_fm'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_fm'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_gl">Bonus LevelUp Points GL</label>
                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_gl" name="bonus_lvl_up_gl"
                                       value="<?php if (isset($_POST['bonus_lvl_up_gl'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_gl'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="bonus_lvl_up_ml">Bonus LevelUp Points ML</label>
                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_lvl_up_ml" name="bonus_lvl_up_ml"
                                       value="<?php if (isset($_POST['bonus_lvl_up_ml'])) {
                                           echo htmlspecialchars($_POST['bonus_lvl_up_ml'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>

                                <p>Bonus LevelUp Points after reset character this value is multiplied by resets</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_points_save">Bonus LevelUp Point Save</label>

                            <div class="controls">
                                <select name="bonus_points_save" id="bonus_points_save">
                                    <option value="0"
                                            <?php if (isset($_POST['bonus_points_save']) && 0 == $_POST['bonus_points_save']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['bonus_points_save']) && 1 == $_POST['bonus_points_save']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>

                                <p>Multiply bonus points after each grand reset</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_reset_stats">Bonus Reset Stats</label>

                            <div class="controls">
                                <select name="bonus_reset_stats" id="bonus_reset_stats">
                                    <option value="0"
                                            <?php if (isset($_POST['bonus_reset_stats']) && 0 == $_POST['bonus_reset_stats']){ ?>selected="selected"<?php } ?>>
                                        No
                                    </option>
                                    <option value="1"
                                            <?php if (isset($_POST['bonus_reset_stats']) && 1 == $_POST['bonus_reset_stats']){ ?>selected="selected"<?php } ?>>
                                        Yes
                                    </option>
                                </select>

                                <p>Add bonus stats earned by reseting character</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_credits">Bonus Credits</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_credits" name="bonus_credits"
                                       value="<?php if (isset($_POST['bonus_credits'])) {
                                           echo htmlspecialchars($_POST['bonus_credits'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="bonus_gcredits">Bonus Gold Credits</label>

                            <div class="controls">
                                <input type="text" class="span3 typeahead" id="bonus_gcredits" name="bonus_gcredits"
                                       value="<?php if (isset($_POST['bonus_gcredits'])) {
                                           echo htmlspecialchars($_POST['bonus_gcredits'], ENT_QUOTES, 'UTF-8');
                                       } ?>" placeholder="0"/>
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

                                <p>Clear master level and experience on grand reset</p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name="add_greset_settings">Add settings
                            </button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>