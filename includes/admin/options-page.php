<?php

/**
 * List all plugins by AV Themes
 *
 * @return void
 */
function AV_Plugins_plugin_options_page() {

	$av_plugins = av_get_plugins();

	include( AV_YT_PLUGIN_PATH . 'includes/admin/tpl/av-plugins-main.php' );
}

/**
 * Subscribe options page.
 *
 * @return void
 */
function AV_YT_plugin_options_page() {

	$plugin_options			= get_option( 'AV_YT_options' );
	
	include( AV_YT_PLUGIN_PATH . 'includes/admin/tpl/yt-plugin-options.php' );
}