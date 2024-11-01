<?php
/**
 * Channel Subscribe - YouTube
 *
 * @package   av-channel-subscribe
 * @link      https://avthemes.com/subscribe-plugin-youtube
 * @author    AV Themes <https://avthemes.com>
 * @copyright 2020 AV Themes
 * @license   GPL v2 or later
 *
 * 
 * Plugin Name: Channel Subscribe - YouTube
 * Plugin URI: https://avthemes.com/subscribe-plugin-youtube
 * Description: Add a YouTube subscribe widget to your sidebar, to any page using shortcodes and automatically add the YouTube Subscribe button under every YouTube Video on your pages and posts.
 * Version: 1.0.1
 * Author: AV Themes
 * Author URI: https://avthemes.com
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: av-subscribe
 * Domain Path: /plugin/languages
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

// Security check if plugin is being loaded via WP or not
if ( !function_exists( 'add_action') ) exit( __( 'Going fishing are we? Sorry no fishes here!', 'av-subscribe' ) );

// Environment Setup
define( 'AV_YT_DEV_MODE', 1 );
define( 'AV_YT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AV_YT_PLUGIN_URL', __FILE__ );
define( 'AV_YT_PLUGIN_SETTING_PAGE', 'AV_YT_plugin_options' );
define( 'AV_YT_PID', 100 );
define( 'AV_YT_PLUGIN_NAME', 'Channel Subscribe - YouTube' );

// Plugin File Includes
include( AV_YT_PLUGIN_PATH . 'includes/activate.php' );
include( AV_YT_PLUGIN_PATH . 'includes/deactivate.php' );
include( AV_YT_PLUGIN_PATH . 'includes/uninstall.php' );
include( AV_YT_PLUGIN_PATH . 'includes/utilities.php' );
include( AV_YT_PLUGIN_PATH . 'includes/front/enqueue.php' );
include( AV_YT_PLUGIN_PATH . 'includes/admin/init.php' );
include( AV_YT_PLUGIN_PATH . 'includes/admin/menus.php' );
include( AV_YT_PLUGIN_PATH . 'includes/admin/options-page.php' );
include( AV_YT_PLUGIN_PATH . 'includes/admin/process.php' );
include( AV_YT_PLUGIN_PATH . 'includes/shortcodes/subscribe_shortcode.php' );
include( AV_YT_PLUGIN_PATH . 'includes/widgets/init.php' );
include( AV_YT_PLUGIN_PATH . 'includes/widgets/sidebar.php' );


// Plugin Hooks
register_activation_hook( __FILE__, 'AV_YT_activate_plugin' ); // activate the plugin
register_deactivation_hook( __FILE__, 'AV_YT_deactivate_plugin' );
register_uninstall_hook( __FILE__, 'AV_YT_uninstall_pugin' ); // uninstall the plugin
add_action( 'wp_enqueue_scripts', 'AV_YT_front_enqueue' ); // enqueue scripts on front-end
add_action( 'admin_init', 'AV_YT_admin_init' );
add_action( 'admin_menu', 'AV_YT_admin_menus' ); // add plugin admin menu page
add_action( 'admin_notices', 'AV_YT_activation_admin_notices' ); // add admin notices
add_action( 'widgets_init', 'AV_YT_widgets_init' ); // initializing widget
add_action(	'wp_ajax_AV_YT_send_feedback', 'AV_YT_send_feedback' ); // send feedback to server

// Plugin Filters
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'AV_YT_plugin_settings_link'); // add settings link for plugin


// Plugin Shortcodes
add_shortcode( 'AV_Channel_Subscribe', 'AV_YT_subscribe_shortcode' );
