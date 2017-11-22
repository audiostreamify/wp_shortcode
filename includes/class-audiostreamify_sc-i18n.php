<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/donaldp
 * @since      1.0.0
 *
 * @package    Audiostreamify_sc
 * @subpackage Audiostreamify_sc/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Audiostreamify_sc
 * @subpackage Audiostreamify_sc/includes
 * @author     Donald Pakkies <donaldpakkies@gmail.com>
 */
class Audiostreamify_sc_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'audiostreamify_sc',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
