<?php
// enqueue parent style
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles()
{
   wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

function my_games_cpt()
{
   $labels = array(
      'name'               => _x('Games', 'post type general name'),
      'singular_name'      => _x('Game', 'post type singular name'),
      'add_new'            => _x('Add New', 'game'),
      'add_new_item'       => __('Add New Games'),
      'edit_item'          => __('Edit Game'),
      'new_item'           => __('New Game'),
      'all_items'          => __('All Games'),
      'view_item'          => __('View Game'),
      'search_items'       => __('Search Games'),
      'not_found'          => __('No game found'),
      'not_found_in_trash' => __('No game found in the Trash'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Games',
   );
   $args = array(
      'labels'        => $labels,
      'description'   => 'Holds games and game specific data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
      'has_archive'   => true,

      // customization starts here!
      'menu_icon'           => 'dashicons-buddicons-activity', // using dashicon: https://developer.wordpress.org/resource/dashicons/
      //'menu_icon'           => 'http://www.example.com/wp-content/uploads/2014/11/your-cpt-icon.png', // using your own image

      'menu_position'      => 10,
      /*
      MENU POSITION:
         2 Dashboard
         4 Separator
         5 Posts <-- DEFAULT
         10 Media
         15 Links
         20 Pages
         25 Comments
         59 Separator
         60 Appearance
         65 Plugins
         70 Users
         75 Tools
         80 Settings
         99 Separator
      */

      'hierarchical'       => true, // allow parenting
      'capability_type'    => 'page', // need to allow parenting and add "page-attributes" to support param

      // QUERY RELATED
      'can_export'                     => TRUE,
      'exclude_from_search'            => FALSE,
      'has_archive'                     => FALSE,
      'hierarchical'                     => FALSE,
      'public'                           => TRUE,
      'publicly_querable'               => TRUE,
      'query_var'                        => TRUE,

      // PERMALINKS
      'rewrite'                        => FALSE,

      // ADMIN UI RELATED
      'show_in_admin_bar'               => TRUE,
      'show_in_menu'                     => TRUE,
      'show_in_nav_menu'               => TRUE,
      'show_ui'                        => TRUE,
   );
   register_post_type('games', $args);
}
add_action('init', 'my_games_cpt');


function create_classification_hierarchical_taxonomy()
{

   $labels = array(
      'name' => _x('Classifications', 'taxonomy general name'),
      'singular_name' => _x('Classification', 'taxonomy singular name'),
      'search_items' =>  __('Search Classifications'),
      'all_items' => __('All Classifications'),
      'parent_item' => __('Parent Classification'),
      'parent_item_colon' => __('Parent Classification:'),
      'edit_item' => __('Edit Classification'),
      'update_item' => __('Update Classification'),
      'add_new_item' => __('Add New Classification'),
      'new_item_name' => __('New Classification Name'),
      'menu_name' => __('Classifications'),
   );

   // Now register the taxonomy
   register_taxonomy('classification', array('games'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'classification'),
   ));
}

add_action( 'init', 'create_classification_hierarchical_taxonomy', 0 );
