<?php
/*
Plugin Name: Shortcodes and remote data
Plugin URI: http://kultprosvet.net
Description: Learn how to create shortcodes and to retrieve data from the web.
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/


// Пример для Быстрого Старта
/*
add_shortcode('foobar' , 'foobar_func'); // [foobar]

function foobar_func ($atts) {
    return "foo and bar";
}
*/

add_action('init', 'kps_register_shortcodes');

function kps_register_shortcodes () {
    add_shortcode('rate', 'kps_rate');
}

/*
function kps_rate ($args, $content) {
    //return strtoupper($content);
    return strtoupper($args['number']);
}
*/


function kps_rate ($args, $content) {
    $result = wp_remote_get('http://finance.yahoo.com/d/quotes.csv?s='.$args['from'].$args['to'].'=X&f=l1');
    return $result['body'] . ' ' .esc_attr($content);
}
