<?php

add_image_size( 'small_thumb', 50, 50, true );


// HTTP API


/*
echo "<pre>";
$response = wp_remote_get('http://swapi.co/api/people/1');
$data = json_decode(wp_remote_retrieve_body($response));
print_r($data->name);
echo "</pre>";
*/


// Пример хорошего фильтра
/*
function get_my_social_profiles() {
    $profiles = array(
        'twitter' => 'http://twitter.com/wpmagru',
        'facebook' => 'http://facebook.com/wpmagru',
    );
    return apply_filters('my_social_profiles', $profiles);
}

$profiles = get_my_social_profiles();
foreach ( $profiles as $service => $url ) {
    printf( '<a href="%s">%s</a><br />', esc_url( $url ), $service );
}

*/


// Фильтры и события в ядре WordPress

// Отключить комментирование
/*
function my_comments_open() { return false; }
add_filter( 'comments_open', 'my_comments_open' );
*/

// ядро WordPress определяет несколько вспомогательных функций для работы с подобными фильтрами:

/*
__return_true() — возвращает true
__return_false() — возвращает false
__return_zero() — возвращает 0
__return_empty_string() — возвращает пустую строку
__return_empty_array() — возвращает пустой массив
__return_null() — возвращает null
*/


//То есть наш фильтр на comments_open можно переписать в одну строку:
// add_filter( 'comments_open', '__return_false()' );




// Изменить длину автоматических цитат
/*
function my_excerpt_length( $length ) {
    $length = 10;
    return $length;
}
add_filter( 'excerpt_length', 'my_excerpt_length' );
*/


// изменить текст, который который ставится в конце автоматический цитаты,
/*
function my_excerpt_more( $more ) {
    $more = '→';
    return $more;
}
add_filter( 'excerpt_more', 'my_excerpt_more' );
*/


// Добавить баннер к содержимому каждой статьи
/*
function my_banner( $content ) {
    $banner = '<a href="#"><img src="http://gdj.graphicdesignjunction.com/wp-content/uploads/2012/01/poster-advertisement-24.jpg" /></a>';
    $content = $banner . $content;
    return $content;
}
add_filter( 'the_content', 'my_banner' );
*/

/*
add_action('after_setup_theme', 'true_load_theme_textdomain');

function true_load_theme_textdomain(){
    load_theme_textdomain( 'newtheme', get_template_directory() . '/languages' );
}
*/




