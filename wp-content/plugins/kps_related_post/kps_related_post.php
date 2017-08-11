<?php
/*
Plugin Name: KPS Related Posts
Plugin URI: http://kultprosvet.net
Description: Load posts from the database.
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/


add_filter( 'the_content', 'kps_add_related_posts');

function kps_add_related_posts($content) {
    if(!is_singular('post')) {
        return $content;
    }

    $categories = get_the_terms(get_the_ID(), 'category');
    $categoriesIds = [];

    foreach ( $categories as $category) {
        $categoriesIds[] = $category->term_id;
    }

    // https://codex.wordpress.org/Class_Reference/WP_Query
    $loop = new WP_Query(array(
        'category__in' => $categoriesIds,
        'posts_per_page' => 4,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    ));


    if($loop->have_posts()) {

        $content .= 'RELATED POSTS:<br /><ul>';

        while ($loop->have_posts()) {
            $loop->the_post();
            $content .= '<li><a href="' . get_permalink() .'">' . get_the_title() . '</a></li>';
        }
        $content .= '</ul>';
    }

    wp_reset_query();

    return $content;

}
