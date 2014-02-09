<?php

/**
 * Désinstallation du plugin WP My Social Networks
 */
function wpmysocials_uninstall() {  
    if(get_option('wpmysocial_plugin_settings')) { delete_option('wpmysocial_plugin_settings'); } else { echo 'Erreur : wpmysocial_plugin_settings'; }
    if(get_option('wpmysocial_plugin_version')) { delete_option('wpmysocial_plugin_version'); } else { echo 'Erreur : wpmysocial_plugin_version'; }
    if(get_option('wpmysocial_excludeid')) { delete_option('wpmysocial_excludeid'); } else { echo 'Erreur : wpmysocial_excludeid'; }
    if(get_option('wpmysocial_excludecat')) { delete_option('wpmysocial_excludecat'); } else { echo 'Erreur : wpmysocial_excludecat'; }
    if(get_option('wpmysocial_excludemeta')) { delete_option('wpmysocial_excludemeta'); } else { echo 'Erreur : wpmysocial_excludemeta'; }
    if(get_option('wpmysocial_belowpost')) { delete_option('wpmysocial_belowpost'); } else { echo 'Erreur : wpmysocial_belowpost'; }
    if(get_option('wpmysocial_abovepost')) { delete_option('wpmysocial_abovepost'); } else { echo 'Erreur : wpmysocial_abovepost'; }
    if(get_option('wpmysocial_plugin_lang')) { delete_option('wpmysocial_plugin_lang'); } else { echo 'Erreur : wpmysocial_plugin_lang'; }
    
}
register_deactivation_hook(__FILE__, 'wpmysocials_uninstall');
