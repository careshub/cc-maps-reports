<?php
/**
 * Generate the public-facing pieces of the plugin.
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
 * Plugin class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `admin/class-group-namespace-admin.php`
 *
 *
 * @package Community_Commons_Maps_Reports
 * @author  AuthorName
 */
class CC_Maps_Reports_Reporting_Interface {

	/**
	 *
	 * The parameters that describe this interface.
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	protected $args = array();

	/**
	 * Initialize the plugin by setting class properties.
	 *
	 * @since     1.0.0
	 */
	public function __construct( $passed_args ) {
		// Parse passed args. Use wp_parse_args() if there are cool defaults.
		$this->args = $passed_args;

		// Add $_GET variables.
		$this->args['style'] = isset( $_GET['style'] ) ? $_GET['style'] : 'chna';

	}

	/**
	 * Initialize the plugin by setting class properties.
	 *
	 * @since     1.0.0
	 *
	 * @return html
	 */
	public function build_interface() {
		echo "This is the reporting interface<br />";
		var_dump( $this->args );
		echo '<br />' . $this->delegated_thing( 'else' );
	}

	/**
	 * Calculate a thing.
	 *
	 * @since     1.0.0
	 *
	 * @param $var
	 *
	 * @return string
	 */
	public function delegated_thing( $var = 'something' ) {
		switch ( $var ) {
			case 'something':
				$retval = 'foo';
				break;
			case 'else':
				$retval = 'bar';
				break;
			default:
				$retval = 'baz';
				break;
		}
		return $retval;
	}
}
