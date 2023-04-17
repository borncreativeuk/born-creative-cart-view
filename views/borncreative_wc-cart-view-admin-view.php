<?php

// -- how many without
// select count(ID) from wp_posts where post_type='post' and ID not in (select post_id from wp_postmeta where meta_key = '_thumbnail_id');

// -- how many with
// select count(post_id) from wp_postmeta where meta_key = '_thumbnail_id'

?>

<h1><?php esc_html_e( 'View Carts.', 'borncreative_wc-cart-view'); ?></h1>
<p><a href="https://www.born-creative.co.uk">born-creative.co.uk</a>

<?php
// TODO - output the table in here
borncreative_wc_get_carts_information();

