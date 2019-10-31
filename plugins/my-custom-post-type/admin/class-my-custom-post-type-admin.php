<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       iandotht.ml
 * @since      1.0.0
 *
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    My_Custom_Post_Type
 * @subpackage My_Custom_Post_Type/admin
 * @author     Ian Labao <ianlabao.kl@gmail.com>
 */
class My_Custom_Post_Type_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in My_Custom_Post_Type_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The My_Custom_Post_Type_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/my-custom-post-type-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in My_Custom_Post_Type_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The My_Custom_Post_Type_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/my-custom-post-type-admin.js', array( 'jquery' ), $this->version, false );

	}

	/*
	* function to initiate our CPT
	*/
	public static function my_cpt() {

		// variables
		$cap_type 	= 'post';
		$plural 	= 'Movies';
		$single 	= 'Movie';
		$cpt_name 	= 'Movie';

		// CPT settings
		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= FALSE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-media-video';
		$opts['menu_position']							= 25;
		$opts['public']									= TRUE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= TRUE;
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'editor', 'thumbnail' );
		$opts['taxonomies']								= array();

		// Set Capabilities
		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		// Labels on WP-ADMIN
		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", 'my-custom-post-type' );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", 'my-custom-post-type' );
		$opts['labels']['all_items']					= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}" , 'my-custom-post-type' );
		$opts['labels']['menu_name']					= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['name']							= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, 'my-custom-post-type' );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", 'my-custom-post-type' );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", 'my-custom-post-type' );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", 'my-custom-post-type' );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", 'my-custom-post-type' );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", 'my-custom-post-type' );
		$opts['labels']['singular_name']				= esc_html__( $single, 'my-custom-post-type' );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", 'my-custom-post-type' );

		// permalink related
		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), 'my-custom-post-type' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'my-custom-post-type-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts ); // wp function to add CPT
	}

	/*
	* function to initiate our CPT's taxonomy
	*/
	public static function my_taxonomy() {

		// variable
		$plural 	= 'Genres';
		$single 	= 'Genre';
		$tax_name 	= 'movie_genre';

		// CPT taxonomy settings
		$opts['hierarchical']							= TRUE;
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';

		// Set Capabilities
		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		// Labels on WP-ADMIN
		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", 'my-custom-post-type' );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", 'my-custom-post-type' );
		$opts['labels']['all_items'] 					= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", 'my-custom-post-type' );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}" , 'my-custom-post-type');
		$opts['labels']['menu_name'] 					= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['name'] 						= esc_html__( $plural, 'my-custom-post-type' );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", 'my-custom-post-type' );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", 'my-custom-post-type' );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", 'my-custom-post-type' );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", 'my-custom-post-type' );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", 'my-custom-post-type' );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", 'my-custom-post-type' );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", 'my-custom-post-type' );
		$opts['labels']['singular_name'] 				= esc_html__( $single, 'my-custom-post-type' );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", 'my-custom-post-type' );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", 'my-custom-post-type' );

		// permalink related
		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), 'my-custom-post-type' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'my-custom-post-type-taxonomy-options', $opts );

		register_taxonomy( $tax_name, 'movie', $opts );

	} // new_taxonomy_type()

}
