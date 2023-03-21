<?php

// -- how many without
// select count(ID) from wp_posts where post_type='post' and ID not in (select post_id from wp_postmeta where meta_key = '_thumbnail_id');

// -- how many with
// select count(post_id) from wp_postmeta where meta_key = '_thumbnail_id'

?>

<h1><?php esc_html_e( 'woocommerce cart view.', 'woocommerce-cart-view'); ?></h1>
<p><a href="https://jonathansblog.co.uk">jonathansblog.co.uk</a>

<?php
// TODO - output the table in here
get_carts_information();

