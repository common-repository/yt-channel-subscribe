<?php
/**
 * Enqueues scripts for the Subscribe plugin
 *
 * @return void
 */
function AV_YT_front_enqueue(  ) {

    $ver            = ( AV_YT_DEV_MODE ? time() : false );

	$options				= get_option( 'AV_YT_options' );
	
	$attr 					= array(
		'channel_id'		=> $options['channel_id'],
		'layout'			=> $options['layout'],
		'theme'				=> $options['theme'],
		'subscribers'		=> $options['show_subscribers_count'],
		'align'				=> $options['widget_alignment'],
		'color'				=> $options['widget_color'],
		'bgcolor'			=> $options['widget_bg_color'],
		'bordercolor'		=> $options['widget_border_color'],
		'text'				=> $options['widget_text']
	);

	include( AV_YT_PLUGIN_PATH . 'includes/front/tpl/yt-subscribe.php' );

	wp_register_script( 'AV_YT_js_main', plugins_url( '/assets/js/av_yt_front.js', AV_YT_PLUGIN_URL ), array(), $ver, true );
	wp_register_script( 'AV_YT_channel_subscribe_btn', 'https://apis.google.com/js/platform.js', array(), null, true );
	wp_add_inline_script( 'AV_YT_channel_subscribe_btn', "var AV_YT_html = '" . $html . "'" );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'AV_YT_channel_subscribe_btn' );
	wp_enqueue_script( 'AV_YT_js_main' );
	
}