<?php
/*
Plugin Name: KPS Cron Email
Plugin URI: http://kultprosvet.net
Description: Create a simple cron job. More options: http://codex.wordpress.org/Function_Reference/wp_schedule_event
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/

add_action('init', 'kpscron_init_cronjob');
add_action('kpscron_sendmail_hook', 'kpscron_sendemail');


/**
 * initiating the cron job
 */
function kpscron_init_cronjob() {
    if(!wp_next_scheduled('kpscron_sendmail_hook')) {
        wp_schedule_event(time(), 'hourly', 'kpscron_sendmail_hook');
    }
}



/**
 * send email
 */
function kpscron_sendemail() {
    $kps_admin_email = get_bloginfo('admin_email');
    wp_mail($kps_admin_email, 'Cron task', 'Time for your medication !');
}
