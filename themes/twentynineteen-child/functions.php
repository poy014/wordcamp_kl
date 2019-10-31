<?php
// enqueue parent style
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function my_games_cpt() {
   $labels = array(
     'name'               => _x( 'Games', 'post type general name' ),
     'singular_name'      => _x( 'Game', 'post type singular name' ),
     'add_new'            => _x( 'Add New', 'game' ),
     'add_new_item'       => __( 'Add New Games' ),
     'edit_item'          => __( 'Edit Game' ),
     'new_item'           => __( 'New Game' ),
     'all_items'          => __( 'All Games' ),
     'view_item'          => __( 'View Game' ),
     'search_items'       => __( 'Search Games' ),
     'not_found'          => __( 'No game found' ),
     'not_found_in_trash' => __( 'No game found in the Trash' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Games'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'Holds games and game specific data',
     'public'        => true,
     'menu_position' => 5,
     'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
     'has_archive'   => true,
   );
   register_post_type( 'games', $args ); 
 }
 add_action( 'init', 'my_games_cpt' );