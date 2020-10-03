<?php

global $product;

do_action('woocommerce_before_single_product');

if (post_password_required()) {
  echo get_the_password_form();
  return;
}
?>

<div class="row">
  <div class="images col-xs-7">
    <?php woocommerce_show_product_images() ?>
  </div>
  <div class="col-xs-5">
    <div class="details">
      <?php woocommerce_template_single_title(); ?>
      <div class="category">
        <?php woocommerce_template_single_meta(); ?>
      </div>
      <div class="excerpt">
        <?php woocommerce_template_single_excerpt(); ?>
      </div>
    </div>
    <div class="options">
      <?php woocommerce_template_single_add_to_cart(); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-8 col-xs-offset-2">
    <?php woocommerce_output_product_data_tabs(); ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 backlink">
    <a href="/products" title="Back to products"><i></i> Back to products</a>
  </div>
</div>

<?php woocommerce_output_related_products(); ?>