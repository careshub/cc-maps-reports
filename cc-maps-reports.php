<?php
/**
 * Extras for the Maps_Reports hub.
 *
 * @package   Community_Commons_Maps_Reports
 * @author    AuthorName
 * @license   GPL-2.0+
 * @link      http://www.communitycommons.org
 * @copyright 2016 Community Commons
 *
 * @wordpress-plugin
 * Plugin Name:       CC Maps and Reports
 * Plugin URI:        @TODO
 * Description:       Adds mapping and reporting tools to the CC site
 * Version:           1.0.0
 * Author:            AuthorName
 * Text Domain:       cc-maps-reports
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/careshub/cc-maps-reports
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

function cc_maps_reports_class_init() {

	$base_path = plugin_dir_path( __FILE__ );

	// Functions
	require_once( $base_path . 'includes/functions.php' );

	// Template output functions
	require_once( $base_path . 'public/views/template-tags.php' );
	require_once( $base_path . 'public/views/template-mapping.php' );
	require_once( $base_path . 'public/views/template-reporting.php' );
	require_once( $base_path . 'public/views/shortcodes.php' );

	// The main class
	require_once( $base_path . 'public/class-cc-maps-reports.php' );
	$cc_maps_report = new CC_Maps_Reports();
	// Add the action and filter hooks.
	$cc_maps_report->hook_actions();

	// Admin and dashboard functionality
	if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
		require_once( $base_path . 'admin/class-cc-maps-reports-admin.php' );
		$cc_maps_report_admin = new CC_Maps_Reports_Admin();
		// Add the action and filter hooks.
		$cc_maps_report_admin->hook_actions();
	}

}
add_action( 'bp_include', 'cc_maps_reports_class_init' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-cc-maps-reports-activator.php';
register_activation_hook( __FILE__, array( 'CC_Maps_Reports_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CC_Maps_Reports_Activator', 'deactivate' ) );

/*
 * Helper function.
 * @return Fully-qualified URI to the root of the plugin.
 */
function cc_maps_reports_get_plugin_base_uri(){
	return plugin_dir_url( __FILE__ );
}

/*
 * Helper function.
 * @TODO: Update this when you update the plugin's version above.
 *
 * @return string Current version of plugin.
 */
function cc_maps_reports_get_plugin_version(){
	return '1.0.0';
}