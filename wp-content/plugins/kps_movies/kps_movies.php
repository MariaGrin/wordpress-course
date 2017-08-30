<?php
/*
Plugin Name: KPS Movies
Plugin URI: http://kultprosvet.net
Description: Learn how to create custom post type.
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/

// https://codex.wordpress.org/Function_Reference/register_post_type



// Hooking up our function to theme setup
/*
add_action( 'init', 'create_posttype' );

function create_posttype() {
    register_post_type(
        'movies',
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
        )
    );
}
*/

add_action( 'init', 'custom_post_type' );

function custom_post_type() {

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x( 'Movies', 'Post Type General Name', 'kps_movies' ),
        'singular_name' => _x( 'Movie', 'Post Type Singular Name', 'kps_movies' ),
        'menu_name' => __( 'Movies', 'kps_movies' ),
        'parent_item_colon' => __( 'Parent Movie', 'kps_movies' ),
        'all_items' => __( 'All Movies', 'kps_movies' ),
        'view_item' => __( 'View Movie', 'kps_movies' ),
        'add_new_item' => __( 'Add New Movie', 'kps_movies' ),
        'add_new' => __( 'Add New', 'kps_movies' ),
        'edit_item' => __( 'Edit Movie', 'kps_movies' ),
        'update_item' => __( 'Update Movie', 'kps_movies' ),
        'search_items' => __( 'Search Movie', 'kps_movies' ),
        'not_found' => __( 'Not Found', 'kps_movies' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'kps_movies' ),
    );


    // Set UI labels for Custom Post Type
    $args= array(
        'label' => __( 'movies', 'kps_movies' ),
        'description' => __( 'Movie news and reviews', 'kps_movies' ),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        // https://codex.wordpress.org/Function_Reference/register_taxonomy
        'taxonomies' => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 55555,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-video-alt'
    );


    register_post_type(
        'movies',
        $args
    );
}


add_action( 'plugins_loaded', 'true_load_plugin_textdomain' );

function true_load_plugin_textdomain() {
    load_plugin_textdomain( 'kps_movies', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}


// makepot installation
// https://gist.github.com/johnpbloch/3436835


// Правило 1. Не используйте переменные в функциях перевода WordPress
$result = __($string, 'kps_movies');
$result = __("You have $number bananas", 'kps_movies');
$result = __('You have 5 bananas', $domain);

// Правило 2. Переводите фразы, а не строки
// Неправильно:
$result = __('You have ', 'kps_movies') . $number . __(' bananas', 'kps_movies');
// Правильно:
$result = sprintf( __('You have %d bananas', 'kps_movies'), $number );
$result = sprintf( _n('You have %d banana.', 'You have %d bananas.', $number, 'kps_movies'), $number );

// Правило 3. По возможности избегайте использования HTML в функциях перевода
//Неправильно:
$result = sprintf( __('<h3>You have %d bananas</h3>', 'kps_movies'), $number );
//Правильно:
$result = '<h3>'. sprintf( __('You have %d bananas', 'kps_movies'), $number ) . '</h3>';
