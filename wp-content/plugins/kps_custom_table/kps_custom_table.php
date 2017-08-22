<?php
/*
Plugin Name: KPS Custom Table
Plugin URI: http://kultprosvet.net
Description: Create and use custom tables
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/

//plugin activation hook
register_activation_hook( __FILE__, 'kps_create_update_table' );


//plugin deactivation hook (NOT the same as plugin uninstall!)
register_deactivation_hook( __FILE__, 'kps_deactivate' );


/**
 * Create custom tables
 * @global type $wpdb
 */
function kps_create_update_table() {
    error_log('plugin activated');

    global $wpdb;
    $tablename = $wpdb->prefix . "hits";


    //if the table doesn't exist, create it
    if( $wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename ) {
        $sql = "CREATE TABLE `$tablename` (
        `hit_id` INT( 11 ) NOT NULL AUTO_INCREMENT,
        `hit_ip` VARCHAR( 100 ) NOT NULL ,
        `hit_post_id` INT( 11 ) NOT NULL ,
        `hit_date` DATETIME,
        PRIMARY KEY (hit_id)
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

/**
 * plugin deactivation
 */
function kps_deactivate() {
    error_log('plugin deactivated');
}


// Uninstall Methods

// register_uninstall_hook(__FILE__, 'pluginprefix_function_to_run');





//hook when showing a post
add_filter( 'the_content', 'kps_save_hit');

function kps_save_hit($content) {

    //execute if showing a single post only
    if (!is_single()) {
        return $content;
    }


    //info
    $post_id = get_the_ID();
    $ip = $_SERVER['REMOTE_ADDR'];


    global $wpdb;
    $tablename = $wpdb->prefix . "hits";

    // Insert a record
    $newdata = array(
        'hit_ip' => $ip,
        'hit_post_id' => $post_id,
        'hit_date' => current_time('mysql')
    );


    $wpdb->insert($tablename, $newdata);


    return $content;
}
