<?php

/**
 * Save plugin option in wp_options table
 *
 * @return void
 */
function AV_YT_save_options() {

	if( ! current_user_can( 'edit_theme_options' ) ) {

		wp_die( __( 'You are not allowed to be on this page.', 'av-subscribe' ) );
	}

	if ( ! isset( $_POST['AV_YT_options_verify'] ) 
    	|| ! wp_verify_nonce( $_POST['AV_YT_options_verify'], 'AV_YT_save_options' ) 
		) {
		
		exit( __( 'You are not allowed to access this page.', 'av-subscribe' ) );
	
	}

	$options											= get_option( 'AV_YT_options' );

	$options['channel_id']								= sanitize_text_field( $_POST['AV_YT_channel_id'] );
	$options['layout']									= sanitize_text_field( ( in_array( $_POST['AV_YT_layout'], array('default', 'full') ) ? $_POST['AV_YT_layout'] : 'default' ) );
	$options['theme']									= sanitize_text_field( ( in_array( $_POST['AV_YT_theme'], array('default', 'dark') ) ? $_POST['AV_YT_theme'] : 'default' ) );
	$options['show_subscribers_count']					= sanitize_text_field( ( in_array( $_POST['AV_YT_show_subscribers_count'], array('default', 'hidden') ) ? $_POST['AV_YT_show_subscribers_count'] : 'default' ) );
	$options['widget_text']								= sanitize_text_field( $_POST['AV_YT_widget_text'] );
	$options['widget_alignment']						= sanitize_text_field( ( in_array( $_POST['AV_YT_widget_alignment'], array('left', 'center', 'right' ) ) ? $_POST['AV_YT_widget_alignment'] : 'center' ) );
	$options['widget_color']							= sanitize_hex_color( $_POST['AV_YT_widget_color'] );
	$options['widget_bg_color']							= sanitize_hex_color( $_POST['AV_YT_widget_bg_color'] );
	$options['widget_border_color']						= sanitize_hex_color( $_POST['AV_YT_widget_border_color'] );
	$options['uninstall_delete_settings']				= ( isset( $_POST['AV_YT_uninstall_delete_settings'] ) ? absint( $_POST['AV_YT_uninstall_delete_settings'] ) : 0 );

	update_option( 'AV_YT_options', $options );

	wp_redirect( admin_url( 'admin.php?page=' . AV_YT_PLUGIN_SETTING_PAGE . '&status=1' ) );
}


/**
 * Sends feedback to plugin author
 *
 * @return JSON
 */
function AV_YT_send_feedback() {

	$api_url = "https://api.avthemes.com/v1/";

	$output['status'] = 1;
	
	if ( ! isset( $_POST['AV_YT_rating_nonce'] ) 
    	|| ! wp_verify_nonce( $_POST['AV_YT_rating_nonce'], 'AV_YT_send_feedback' ) 
		) {
		
		wp_send_json( $output, 200 );
	
	}

	if( isset( $_POST['formData'] ) ) {

		$errors = false;

		parse_str($_POST['formData'], $var);

		if( empty( $var['AV_YT_rating_name'] ) ) { $errors = true; $output['error']['name'] = 2;  }
		if( empty( $var['AV_YT_rating_email'] ) || ! is_email( $var['AV_YT_rating_email'] ) ) { $errors = true; $output['error']['email'] = 2;  }
		if( empty( $var['AV_YT_plugin_feedback'] ) ) { $errors = true; $output['error']['descr'] = 2;  }

		if( $errors ) {

			wp_send_json( $output, 200 );
		}

		$body['method']				= 'POST';
		$body['timeout']			= '10';
		$body['body']['method']		= "feedback";
		$body['body']['pid'] 		= AV_YT_PID;
		$body['body']['name'] 		= $var['AV_YT_rating_name'];
		$body['body']['email'] 		= sanitize_email( $var['AV_YT_rating_email'] );
		$body['body']['title'] 		= '[' . AV_YT_PLUGIN_NAME . '] New feedback';
		$body['body']['descr'] 		= sanitize_text_field( $var['AV_YT_plugin_feedback'] );
		$body['body']['rating'] 	= ( isset( $var['AV_YT_plugin_rating'] ) ? floatval( $var['AV_YT_plugin_rating'] ) : 4 );

		$output 					= wp_remote_post( $api_url, $body );

		wp_send_json( json_decode( $output['body'], true) );

	}
}

/**
 * Sets the status of the plugin
 *
 * @param  Integer $status [1|2|3]
 * @return void
 */
function AV_YT_plugin_status( $status ) {

	$api_url = "https://api.avthemes.com/v1/";

	$body['method']					= 'POST';
	$body['timeout']				= '1';
	$body['body']['method']			= 'status';
	$body['body']['pid'] 			= AV_YT_PID;
	$body['body']['s']				= (int)$status;
	$body['body']['d']				= wp_parse_url( get_site_url(), PHP_URL_HOST );

	wp_remote_post( $api_url, $body );
}