<?php
/**
 * Community Commons Maps and Reports
 *
 * @package   Community_Commons_Maps_Reports
 * @author    AuthorName
 * @license   GPL-2.0+
 * @link      http://www.communitycommons.org
 * @copyright 2016 Community Commons
 */

/**
 * Output html for a map or report interface.
 *
 * @since   1.0.0
 *
 * @param   string $type Is this a map or report pane?
 * @param   ... Add description of possible params here.
 *
 * @return  html The pane.
 */
function cc_maps_reports_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'type' => 'map'
		), $atts );
	if ( is_page( 'maps' ) || 'map' == $a['type'] ) {
		$cc_maps = new CC_Maps_Reports_Mapping_Interface( $a );
		ob_start();
		$cc_maps->build_interface();
		return ob_get_clean();
	} elseif ( is_page( 'reports' ) || 'report' == $a['type'] ) {
		$cc_reports = new CC_Maps_Reports_Reporting_Interface( $a );
		ob_start();
		$cc_reports->build_interface();
		return ob_get_clean();
	}
}
add_shortcode( 'cc-maps-reports', 'cc_maps_reports_shortcode' );
