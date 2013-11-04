<?php

/**
 * Désinstallation du plugin WP My Social Networks
 */
function wpmysocials_uninstall() {  
    if(get_option('wpmysocial_plugin_settings')) { delete_option('wpmysocial_plugin_settings'); }
    if(get_option('wpmysocial_plugin_version')) { delete_option('wpmysocial_plugin_version'); }
    if(get_option('wpmysocial_excludeid')) { delete_option('wpmysocial_excludeid'); }
    if(get_option('wpmysocial_excludecat')) { delete_option('wpmysocial_excludecat'); }
    if(get_option('wpmysocial_excludemeta')) { delete_option('wpmysocial_excludemeta'); }
    if(get_option('wpmysocial_belowpost')) { delete_option('wpmysocial_belowpost'); }
    if(get_option('wpmysocial_abovepost')) { delete_option('wpmysocial_abovepost'); }
}
register_deactivation_hook(__FILE__, 'wpmysocials_uninstall');
