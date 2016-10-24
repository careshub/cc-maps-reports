<?php
/**
 * Utility functions for the plugin.
 *
 * Community Commons Maps and Reports
 *
 * @package   Community_Commons_Maps_Reports
 * @author    AuthorName
 * @license   GPL-2.0+
 * @link      http://www.communitycommons.org
 * @copyright 2016 Community Commons
 */

/**
 * Identify if the current location is a map- or report-related screen.
 *
 * @since   1.0.0
 *
 * @return  bool Whether the current screen is a map- or report-related screen.
 */
function cc_maps_reports_is_screen(){
	$is_screen = false;

	// Add the slugs of pages that are part of this plugin's purview.
	if ( is_page( 'maps' ) || is_page( 'reports' )  ) {
		$is_screen = true;
	}

	return apply_filters( 'cc_maps_reports_is_screen', $is_screen );
}
