<?php
/*
Plugin Name: KPS Custom plugin
Plugin URI: http://kultprosvet.net
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/


// HOOKS

/*
// Сообщаем что по события вывода заголовка `the_title` нужно запустить функцию `kpstitle_title`
add_filter( 'the_title', 'kpstitle_title');

function kpstitle_title($text) { // в параметр $text передается текущее значение title
    return '~|O_O|~ '.$text;
}
*/



/*
// Добавим фильтр для отрисовки контента
add_filter( 'the_content', 'kpstitle_content');

function kpstitle_content($text) {
    return strtoupper($text);
}
*/


/*
add_filter( 'list_cats', 'kpstitle_categories');

function kpstitle_categories($text) {
    return strtolower($text);
}
*/

// События
/*
function one() { echo 1; }
function two() { echo 2; }
function three() { echo 3; }

// Добавляем функции к событию foo с помощью функции add_action():
add_action( 'foo', 'one' );
add_action( 'foo', 'two' );
add_action( 'foo', 'three' );


function four() { echo 4; }
remove_action( 'foo', 'three' );
add_action( 'foo', 'four' );



// выполняем наше событие
do_action( 'foo' );
*/


// Фильтры

/*
function plus_one( $value ) {
    $value = $value + 1;
    return $value;
}

add_filter( 'foo', 'plus_one' );
remove_filter( 'foo', 'plus_one' );

echo apply_filters( 'foo', 5 );
*/



/*
function change_my_social_profiles($profiles) {
    unset($profiles['twitter']);
    $profiles['google-plus'] = 'https://plus.google.com/+wpmagru';
    return $profiles;
}

add_filter( 'my_social_profiles', 'change_my_social_profiles' );
*/



// Приоритеты
/*
function one() { echo 1; }
function two() { echo 2; }
function three() { echo 3; }

add_action( 'foo', 'one', 11 );
add_action( 'foo', 'two' );
add_action( 'foo', 'three', 9 );

do_action( 'foo' ); // выведет 321

*/




// Дополнительные параметры
/*
do_action( 'foo', $arg1, $arg2, $arg3 );
$value = apply_filters( 'foo', $value, $arg1, $arg2, $arg3 );


function my_func( $arg1, $arg2, $arg3 ) { ... }
add_action( 'foo', 'my_func', 10, 3 );


function my_func( $value, $arg1 ) { ... }
add_filter( 'foo', 'my_func', 10, 2 );
*/


// запретить сброс пароля для пользователей
// add_filter( 'allow_password_reset', '__return_false' );

/*
function my_filter( $allow, $user_id ) {
    if ( is_super_admin( $user_id ) )
        $allow = false;

    return $allow;
}

add_filter( 'allow_password_reset', 'my_filter', 10, 2 );
*/




// ООП, классы, объекты и анонимные функции

// передать не функцию для вызова, а метод объекта, его необходимо передать в специальном формате массивом
class My_Class {
    function __construct() {
        add_filter( 'the_content', array( $this, 'filter_content' ) );
    }

    function filter_content( $content ) {
        // ...
        return $content;
    }
}
new My_Class();


add_filter( 'the_content', array( 'My_Class', 'filter_content' ) );
add_filter( 'the_content', 'My_Class::filter_content' );
