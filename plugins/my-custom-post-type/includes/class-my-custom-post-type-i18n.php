<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       iandotht.ml
 * @since      1.0.0
 *
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/includes
 * @author     Ian Labao <ianlabao.kl@gmail.com>
 */
class My_Custom_Post_Type_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'my-custom-post-type',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
