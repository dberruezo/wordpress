<?php
/**
 * Plugin Name: Newsletter
 * Description: Plugin muy simple de newsletter.
 * Version: 1.0.1
 * Author: Goo
 * Author URI: http://www.Google.com
 * Text Domain: wpens
 * Domain Path: languages
 *
 * License: GPLv2 or later
 * Domain Path: languages
 *
 * @package Formulario Newsletter
 * @category Core
 * @author Alpha BPO
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions 
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */
if( !defined( 'WPENS_VERSION' ) ) {
	define( 'WPENS_VERSION', '1.0.1' ); // plugin version
}
if( !defined( 'WPENS_PLUGIN_DIR' ) ) {
	define( 'WPENS_PLUGIN_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WPENS_ADMIN_DIR' ) ) {
	define( 'WPENS_ADMIN_DIR', WPENS_PLUGIN_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'WPENS_PLUGIN_URL' ) ) {
	define( 'WPENS_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}

/**
 * Load Text Domain
 * 
 * Locales found in:
 *   - WP_LANG_DIR/easy-online-booking/wpeob-LOCALE.mo
 *   - WP_LANG_DIR/plugins/wpeob-LOCALE.mo
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */
function wpens_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'wpens' );

	load_textdomain( 'wpens', WP_LANG_DIR . '/formulario-newsletter/wpens-' . $locale . '.mo' );
	load_plugin_textdomain( 'wpens', false, WPENS_PLUGIN_DIR . '/languages' );
}
add_action( 'load_plugins', 'wpens_load_plugin_textdomain' );

/**
 * Activation hook
 * 
 * Register plugin activation hook.
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */

register_activation_hook( __FILE__, 'wpens_plugin_install' );

/**
 * Deactivation hook
 *
 * Register plugin deactivation hook.
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */

register_deactivation_hook( __FILE__, 'wpens_plugin_uninstall' );

/**
 * Plugin Setup Activation hook call back 
 *
 * Initial setup of the plugin setting default options 
 * and database tables creations.
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */
function wpens_plugin_install() {
	
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'subscribers';

	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		first_name varchar(255) NULL,
		last_name varchar(255) NULL,
		email varchar(255) NOT NULL,
		comments text NULL,
		user_ip varchar(100) NULL,
		date timestamp NULL,
		PRIMARY KEY (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */
function wpens_plugin_uninstall() {
	
	global $wpdb;

	/*$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'ens_subscribers';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );*/
}

/**
 * Initialize all global variables
 * 
 * @package Easy Newsletter Signups
 * @since 1.0.0
 */

global $wpens_scripts,$wpens_admin,$wpens_newsletter;


//Includes all scripts class file
require_once( WPENS_PLUGIN_DIR . '/includes/class-wpens-scripts.php');

//Includes shortcode class file
require_once ( WPENS_PLUGIN_DIR . '/includes/class-wpens-shortcodes.php');

//Includes public class file
require_once ( WPENS_PLUGIN_DIR . '/includes/class-wpens-public.php');

//Includes Admin file
require_once ( WPENS_ADMIN_DIR . '/class-wpens-admin.php');