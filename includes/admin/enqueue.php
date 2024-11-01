<?php

/**
 * WP-ADMIN enqueue scripts
 *
 * @return void
 */
function AV_YT_admin_enqueue() {

	if( isset( $_GET['page'] ) 
		&& in_array( trim($_GET['page']), array( 
			'AV_themes_plugin_options',
			AV_YT_PLUGIN_SETTING_PAGE 
			) 
		) ) {

		wp_register_style( 'av_yt_css', plugins_url( '/assets/css/av_yt.css', AV_YT_PLUGIN_URL ) );
		wp_register_style( 'av_yt_rating_css', plugins_url( '/assets/css/jquery.rateyo.min.css', AV_YT_PLUGIN_URL ) );

		wp_enqueue_style( 'av_yt_css' );
		wp_enqueue_style( 'av_yt_rating_css' );
		wp_enqueue_style( 'wp-color-picker' ); 

		wp_enqueue_script( 'av_yt_rating_js', plugins_url( '/assets/js/jquery.rateyo.min.js', AV_YT_PLUGIN_URL ), array(), false, true );
		wp_enqueue_script( 'av_yt_main_js', plugins_url( '/assets/js/av_yt.js', AV_YT_PLUGIN_URL ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_script( 'av_yt_subscribe_embed', 'https://apis.google.com/js/platform.js', array(), null, true );
	}
}