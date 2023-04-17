<?php
// helper functions



// Function to create the new menu and sub-menu
function borncreative_wc_create_menu() {
    // Create a new top-level menu item
    add_menu_page(
        'Born Creative',
        'Born Creative',
        'publish_pages',
        'born-creative',
        'borncreative_wc_cart_admin_view',
        'dashicons-admin-generic',
        2
    );
    
    // Create a sub-menu under the top-level menu
    add_submenu_page(
        'born-creative',
        'View Carts',
        'View Carts',
        'publish_pages',
        'view-carts',
        'borncreative_wc_cart_admin_view'
    );
}
add_action('admin_menu', 'borncreative_wc_create_menu', 99);



function borncreative_wc_cart_admin_view()
{
    // include admin view
    if (file_exists(WP_PLUGIN_DIR . '/borncreative_wc-cart-view/views/borncreative_wc-cart-view-admin-view.php')) {
        require_once WP_PLUGIN_DIR . '/borncreative_wc-cart-view/views/borncreative_wc-cart-view-admin-view.php';
    }
}

function borncreative_wc_get_carts_information()
{
    global $wpdb;
    // carts are in woocommerce_sessions table
    // first we need to get that whole table.

    echo '<h2>Carts</h2>';
    $table_name = $wpdb->prefix . 'woocommerce_sessions';
    $result = $wpdb->get_results("SELECT * FROM $table_name");

    echo "<table>";
    echo "<tr><td>Product ID</td><td>Product Name</td><td>Quantity</td><td>Total</td></tr>";
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
                $product = wc_get_product($cart['product_id']);
                echo "<tr>";
                echo "<td>" . $cart['product_id'] . "</td>";
                echo "<td>". $product->get_name() . "</td>";
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
