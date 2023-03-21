<?php

// helper functions

function count_all_posts_without_featured_image_set()
{
    $args = array(
        'post_type'  => 'post',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'NOT EXISTS'
            ),
        )
    );
    $query = new WP_Query($args);
    return $query->found_posts;
}

function count_all_posts_with_featured_image_set()
{
    $args = array(
        'post_type'  => 'post',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            ),
        )
    );
    $query = new WP_Query($args);
    return $query->found_posts;
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
            echo '<pre>' . print_r($datas->cart) . '</pre>';
        }
    }
}
