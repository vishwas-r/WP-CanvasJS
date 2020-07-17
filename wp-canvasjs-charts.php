<?php
/**
 * Plugin Name:       WP CanvasJS Charts
 * Plugin URI:        https://csultimates.com/
 * Description:       Add CanvasJS Charts to your WordPress Pages / Posts
 * Version:           1.1.0
 * Author:            Vishwas R
 * Author URI:        https://csultimates.com/
 * License:           MIT License
 * License URI:       https://opensource.org/licenses/MIT
 *
 * @link              https://csultimates.com/
 * @package           WPCanvasJSCharts
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'PLUGIN_VERSION' ) ) {
	define( 'PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'PLUGIN_NAME' ) ) {
	define( 'PLUGIN_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'PLUGIN_DIRECTORY' ) ) {
	define( 'PLUGIN_DIRECTORY', WP_PLUGIN_DIR . '/' . PLUGIN_NAME );
}

if ( ! defined( 'PLUGIN_URL' ) ) {
	define( 'PLUGIN_URL', WP_PLUGIN_URL . '/' . PLUGIN_NAME );
}

/**
 * Link.
 *
 * @since 1.0.0
 */
if ( file_exists( PLUGIN_DIRECTORY . '/charts/wp-canvasjs-chart.php' ) ) {
	require_once( PLUGIN_DIRECTORY . '/charts/wp-canvasjs-chart.php' );
}

if ( file_exists( PLUGIN_DIRECTORY . '/admin/admin-settings.php' ) ) {
	require_once( PLUGIN_DIRECTORY . '/admin/admin-settings.php' );
}