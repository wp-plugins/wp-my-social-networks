<?php
/* Update si changements */
if($_POST['action'] == 'update') {
    
    if($_POST["wpmysocial_plugin_settings"]!='') {
        update_option('wpmysocial_plugin_settings', $_POST["wpmysocial_plugin_settings"]);
    }
    if($_POST["wpmysocial_excludeid"]!='') {
        update_option('wpmysocial_excludeid', $_POST["wpmysocial_excludeid"]);
    }
    if($_POST["wpmysocial_excludecat"]!='') {
        update_option('wpmysocial_excludecat', $_POST["wpmysocial_excludecat"]);
    }
    if($_POST["wpmysocial_excludemeta"]!='') {
        update_option('wpmysocial_excludemeta', $_POST["wpmysocial_excludemeta"]);
    }
    if($_POST["wpmysocial_belowpost"]!='') {
        update_option('wpmysocial_belowpost', $_POST["wpmysocial_belowpost"]);
    }
    if($_POST["wpmysocial_abovepost"]!='') {
        update_option('wpmysocial_abovepost', $_POST["wpmysocial_abovepost"]);
    }
    $options_saved = true;
    echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.', 'wp-mysocial').'</strong></p></div>';
}
// Récupère les paramètres sauvegardés
if(get_option('wpmysocial_plugin_settings')) { extract(get_option('wpmysocial_plugin_settings')); }
$options = get_option('wpmysocial_plugin_settings');

?>
<style type="text/css">.postbox h3 { cursor:pointer; }</style>
<div class="wrap">
    
     <!-- TABS OPTIONS -->
    <div id="icon-options-general" class="icon32"><br></div>
    <h2 class="nav-tab-wrapper">
        <a id="wpmysocial-menu-a" class="nav-tab nav-tab-active" href="#a" onfocus="this.blur();"><?php _e('Facebook', 'wp-mysocial'); ?></a>
        <a id="wpmysocial-menu-b" class="nav-tab" href="#b" onfocus="this.blur();"><?php _e('Twitter', 'wp-mysocial'); ?></a>
        <a id="wpmysocial-menu-c" class="nav-tab" href="#c" onfocus="this.blur();"><?php _e('Google+', 'wp-mysocial'); ?></a>
        <a id="wpmysocial-menu-d" class="nav-tab" href="#d" onfocus="this.blur();"><?php _e('AddThis', 'wp-mysocial'); ?></a>
        <a id="wpmysocial-menu-e" class="nav-tab" href="#e" onfocus="this.blur();"><?php _e('Options', 'wp-mysocial'); ?></a>
        <a id="wpmysocial-menu-about" class="nav-tab" href="#about" onfocus="this.blur();"><?php _e('About', 'wp-mysocial'); ?></a>
    </h2>
    
    <div style="margin-left:25px;margin-top: 15px;">
        
        <form method="post" action="" name="valide_wpmysocial">
            <input type="hidden" name="action" value="update" />
            
                <!-- ONGLET A -->
                <div class="wpmysocial-menu-a wpmysocial-menu-group">
                    <div id="wpmysocial-opt-a">
                         <ul>
                            <!-- FACEBOOK -->
                            <li>
                                <h3><?php _e('Facebook Like button', 'wp-mysocial'); ?></h3>
                            </li>
                            <!--  -->
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_like_btn]" value="1" <?php if($options['fb_like_btn']==1) { echo "checked"; } ?> />  <?php _e('Display the Facebook Like button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_send_btn]" value="1" <?php if($options['fb_send_btn']==1) { echo "checked"; } ?> />  <?php _e('Display the Facebook Send button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label><select name="wpmysocial_plugin_settings[fb_type_btnlike]">
                                        <option value="standard" <?php if($options['fb_type_btnlike']=="standard") { echo "selected"; } ?> />Standard</option>
                                        <option value="button_count" <?php if($options['fb_type_btnlike']=="button_count") { echo "selected"; } ?> />Button Count</option>
                                        <option value="box_count" <?php if($options['fb_type_btnlike']=="box_count") { echo "selected"; } ?> />Box Count</option>
                                        </select>  <?php _e('Select the type', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li><h3><?php _e('Position the Facebook Like', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_settings_home]" value="1" <?php if($options['fb_settings_home']==1) { echo "checked"; } ?> />  <?php _e('On the main page', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_settings_single]" value="1" <?php if($options['fb_settings_single']==1) { echo "checked"; } ?> />  <?php _e('On the posts', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_settings_category]" value="1" <?php if($options['fb_settings_category']==1) { echo "checked"; } ?> />  <?php _e('On the categories', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_settings_page]" value="1" <?php if($options['fb_settings_page']==1) { echo "checked"; } ?> />  <?php _e('On the pages', 'wp-mysocial'); ?>
                                </label>
                            </li>

                            <!-- BOUTON FACEBOOK SHARE -->
                            <li><h3><?php _e('Facebook Share button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label><?php echo $options['fb_share_btn']; ?>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_share_btn]" value="1" <?php if($options['fb_share_btn']==1) { echo "checked"; } ?> />  <?php _e('Display the Facebook Share button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label><select name="wpmysocial_plugin_settings[fb_type_btn]">
                                    <option value="standard" <?php if($options['fb_type_btn']=="standard") { echo "selected"; } ?> />Standard</option>
                                    <option value="button_count" <?php if($options['fb_type_btn']=="button_count") { echo "selected"; } ?> />Button Count</option>
                                    <option value="box_count" <?php if($options['fb_type_btn']=="box_count") { echo "selected"; } ?> />Box Count</option>
                                    </select> <?php _e('Select the type', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li><h3><?php _e('Position the Facebook Share', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_share_settings_home]" value="1" <?php if($options['fb_share_settings_home']==1) { echo "checked"; } ?> />  <?php _e('On the main page', 'wp-mysocial'); ?>
                                </label>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_share_settings_single]" value="1" <?php if($options['fb_share_settings_single']==1) { echo "checked"; } ?> />  <?php _e('On the posts', 'wp-mysocial'); ?>
                                </label> 
                                <label><input type="checkbox" name="wpmysocial_plugin_settings[fb_share_settings_category]" value="1" <?php if($options['fb_share_settings_category']==1) { echo "checked"; } ?> />  <?php _e('On the categories', 'wp-mysocial'); ?>
                                    </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[fb_share_settings_page]" value="1" <?php if($options['fb_share_settings_page']==1) { echo "checked"; } ?> />  <?php _e('On the pages', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li> &nbsp;</li>

                            <li>
                                <a href="#a" id="submitbutton" OnClick="document.forms['valide_wpmysocial'].submit();this.blur();" name="Save" class="button-primary"><span> <?php _e('Save this settings', 'wp-mysocial'); ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin options 1 -->
                
                <!--  Onglets B -->
                <div class="wpmysocial-menu-b wpmysocial-menu-group" style="display: none;">
                    <div id="wpmysocial-opt-b"  >
                         <ul>
                            <!--  -->
                            <li>
                                <h3><?php _e('Twitter button', 'wp-mysocial'); ?></h3>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[twitt_btn]" value="1" <?php if($options['twitt_btn']==1) { echo "checked"; } ?> />  <?php _e('Display re-twitt button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    Via : <input type="text" width="150" name="wpmysocial_plugin_settings[twitt_account]" value="<?php echo $options['twitt_account']; ?>"/> (<?php _e('This user will be refered in the tweet', 'wp-mysocial'); ?>)
                                </label>
                            </li>
                            <li>
                                <label><select name="wpmysocial_plugin_settings[twitt_type_btn]">
                                        <option value="vertical" <?php if($options['twitt_type_btn']=="vertical") { echo "selected"; } ?> /><?php _e('Vertical', 'wp-mysocial'); ?></option>
                                        <option value="horizontal" <?php if($options['twitt_type_btn']=="horizontal") { echo "selected"; } ?> /><?php _e('Horizontal', 'wp-mysocial'); ?></option>
                                        <option value="none" <?php if($options['twitt_type_btn']=="none") { echo "selected"; } ?> /><?php _e('No count', 'wp-mysocial'); ?></option>
                            </select>  <?php _e('Select the type', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li><h3><?php _e('Position the Twitter button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[twitt_settings_home]" value="1" <?php if($options['twitt_settings_home']==1) { echo "checked"; } ?> />  <?php _e('On the main page', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[twitt_settings_single]" value="1" <?php if($options['twitt_settings_single']==1) { echo "checked"; } ?> />  <?php _e('On the posts', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[twitt_settings_category]" value="1" <?php if($options['twitt_settings_category']==1) { echo "checked"; } ?> />  <?php _e('On the categories', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[twitt_settings_page]" value="1" <?php if($options['twitt_settings_page']==1) { echo "checked"; } ?> />  <?php _e('On the pages', 'wp-mysocial'); ?>
                                </label></li>
                            <li> &nbsp;</li>

                            <li>
                                <a href="#b" id="submitbutton" OnClick="document.forms['valide_wpmysocial'].submit();this.blur();" name="Save" class="button-primary"><span> <?php _e('Save this settings', 'wp-mysocial'); ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin B -->
                
                <!--  Onglets C -->
                <div class="wpmysocial-menu-c wpmysocial-menu-group" style="display: none;">
                    <div id="wpmysocial-opt-c"  >
                         <ul>
                            <!-- BOUTON GOOGLE+1 -->
                            <li><h3><?php _e('Google +1 button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[plusone_btn]" value="1" <?php if($options['plusone_btn']==1) { echo "checked"; } ?> />  <?php _e('Display the +1 button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label><select name="wpmysocial_plugin_settings[plusone_type_btn]">
                                        <option value="standard" <?php if($options['plusone_type_btn']=="standard") { echo "selected"; } ?> /><?php _e('Standard', 'wp-mysocial'); ?></option>
                                        <option value="small" <?php if($options['plusone_type_btn']=="small") { echo "selected"; } ?> /><?php _e('Small', 'wp-mysocial'); ?></option>
                                        <option value="medium" <?php if($options['plusone_type_btn']=="medium") { echo "selected"; } ?> /><?php _e('Medium', 'wp-mysocial'); ?></option>
                                        <option value="tall" <?php if($options['plusone_type_btn']=="tall") { echo "selected"; } ?> /><?php _e('Large', 'wp-mysocial'); ?></option>
                                        </select>  <?php _e('Select the type', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li><h3><?php _e('Position the Google +1 button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[plusone_settings_home]" value="1" <?php if($options['plusone_settings_home']==1) { echo "checked"; } ?> />  <?php _e('On the main page', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[plusone_settings_single]" value="1" <?php if($options['plusone_settings_single']==1) { echo "checked"; } ?> />  <?php _e('On the posts', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[plusone_settings_category]" value="1" <?php if($options['plusone_settings_category']==1) { echo "checked"; } ?> />  <?php _e('On the categories', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[plusone_settings_page]" value="1" <?php if($options['plusone_settings_page']==1) { echo "checked"; } ?> />  <?php _e('On the pages', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <!-- BOUTON SHARE GOOGLE+1 -->
                            <li><h3><?php _e('Google+ Share Button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[shareplusone_btn]" value="1" <?php if($options['shareplusone_btn']==1) { echo "checked"; } ?> />  <?php _e('Display the Share Google+ Button', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li>
                                <label><select name="wpmysocial_plugin_settings[shareplusone_type_btn]">
                                        <option value="none" <?php if($options['shareplusone_type_btn']=="none") { echo "selected"; } ?> /><?php _e('None', 'wp-mysocial'); ?></option>
                                        <option value="vertical-bubble" <?php if($options['shareplusone_type_btn']=="vertical-bubble") { echo "selected"; } ?> /><?php _e('Vertical', 'wp-mysocial'); ?></option>
                                        <option value="bubble" <?php if($options['shareplusone_type_btn']=="bubble") { echo "selected"; } ?> /><?php _e('Horizontal', 'wp-mysocial'); ?></option>
                                        </select>  <?php _e('Select the type', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li><h3><?php _e('Position the Google+ Share Button', 'wp-mysocial'); ?></h3></li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[shareplusone_settings_home]" value="1" <?php if($options['shareplusone_settings_home']==1) { echo "checked"; } ?> />  <?php _e('On the main page', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[shareplusone_settings_single]" value="1" <?php if($options['shareplusone_settings_single']==1) { echo "checked"; } ?> />  <?php _e('On the posts', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[shareplusone_settings_category]" value="1" <?php if($options['shareplusone_settings_category']==1) { echo "checked"; } ?> />  <?php _e('On the categories', 'wp-mysocial'); ?>
                                </label> 
                                <label>
                                    <input type="checkbox" name="wpmysocial_plugin_settings[shareplusone_settings_page]" value="1" <?php if($options['shareplusone_settings_page']==1) { echo "checked"; } ?> />  <?php _e('On the pages', 'wp-mysocial'); ?>
                                </label>
                            </li>
                            <li> &nbsp;</li>

                            <li>
                                <a href="#c" id="submitbutton" OnClick="document.forms['valide_wpmysocial'].submit();this.blur();" name="Save" class="button-primary"><span> <?php _e('Save this settings', 'wp-mysocial'); ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin C -->

                <!--  Onglets D -->
                <div class="wpmysocial-menu-d wpmysocial-menu-group" style="display: none;">
                    <div id="wpmysocial-opt-d"  >
                         <ul>
                            <!--  -->
                            <li>
                                <h3><?php _e('AddThis button', 'wp-mysocial'); ?></h3>
                            </li>
                            <!-- BOUTON ADDTHIS -->
                            <li>
                                <?php _e('Create your account here:', 'wp-mysocial'); ?> <a hre="https://www.addthis.com/get/smart-layers#" target="_blank">https://www.addthis.com/get/smart-layers</a>
                            </li>
                            <li>
                                <label><input type="checkbox" name="wpmysocial_plugin_settings[addthis_btn]" value="1" <?php if($options['addthis_btn']==1) { echo "checked"; } ?> />  <?php _e('Display Addthis button', 'wp-mysocial'); ?></label>
                            </li>
                            <li>
                                <label><input type="text" width="150" name="wpmysocial_plugin_settings[addthis_account]" value="<?php echo $options['addthis_account']; ?>"/> <?php _e('Addthis account', 'wp-mysocial'); ?></label>
                            </li>

                            <li> &nbsp;</li>

                            <li>
                                <a href="#d" id="submitbutton" OnClick="document.forms['valide_wpmysocial'].submit();this.blur();" name="Save" class="button-primary"><span> <?php _e('Save this settings', 'wp-mysocial'); ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin D -->

                <!--  Onglets E -->
                <div class="wpmysocial-menu-e wpmysocial-menu-group" style="display: none;">
                    <div id="wpmysocial-opt-e"  >
                         <ul>
                            <!--  -->
                            <li><h3><?php _e("Don't display on Posts/Pages", 'wp-mysocial'); ?></h3><li>
                            <li>
                                <p><?php _e("Enter the <b>ID's</b> of those Pages/Posts separated by comma. e.g 13,5,87<br/>You can also include a <b>custom post types</b> or <b>custom post format</b> (all separated by comma)", 'wp-mysocial'); ?><br /><input type="text" name="wpmysocial_excludeid" style="width: 300px;" value="<?php echo get_option('wpmysocial_excludeid',''); ?>" /></p>
                            </li>

                            <li><h3><?php _e("Don't display on Category", 'wp-mysocial'); ?></h3></li>
                            <li>
                                <p><?php _e("Enter the ID's of those Categories separated by comma. e.g 131,45,817", 'wp-mysocial'); ?><br/>
                                <input type="text" name="wpmysocial_excludecat" style="width: 300px;" value="<?php echo get_option('wpmysocial_excludecat',''); ?>" /></p>
                            </li>

                            <li>
                                <h3><?php _e('Where to Display', 'wp-mysocial'); ?></h3>
                                    <input type="checkbox" name="wpmysocial_abovepost" id="wpmysocial_abovepost" value="true"<?php if (get_option( 'wpmysocial_abovepost', false ) == true) echo ' checked'; ?>> <?php _e('Display Above Content', 'wp-mysocial'); ?><br />
                                    <input type="checkbox" name="wpmysocial_belowpost" id="wpmysocial_belowpost" value="true"<?php if (get_option( 'wpmysocial_belowpost', false ) == true) echo ' checked'; ?>> <?php _e('Display Below Content', 'wp-mysocial'); ?>
                            </li>
                            <li><h3><?php _e('If some other plugin is adding the Facebook Meta tags', 'wp-mysocial'); ?></h3>
                               <input type="checkbox" name="wpmysocial_excludemeta" id="wpmysocial_excludemeta" value="true"<?php if (get_option( 'wpmysocial_excludemeta', false ) == true) echo ' checked'; ?>> <?php _e('Do not add Facebook OG META tags', 'wp-mysocial'); ?>
                            </li>
                            <li><h3><?php _e('Add a margin?', 'wp-mysocial'); ?></h3>
                                <label>
                                    <?php _e('Top margin:', 'wp-mysocial'); ?> <input type="text" width="2" size="5" name="wpmysocial_plugin_settings[margin_top]" value="<?php echo $options['margin_top']; ?>" />px
                                </label>
                            </li>
                            <li>
                                <label>
                                    <?php _e('Bottom margin:', 'wp-mysocial'); ?> <input type="text" width="2" size="5" name="wpmysocial_plugin_settings[margin_bottom]" value="<?php echo $options['margin_bottom']; ?>" />px
                                </label></li>
                            <li> &nbsp;</li>

                            <li>
                                <a href="#e" id="submitbutton" OnClick="document.forms['valide_wpmysocial'].submit();this.blur();" name="Save" class="button-primary"><span> <?php _e('Save this settings', 'wp-mysocial'); ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- fin E -->
                
                </form>
        
                <!-- Onglet options 7 -->
                <div class="wpmysocial-menu-about wpmysocial-menu-group" style="display: none;">
                    <div id="wpmysocial-opt-about">
                         <ul>
                            <li>
                                <?php _e('This plugin has been developed for you for free by <a href="http://www.restezconnectes.fr" target="_blank">Florent Maillefaud</ a>. It is royalty free, you can take it, modify it, distribute it as you see fit. <br /> <br />It would be desirable that I can get feedback on your potential changes to improve this plugin for all.', 'wp-mysocial'); ?>
                            </li>
                            <li> &nbsp;</li>
                            <li>
                                <!-- FAIRE UN DON SUR PAYPAL -->
                                <div><?php _e('If you want Donate (French Paypal) for my current and future developments:', 'wp-mysocial'); ?><br />
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="ABGJLUXM5VP58">
                                    <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                </div>
                                <!-- FIN FAIRE UN DON -->
                            </li>
                            <li> &nbsp;</li>
                        </ul>
                    </div>
                </div>
                <!-- fin options 7 -->

     </div><!-- -->
    
</div><!-- wrap -->