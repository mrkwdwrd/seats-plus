<?php

defined('ABSPATH') || exit;

do_action('woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email);

/* translators: %1$s: Order ID. %2$s: Order date */
echo wp_kses_post(wc_strtoupper(sprintf(esc_html__('[Quote Request #%1$s] (%2$s)', 'woocommerce'), $order->get_order_number(), wc_format_datetime($order->get_date_created())))) . "\n";
echo "\n" . wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$order,
	array(
		'show_sku'      => $sent_to_admin,
		'show_image'    => false,
		'image_size'    => array(32, 32),
		'plain_text'    => true,
		'sent_to_admin' => $sent_to_admin,
	)
);

echo "==========\n\n";

if ($order->get_customer_note()) {
	echo esc_html__('Note:', 'woocommerce') . "\t " . wp_kses_post(wptexturize($order->get_customer_note())) . "\n";
}

if ($sent_to_admin) {
	/* translators: %s: Order link. */
	echo "\n" . sprintf(esc_html__('View quote request: %s', 'woocommerce'), esc_url($order->get_edit_order_url())) . "\n";
}

do_action('woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email);
