<?php
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();

if ($product->get_image_id()) {
	$html = wc_get_gallery_image_html($post_thumbnail_id, false);
} else {
	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
	$html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
	$html .= '</div>';
}

if ($gallery_image_ids = $product->get_gallery_image_ids()) : ?>
	<div class="product-image-slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach ($gallery_image_ids as $image_id) : ?>
					<div class="swiper-slide">
						<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html($image_id), $image_id); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<ul class="product-image-slider-nav">
		<li><a class="swiper-button-prev">Previous</a></li>
		<li><a class="swiper-button-next">Next</a></li>
	</ul>
<?php else : ?>
	<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); ?>
<?php endif; ?>