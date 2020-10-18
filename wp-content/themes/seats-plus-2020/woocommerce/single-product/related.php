<?php
if ($related_products) : ?>
	<section class="related products">
		<div class="container">
			<?php $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));
			if ($heading) :	?>
				<header class="row">
					<div class="col-xs-12">
						<h5><?php echo esc_html($heading); ?></h5>
						<h2>You may also like</h2>
					</div>
				</header>
			<?php endif; ?>
			<div class="product-slider">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php foreach ($related_products as $related_product) :
							$post_thumbnail_id = $related_product->get_image_id(); ?>
							<div class="swiper-slide">
								<?php $post_object = get_post($related_product->get_id());
								setup_postdata($GLOBALS['post'] = &$post_object); ?>

								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<figure>
										<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', woocommerce_get_product_thumbnail($post_thumbnail_id, true), $post_thumbnail_id); ?>
									</figure>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<ul class="product-slider-nav">
					<li><a class="swiper-button-prev">Previous</a></li>
					<li><a class="swiper-button-next">Next</a></li>
				</ul>
			</div>
		</div>
	</section>
<?php endif;

wp_reset_postdata();
