jQuery(document).ready(function ($) {

    $('#kps_add_wishlist').click(function (e) {

        $.post(document.location.protocol + '//' + document.location.host+'/wp-admin/admin-ajax.php',
            MyAjax,
            function (response) {
                $('#kps_add_wishlist_div').html('You want this');
            }
        );
        e.preventDefault();
    });
});
