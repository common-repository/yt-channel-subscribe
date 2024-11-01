<?php

/**
 * Deactivates the plugin
 *
 * @return void
 */
function AV_YT_deactivate_plugin() {

    $AV_YT_options									= get_option( 'AV_YT_options' );

    $AV_YT_options['plugin_activated'] 				= 1;
    $AV_YT_options['activation_notice_shown'] 		= 1;

    update_option('AV_YT_options', $AV_YT_options);

    AV_YT_plugin_status( 2 );
}