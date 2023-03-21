<?php

add_action('admin_menu', 'woocommerce_cart_view_admin_stuff');
function woocommerce_cart_view_admin_stuff(){
	add_menu_page("View Carts", "View Carts", "publish_pages", "View Carts", "woocommerce_cart_admin_view");
}

function woocommerce_cart_admin_view(){
	// include admin view
	if (file_exists(WP_PLUGIN_DIR . '/woocommerce-cart-view/views/woocommerce-cart-view-admin-view.php')) {
		require_once WP_PLUGIN_DIR . '/woocommerce-cart-view/views/woocommerce-cart-view-admin-view.php';
	}
}

