<?php

global $product;

do_action('woocommerce_before_single_product');

if (post_password_required()) {
  echo get_the_password_form();
  return;
}
?>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <?php woocommerce_show_product_images() ?>
      </div>
      <div class="summary entry-summary col-xs-6">
        <?php woocommerce_template_single_title(); ?>
        <?php woocommerce_template_single_meta(); ?>
        <?php woocommerce_template_single_excerpt(); ?>
        <?php woocommerce_template_single_add_to_cart(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <?php woocommerce_output_product_data_tabs(); ?>
        <?php woocommerce_output_related_products(); ?>
      </div>
    </div>
  </div>
</section>