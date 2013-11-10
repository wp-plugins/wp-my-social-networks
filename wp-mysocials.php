<?php

/*
Plugin Name: WP My Social Networks
Plugin URI: http://www.restezconnectes.fr/un-plugin-wordpress-pour-partager-sur-les-reseaux-sociaux/
Description: Propose un encart avec différents réseaux sociaux. Facebook Like & Send, Twitter, +1 de Google. Le tout paramètrable et en multilangue.
Author: Florent Maillefaud
Author URI: http://www.restezconnectes.fr/
Version: 1.3
*/


/*
Change Log
05/11/2013 - Bug mise à jour paramètres
04/11/2013 - Résolution de bugs et mise à jour
13/01/2012 - Modifications pour page accueil
16/07/2011 - Ajout d'options des positions (2)
08/07/2011 - Ajout de la page Uninstall
08/07/2011 - Ajout d'options des positions
21/06/2001 - Création du Plugin
*/

if(!defined('WP_CONTENT_URL')) { define('WP_CONTENT_URL', get_option( 'siteurl') . '/wp-content'); }
if(!defined('WP_CONTENT_DIR')) { define('WP_CONTENT_DIR', ABSPATH . 'wp-content'); }
if(!defined('WP_PLUGIN_URL')) { define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins'); }
if(!defined('WP_PLUGIN_DIR')) { define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins'); }
if(!defined('WP_BASENAME')) { define( 'WP_BASENAME', plugin_basename(__FILE__) ); }

// include du fichier de désinstall
include("uninstall.php");

// multilingue
add_action( 'init', 'wpmysocial_make_multilang' );
function wpmysocial_make_multilang() {
    load_plugin_textdomain('wp-mysocial', false, dirname( plugin_basename( __FILE__ ) ).'/languages');
}

// Add "Réglages" link on plugins page
/* Ajout réglages au plugin */
$wpmysocial_dashboard = ( is_admin() ) ? 'options-general.php?page='.basename(dirname(__FILE__)).'/wp-mysocials.php' : '';
define( 'WP_SETTINGS', $wpmysocial_dashboard);
add_filter( 'plugin_action_links_' . WP_BASENAME, 'wpmysocial_plugin_actions' );
function wpmysocial_plugin_actions ( $links ) {
    $settings_link = '<a href="'.WP_SETTINGS.'">'.__('Settings', 'wp-mysocial').'</a>';
    array_unshift ( $links, $settings_link );
    return $links;
}

if(function_exists('register_deactivation_hook')) {
    register_deactivation_hook(__FILE__, 'wpmysocials_uninstall');
}

function afficheReseauxSociaux() {

    if( get_option('wpmysocial_plugin_settings') ) { extract( get_option('wpmysocial_plugin_settings') ); }

    if(is_single()) {
        $positionReseaux = array(
            'fb_like' => $fb_settings_single,
            'fb_share' => $fb_share_settings_single,
            'fb_faces' => $fb_faces_settings_single,
            'plusone' => $plusone_settings_single,
            'shareplusone' => $shareplusone_settings_single,
            'twitter' => $twitt_settings_single
        );

    } else if(is_page()) {
         $positionReseaux = array(
            'fb_like' => $fb_settings_page,
            'fb_share' => $fb_share_settings_page,
            'fb_faces' => $fb_faces_settings_page,
            'plusone' => $plusone_settings_page,
            'shareplusone' => $shareplusone_settings_page,
            'twitter' => $twitt_settings_page
        );

    } else if(is_home()) {
         $positionReseaux = array(
            'fb_like' => $fb_settings_home,
            'fb_share' => $fb_share_settings_home,
            'fb_faces' => $fb_faces_settings_home,
            'plusone' => $plusone_settings_home,
            'shareplusone' => $shareplusone_settings_home,
            'twitter' => $twitt_settings_home
        );

    } else {
        $positionReseaux = array(
            'fb_like' => $fb_settings_category,
            'fb_share' => $fb_share_settings_category,
            'fb_faces' => $fb_faces_settings_category,
            'plusone' => $plusone_settings_category,
            'shareplusone' => $shareplusone_settings_category,
            'twitter' => $twitt_settings_category
        );

    }

    if($fb_settings_single==1 or $fb_share_settings_single==1 or $plusone_settings_single==1 or $twitt_settings_single==1) {
        $linkPermaLink = get_permalink($post->ID);
    } else {
        $linkPermaLink = the_permalink();
    }
    /* div général */
    $output .= '<div id="wp-socials" style="margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px;">';
    
        /* div pour les boutons des réseaux sociaux */
        $output .= '<div id="wp-socials-general-btn">';
        
        /* Bouton +1 de Google */
        if($plusone_btn==1 && $positionReseaux['plusone']==1) {
            $output .= '<div id="wp-socials-plusone"><g:plusone count="true" size="'.$plusone_type_btn.'" href="'.$linkPermaLink.'"></g:plusone></div>';
        }
        /* Bouton partager de Google */
        if($shareplusone_btn==1 && $positionReseaux['shareplusone']==1) {
            if($shareplusone_type_btn == '') { $shareplusone_type_btn = 'none'; }
            $output .= '<div id="wp-socials-plusone"><div class="g-plus" data-action="share" data-annotation="'.$shareplusone_type_btn.'" data-href="'.$linkPermaLink.'"></div>
                        <script type="text/javascript">';
            $output .= "
                          window.___gcfg = {lang: '".get_option('wpmysocial_plugin_lang')."'};

                          (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                        </script></div>";
        }
        /* ------------ */
        
        /* Bouton FB Like */
        if($fb_like_btn==1 && $positionReseaux['fb_like']==1) {
            
            $fbLikeSend = "false";
            $fbLikeClear = '';

            if($fb_send_btn==1) {
               $fbLikeSend = "true";
            }
            $output .= '<div id="wp-socials-fb-like">';
            $output .= '<div id="fb-root"></div>';
            $output .= '<script src="http://connect.facebook.net/'.WPLANG.'/all.js#appId=241045832586163&amp;xfbml=1"></script>';
            $output .= '<fb:like href="'.$linkPermaLink.'" send="'.$fbLikeSend.'" layout="'.$fb_type_btnlike.'" width="450" show_faces="false" font="lucida grande"></fb:like>';
            $output .= '</div>';
           
        }
        /* ------------ */

        /* Bouton FB partager */
        if($fb_share_btn==1 && $positionReseaux['fb_share']==1) {
            $output .= '<div id="wp-socials-fb-share">
                            <fb:share-button type="button_count" href="'.$linkPermaLink.'"></fb:share-button>
                      </div>';
        }
        /* ------------ */

        /* Bouton ReTwitte */
        if($twitt_btn==1 && $positionReseaux['twitter']==1) {
            $output .= '<div id="wp-socials-twitter">
                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$twitt_type_btn.'"';
            if($twitt_account) { $output .= 'data-via="'.$twitt_account.'"'; }
            $output .= ' data-lang="'.get_option('wpmysocial_plugin_lang').'" data-url="'.$linkPermaLink.'">Tweeter</a>
                    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                 </div>';
        }
        /* ------------ */

        /* Bouton AddThis */
        if($addthis_btn==1) {
            if($addthis_account!="") {
                $pubId = $addthis_account;
                $addThisMore = '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>';
            } else {
                $pubId = 'xa-4e01a6d865a58df0';
                $addThisMore = '<script type="text/javascript">var addthis_config = {"services_exclude":facebook,myspace};</script>';
            }
            $output .= '<div id="wp-socials-addthis">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                    </div>
                    '.$addThisMore.'
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid='.$pubId.'"></script>
                    <!-- AddThis Button END -->
                 </div>';
        }
        $output .= '</div>';
        /* Fin div pour les boutons des réseaux sociaux */

    $output .= '<div style="clear:both"></div>';
    $output .= '</div>';
    /* fin div général */

    return $output;
}

function add_social_content($content) {

    global $single;
    global $post;
    global $page;
    
    $expostid = get_option('wpmysocial_excludeid','');
    $expostcat = get_option('wpmysocial_excludecat','');
    
    if( get_option('wpmysocial_plugin_settings') )  {
        extract( get_option('wpmysocial_plugin_settings') );
        $output = afficheReseauxSociaux();
        if(get_option('wpmysocial_abovepost')==true && !get_option('wpmysocial_belowpost')) {
            $returnContent = $output.$content;
        } else if(get_option('wpmysocial_belowpost')==true && !get_option('wpmysocial_abovepost')) {         
            $returnContent = $content.$output;
        } else {
            $returnContent = $output.$content.$output;
        }

    }
    
    if( $expostid!='' ) {
        $pids = explode(",", $expostid);
        if( in_array($post->ID, $pids) ) {
            $returnContent =  $content;
        }
        $psttype = get_post_type($post->ID);
        if( in_array($psttype, $pids) && $psttype!==flase ) {
            $returnContent =  $content;
        }
        $pstfrmt = get_post_format($post->ID);
        if( in_array($pstfrmt, $pids) && $pstfrmt!==false ) {
            return $content;
        }
    }
    if( $expostcat!='' ) {
        $pcat = explode(",", $expostcat);
        if( in_category($pcat) ) {
            $returnContent =  $content;
        }
    }
    return $returnContent;

}
add_filter('the_content', 'add_social_content', 10);
add_filter('the_excerpt', 'add_social_content', 10);

//récupère le formulaire d'administration du plugin
function wpmysocials_admin_panel() {
    include("wp-mysocials-admin.php");
}

function wpmysocials_css() {
    $siteurl = get_option('siteurl');
    $url = $siteurl.'/wp-content/plugins/'.basename(dirname(__FILE__)).'/wp-mysocials-css.css';
    echo "<link href='$url' rel='stylesheet' type='text/css' />";
}

function plusOneOptions() {
    extract(get_option('wpmysocial_plugin_settings'));
    if($plusone_btn==1) {
    echo '<link rel="canonical" href="'.get_permalink($post->ID).'" />
';
    echo "<script type=\"text/javascript\" src=\"https://apis.google.com/js/plusone.js\">{lang: '".get_option('wpmysocial_plugin_lang')."'}</script>
";
    }
}

function wpsocials_add_meta() {
    
    global $post, $posts;
    
    if(!get_option('wpmysocial_excludemeta')) {
        
        $desc = ""; 
        if (has_excerpt($post->ID)) {
            $desc = esc_attr( strip_tags(get_the_excerpt($post->ID)) );
        } else {
            $desc = esc_attr( str_replace("\r\n",' ', substr(strip_tags(strip_shortcodes($post->post_content)), 0, 160)) );
        }
        if(trim($desc)=="") { $desc = get_the_title(''); }

        if(function_exists('get_post_thumbnail_id') && function_exists('wp_get_attachment_image_src')) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'large');
            $thumb = $image_url[0];
        }

echo '
<meta property="og:type" content="article" />';
echo '
<meta property="og:title" content="'.get_bloginfo('name').'" />';
echo '
<meta property="og:url" content="'.get_permalink().'"/>';
echo '
<meta property="og:description" content="'.$desc.'" />';
echo '
<meta property="og:site_name" content="'.get_bloginfo('name').'" />';
echo '
<meta property="og:image" content="'.$thumb.'" />';

    }
}

function wpmysocials_admin_scripts() {
    wp_register_script('wpm-admin-settings', WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)).'/wp-mysocials-admin-settings.js');
    wp_enqueue_script('wpm-admin-settings');
}
if (isset($_GET['page']) && $_GET['page'] == basename(dirname(__FILE__)).'/wp-mysocials.php') {
    add_action('admin_print_scripts', 'wpmysocials_admin_scripts');
}

function wpmysocials_admin() {
    $hook = add_options_page( __('Display social networks options', 'wp-mysocial'), __('Social Networks', 'wp-mysocial'),  10, __FILE__, "wpmysocials_admin_panel");
    
    // Valeurs par défaut
    if(!get_option('wpmysocial_plugin_settings')) { 
        $wpmysocials_AdminOptions = array(  
            'fb_like_btn' => 1,
            'fb_send_btn' => 1,
            'fb_faces_btn' => 1,
            'fb_type_btnlike' => 'button_count',
            'fb_settings_single' => 1,
            'fb_settings_page' => 1,
            'fb_share_btn' => '',
            'fb_share_settings_single' => 1,
            'twitt_btn' => 1,
            'twitt_settings_single' => 1,
            'twitt_settings_page' => 1,
            'twitt_type_btn '=> 'horizontal',
            'plusone_settings_single' => 1,
            'plusone_settings_page' => 1,
            'plusone_btn' => 1,
            'plusone_type_btn' => 'medium',
            'margin_top' => 20,
            'margin_bottom' => 0
        );  
        $wpmysocials_Settings = get_option('wpmysocial_plugin_settings');  
        if (!empty($wpmysocials_Settings)) {  
            foreach ($wpmysocials_Settings as $key => $option) {
                $wpmysocials_AdminOptions[$key] = $option;
            }
        }
        update_option('wpmysocial_plugin_settings', $wpmysocials_AdminOptions);
    }
    
        
    /* Ajoute la version dans les options */
    add_option('wpmysocial_plugin_version', '1.3');
    
    // On recupère la langue
    $recupLang = explode('_', WPLANG);
    add_option('wpmysocial_plugin_lang', $recupLang[0]);

}

//intègre le tout aux pages Admin de Wordpress
add_action("admin_menu", "wpmysocials_admin");
add_action('wp_head', 'plusOneOptions');
add_action('wp_head', 'wpmysocials_css' );
add_action('wp_head', 'wpsocials_add_meta' );

?>
