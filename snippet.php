<?PHP

function no_free_shipping_on_sale( $is_available ) {
	global $woocommerce;

  // retreive all items in cart
	$cart_items = $woocommerce->cart->get_cart();

	// loop through the items looking for all products
	foreach ( $cart_items as $key => $item ) {
    $product = get_product( $item['product_id'] );

    // if product is on sale, disable free shippinh
    if ( $product->is_on_sale() ) { return false; }
	}
  
	// nothing found return the default value
	return $is_available;
}
add_filter( 'woocommerce_shipping_free_shipping_is_available', 'no_free_shipping_on_sale', 20 );  
