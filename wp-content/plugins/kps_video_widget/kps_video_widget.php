<?php
/*
Plugin Name: KPS Video Widget
Plugin URI: http://kultprosvet.net
Description: Learn how to create simple widgets and post metadata.
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/


// Данный хук страбатывает когда WP отображает метабоксы
add_action('add_meta_boxes', 'kps_add_metabox' );

function kps_add_metabox() {
    // http://codex.wordpress.org/Function_Reference/add_meta_box
    add_meta_box('kps_youtube', 'YouTube Video Link', 'kps_youtube_handler', 'post');
}


// Показываем пользователю поля метабокса
/**
 * metabox handler
 */
function kps_youtube_handler() {
    $value = get_post_custom($post->ID);
    $youtube_link = esc_attr($value['kps_youtube'][0]);
/*    echo '<pre>';
    var_export($value);
    wp_die();
    echo '</pre>';
*/
    echo '<label>YouTube Video Link</label>
          <input type="text" name="kps_youtube" id="kps_youtube" value="'.$youtube_link.'">';
}



// Данный хук страбатывает когда WP сохраняет post
add_action('save_post', 'kps_save_metabox' );


function kps_save_metabox($post_id) {
    //don't save metadata if it's autosave
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    //check if user can edit post
    if(!current_user_can('edit_post')) {
        return;
    }


    if(isset($_POST['kps_youtube'])) {
        update_post_meta($post_id, 'kps_youtube', esc_url($_POST['kps_youtube']));
    }
}



//register widgets
add_action('widgets_init', 'kps_widget_init');


function kps_widget_init() {
    register_widget('kps_Widget');
}


/**
 * widget class
 */
class kps_Widget extends WP_Widget {

    // инициируем виджет
    function __construct() {
        $widget_options = array(
            'classname' => 'kps_class', //CSS
            'description' => 'Show a YouTube Video from post metadata'
        );
        $this->WP_Widget('kps_id', 'Youtube Video', $widget_options);
    }



    /**
     * show widget form in Appearence / Widgets
     */
    function form ($instance) {
        $default = array('title' => 'Video');
        $instance = wp_parse_args((array) $instance, $default );

        $title = esc_attr($instance['title']);

        echo '<p>Title <input type="text" class="widefat" name="'. $this->get_field_name('title') .'" value="'.$title .'"/></p>';
    }


    /**
     * save widget form
     */
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }


    /**
     * show widget in post / page
     */
    function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        //show only if single post
        if(is_single()) {
            echo $before_widget;

            echo $before_title.$title.$after_title;

            //get post metadata
            $kps_youtube = esc_url(get_post_meta(get_the_ID(), 'kps_youtube', true));

            //print widget content
            echo '<iframe width="200" height="200" src="https://www.youtube.com/embed/'. get_yt_videoid($kps_youtube) .'" frameborder="0" allowfullscreen></iframe>';

            echo $after_widget;
        }

    }


}


/**
 * get youtube video id from link
 * from: http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id
 */

function get_yt_videoid($url) {
    parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
    return $my_array_of_vars['v'];
}








