<?php

/**
 * Fired during plugin activation
 *
 * @link       iandotht.ml
 * @since      1.0.0
 *
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/includes
 * @author     Ian Labao <ianlabao.kl@gmail.com>
 */
class My_Custom_Post_Type_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-my-custom-post-type-admin.php';

		My_Custom_Post_Type_Admin::my_cpt();

		flush_rewrite_rules();
	}

}
