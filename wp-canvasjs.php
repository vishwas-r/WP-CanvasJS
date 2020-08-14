<?php
/**
 * Plugin Name:       WP CanvasJS
 * Plugin URI:        https://vishwas.me/
 * Description:       Add CanvasJS Charts & StockCharts to your WordPress Pages / Posts
 * Version:           1.2.0
 * Author:            Vishwas R
 * Author URI:        https://vishwas.me/
 * License:           MIT License
 * License URI:       https://opensource.org/licenses/MIT
 *
 * @link              https://vishwas.me/
 * @package           WPCanvasJS
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
	define( 'PLUGIN_VERSION', '1.2.0' );
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
if ( file_exists( PLUGIN_DIRECTORY . '/chart/wp-canvasjs-chart.php' ) ) {
	require_once( PLUGIN_DIRECTORY . '/chart/wp-canvasjs-chart.php' );
}

if ( file_exists( PLUGIN_DIRECTORY . '/stockchart/wp-canvasjs-stockchart.php' ) ) {
	require_once( PLUGIN_DIRECTORY . '/stockchart/wp-canvasjs-stockchart.php' );
}

if ( file_exists( PLUGIN_DIRECTORY . '/admin/admin-settings.php' ) ) {
	require_once( PLUGIN_DIRECTORY . '/admin/admin-settings.php' );
}