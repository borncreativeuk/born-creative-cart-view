<?php
// helper functions

add_action('admin_menu', 'woocommerce_cart_view_admin_stuff', 99);

function woocommerce_cart_view_admin_stuff()
{
    add_menu_page("View Carts", "View Carts", "publish_pages", "View Carts", "woocommerce_cart_admin_view");
}

function woocommerce_cart_admin_view()
{
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

    echo '<h2>Carts</h2>';
    $table_name = $wpdb->prefix . 'woocommerce_sessions';
    $result = $wpdb->get_results("SELECT * FROM $table_name");

    echo "<table>";
    foreach ($result as $session) {
        // do we have actual cart datas?
        $datas = unserialize($session->session_value);
        if (!empty($datas)) {
            $array = unserialize($datas['cart']);

            if (!empty($array)) {
                //     // we have a cart
 
                $temp = array_keys($array);
                $key = $temp[0];
                $cart = $array[$key];

                echo "<tr>";
                echo "<td>" . $cart['product_id'] . "</td>";
                echo "<td>" . $cart['quantity'] . "</td>";
                echo "<td>" . $cart['line_total'] . "</td>";
                echo "</tr>";

              

                // echo "<tr><td>" . $product->get_name() . "</td><td>" . $cart[$key_name[0]]['quantity'] . "</td></tr>";

                // $product = wc_get_product( $cart[$key_name[0]]);

            }
        }
    }
    echo "</table>";
}
