	<?php do_action('woocommerce_before_checkout_form', $checkout); ?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

		<?php if ($checkout->get_checkout_fields()) : ?>

			<?php do_action('woocommerce_checkout_before_customer_details'); ?>

			<div class="row" id="customer_details">
				<div class="col-xs-12 col-sm-6">
					<?php do_action('woocommerce_checkout_billing'); ?>
				</div>

				<div class="col-xs-12 col-sm-6">
					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

					<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

					<?php do_action('woocommerce_checkout_before_order_review'); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action('woocommerce_checkout_order_review'); ?>
					</div>
					<?php do_action('woocommerce_checkout_after_order_review'); ?>

				</div>
			</div>

			<?php do_action('woocommerce_checkout_after_customer_details'); ?>

		<?php endif; ?>

	</form>

	<?php do_action('woocommerce_after_checkout_form', $checkout); ?>