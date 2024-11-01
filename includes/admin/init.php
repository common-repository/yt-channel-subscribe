<?php

/**
 * Plugin initialization
 *
 * @return void
 */
function AV_YT_admin_init() {

    include( AV_YT_PLUGIN_PATH . 'includes/admin/enqueue.php' );

    add_action( 'admin_enqueue_scripts', 'AV_YT_admin_enqueue' );
    add_action( 'admin_post_AV_YT_save_options', 'AV_YT_save_options' );
}