jQuery(document).ready(function ($) {

	$('#kps_add_wishlist_div').on('click', "a", function (e) {
		$.post(document.location.protocol + '//' + document.location.host+'/wp-admin/admin-ajax.php',
			addToWishlist,
			function (response) {
				$('#kps_add_wishlist_div').html('Added to your wishlist');
				$('#kps_remove_wishlist_div').show();
				$('#kps_remove_wishlist_div').html('<div id="kps_remove_wishlist_div"><a id="kps_remove_wishlist" href="">remove it</a></div>');
			}
			);
		e.preventDefault();
	});
	$('#kps_remove_wishlist_div').on('click', "a", function (e) {
		$.post(document.location.protocol + '//' + document.location.host+'/wp-admin/admin-ajax.php',
			removeFromWishlist,
			function (response) {
				$('#kps_add_wishlist_div').html('<a id="kps_add_wishlist" href="">Add to my wishlist</a>');
				$('#kps_remove_wishlist_div').html('succesfully removed');
				$('#kps_remove_wishlist_div').delay(800).fadeOut('slow');
			}
			);
		e.preventDefault();
	});
});