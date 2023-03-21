<?php
// helper functions

add_action('admin_menu', 'woocommerce_cart_view_admin_stuff', 99);

function woocommerce_cart_view_admin_stuff(){
	add_menu_page("View Carts", "View Carts", "publish_pages", "View Carts", "woocommerce_cart_admin_view");
}

function woocommerce_cart_admin_view(){
	// include admin view
	if (file_exists(WP_PLUGIN_DIR . '/woocommerce-cart-view/views/woocommerce-cart-view-admin-view.php')) {
		require_once WP_PLUGIN_DIR . '/woocommerce-cart-view/views/woocommerce-cart-view-admin-view.php';
	}
}





function get_carts_information()
{
    global $wpdb;
    // carts are in woocommerce_sessions table
    // first we need to get that whole table.

    $table_name = $wpdb->prefix . 'woocommerce_sessions';
    $result = $wpdb->get_results("SELECT * FROM $table_name");

    foreach ($result as $session) {

        // do we have actual cart datas?
        $datas = unserialize($session->session_value);
        if (!empty($datas->cart)) {
            // we have a cart
            // show it
            echo '<pre>' . print_r($datas->cart, true) . '</pre>';
        }
    }
}
