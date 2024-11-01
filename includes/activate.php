<?php
/**
 * Plugin activation
 *
 * @return void
 */
function AV_YT_activate_plugin() {

    $AV_YT_options				= get_option( 'AV_YT_options' );

    if( ! $AV_YT_options ) {

        $opts                           = array(

            'channel_id'                    => '',
            'layout'      				    => 'default',
            'theme'      				    => 'default',
            'show_subscribers_count'   	    => 'default',
            'widget_text'   			    => __( 'Subscribe to our channel', 'av-subscribe' ),
            'widget_alignment'   		    => 'center',
            'widget_color'   		        => '#222222',
            'widget_bg_color'   		    => '#eeeeee',
            'widget_border_color'   	    => '#cccccc',
            'uninstall_delete_settings'   	=> 0,
            'plugin_activated'              => 1,
            'activation_notice_shown'       => 1,
        );

        add_option( 'AV_YT_options', $opts );
    }

    AV_YT_plugin_status( 1 );
}

/**
 * Add settings link after plugin activation on plugin list page
 *
 * @param  Array $links
 * @return Array
 */
function AV_YT_plugin_settings_link( $links ) {
    
    $url = get_admin_url() . 'admin.php?page='.AV_YT_PLUGIN_SETTING_PAGE;
    
    $settings_link = '<a href="' . $url . '">' . __('Settings', 'av-subscribe') . '</a>';
    
    array_unshift( $links, $settings_link );
    
    return $links;
}

/**
 * Displays an admin notice after plugin activation
 *
 * @return void
 */
function AV_YT_activation_admin_notices() {

    $AV_YT_options				= get_option( 'AV_YT_options' );

    if (  isset( $AV_YT_options['activation_notice_shown'] )
            && $AV_YT_options['activation_notice_shown'] == 1
            && is_plugin_active('av-channel-subscribe/index.php') 
        ) {

        $notice_type            = 'success';
        $is_dismissible         = true;
        $message                = sprintf( '%s <a href="' . admin_url( 'admin.php?page=' . AV_YT_PLUGIN_SETTING_PAGE ) . '">%s</a>', __( 'Thank you for installing & activating the <strong>AV Channel Subscribe</strong> plugin.', 'av-subscribe' ), __( 'Go to settings &rsaquo;', 'av-subscribe' ) );

        include( AV_YT_PLUGIN_PATH . 'includes/admin/tpl/admin_notice.php' );

        $AV_YT_options['activation_notice_shown'] = 2;

        update_option('AV_YT_options', $AV_YT_options);
    }
}