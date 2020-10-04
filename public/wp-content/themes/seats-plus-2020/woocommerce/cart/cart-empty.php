<?php
/*
 * @hooked wc_empty_cart_message - 10
 */
do_action('woocommerce_cart_is_empty');
?>

<div class="row">
	<div class="col-xs-12 product-backlink">
		<a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" title="Back to products"><i></i> Back to products</a>
	</div>
</div>