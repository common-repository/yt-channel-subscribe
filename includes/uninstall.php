<?php

/**
 * Uninstall plugin callback
 *
 * @return void
 */
function AV_YT_uninstall_pugin() {

    $AV_YT_options				= get_option( 'AV_YT_options' );

    if( isset( $AV_YT_options['uninstall_delete_data'] ) && $AV_YT_options['uninstall_delete_data'] == 1 ) {

        delete_option( 'AV_YT_options' );
    }

    AV_YT_plugin_status( 3 );
}