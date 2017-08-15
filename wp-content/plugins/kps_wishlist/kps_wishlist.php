<?php
/*
Plugin Name: KPS Wishlist plugin
Plugin URI: http://kultprosvet.net
Description: Add a wish list widget where registered users can save the posts of the products they want to buy.
Version: 1.0
Author: Klim
Author URI: http://kultprosvet.net
License: GPL2
*/


/**
 * add fields to the admin page
 */
add_action('admin_init', 'kps_admin_init');

function kps_admin_init() {
    register_setting('kps-group', 'kps_dashboard_title');
    register_setting('kps-group', 'kps_number_of_items');
}




//add admin settings
add_action('admin_menu', 'kps_plugin_menu' );

function kps_plugin_menu() {
    // add_options_page( title, menu_anchor, 'permission_name', slug, callback_function );
    add_options_page('KPS Wishlist Options', 'KPS Wishlist', 'manage_options', 'kps', 'kps_plugin_options');
}



function kps_plugin_options () {
    //Закрытие PHP для вывода HTML странная особенность Wordpress
    ?>
    <div class="wrap">
        <h2>KPS Wishlist</h2>
        <form action="options.php" method="post">
            <?php settings_fields('kps-group'); ?>
            <?php do_settings_fields('kps-group'); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="kps_dashboard_title">Dashboard widget title</label>
                    </th>
                    <td>
                        <input type="text" name="kps_dashboard_title" id="kps_dashboard_title" value="<?php echo get_option('kps_dashboard_title'); ?>">
                        <br/><small>help text for this field</small>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="kps_number_of_items">Number of items to show</label>
                    </th>
                    <td>
                        <input type="text" name="kps_number_of_items" id="kps_number_of_items" value="<?php echo get_option('kps_number_of_items'); ?>">
                        <br/><small>help text for this field</small>
                    </td>
                </tr>
            </table>

            <?php @submit_button(); ?>

        </form>
    </div>
    <?php
}
