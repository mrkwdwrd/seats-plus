<div class="woocommerce-order">
	<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
		<?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your quote request has been received.', 'woocommerce'), null); ?>
	</p>
</div>

<div class="row">
	<div class="col-xs-12 product-backlink">
		<a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" title="Back to products"><i></i> Back to products</a>
	</div>
</div>