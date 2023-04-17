<?php
  /*
  Plugin name: Born Creative woocommerce cart view
  Plugin URI: https://github.com/localhost8080/woocommerce-cart-view
  Description: plugin to see cart items in woocommerce baskets
  Author: Born Creative
  Author URI: https://www.born-creative.co.uk/
  Version: 0.1
  License: GPL v3 or later
  License URI: https://www.gnu.org/licenses/gpl-3.0.html

  woocommerce cart view is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  any later version.
 
  woocommerce cart view is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with woocommerce cart view. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
  */
  
// helper functions
if (file_exists(WP_PLUGIN_DIR . '/borncreative_wc-cart-view/includes/helper.php')) {
	require_once WP_PLUGIN_DIR . '/borncreative_wc-cart-view/includes/helper.php';
}

// include admin page if present
if (file_exists(WP_PLUGIN_DIR . '/borncreative_wc-cart-view/includes/borncreative_wc-cart-view-admin.php')) {
	require_once WP_PLUGIN_DIR . '/borncreative_wc-cart-view/includes/borncreative_wc-cart-view-admin.php';
}


