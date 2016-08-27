<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://websitepro.website
 * @since      1.0.0
 *
 * @package    Vij_Logged_In_Buddypress
 * @subpackage Vij_Logged_In_Buddypress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Vij_Logged_In_Buddypress
 * @subpackage Vij_Logged_In_Buddypress/includes
 * @author     Vijaita Narain <vineetasaxena@yahoo.com>
 */
class Vij_Logged_In_Buddypress_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vij-logged-in-buddypress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
