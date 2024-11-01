<?php

/**
 * Shortcode content generator
 *
 * @param  Array $attr
 * @param  String $content
 * @return String	Returns the HTML for the plugin
 */
function AV_YT_subscribe_shortcode( $attr, $content = null ) {

	$options				= get_option( 'AV_YT_options' );

	if( !empty( $attr['channel_id'] ) ) { 
		
		$attr['channel_id'] 	= sanitize_text_field( $attr['channel_id'] ); 
	}

	if( !empty( $attr['layout'] ) ) { 
		
		$attr['layout'] 		= sanitize_text_field( 
									( in_array( $attr['layout'], array('default', 'full') ) ? $attr['layout'] : $options['layout'] ) 
								); 
	}
	
	if( !empty( $attr['theme'] ) ) { 
		
		$attr['theme'] 			= sanitize_text_field( 
									( in_array( $attr['theme'], array('default', 'dark') ) ? $attr['theme'] : $options['dark'] ) 
								); 
	}
	
	if( !empty( $attr['subscribers'] ) ) { 
		
		$attr['subscribers'] 	= sanitize_text_field( 
									( in_array( $attr['subscribers'], array('default', 'hidden') ) ? $attr['subscribers'] : $options['subscribers'] ) 
								);
	}

	if( !empty( $attr['align'] ) ) { 
		
		$attr['align'] 			= sanitize_text_field( 
									( in_array( $attr['align'], array('left', 'center', 'right') ) ? $attr['align'] : $options['align'] ) 
								);
	}

	if( !empty( $attr['color'] ) ) { 
		
		$attr['color'] 			= sanitize_hex_color( $attr['color'] );
	}

	if( !empty( $attr['bgcolor'] ) ) { 
		
		$attr['bgcolor'] 		= sanitize_hex_color( $attr['bgcolor'] );
	}

	if( !empty( $attr['bordercolor'] ) ) { 
		
		$attr['bordercolor'] 	= sanitize_hex_color( $attr['bordercolor'] );
	}

	if( !empty( $attr['text'] ) ) { 
		
		$attr['text'] 	= sanitize_text_field( $attr['text'] ); 
	}

	$attr 					= shortcode_atts( array(
		'channel_id'		=> $options['channel_id'],
		'layout'			=> $options['layout'],
		'theme'				=> $options['theme'],
		'subscribers'		=> $options['show_subscribers_count'],
		'align'				=> $options['widget_alignment'],
		'color'				=> $options['widget_color'],
		'bgcolor'			=> $options['widget_bg_color'],
		'bordercolor'		=> $options['widget_border_color'],
		'text'				=> $options['widget_text']
	), $attr );

	if( ! is_null( $content ) && trim($content) != "" ) {

		$attr['text'] = do_shortcode( $content );
	}	

	include( AV_YT_PLUGIN_PATH . 'includes/front/tpl/yt-subscribe.php' );

	return $html;
}