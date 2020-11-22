<?php

global $product;

do_action('woocommerce_before_single_product');

if (post_password_required()) {
  echo get_the_password_form();
  return;
}
?>

<section class="product-content">
  <div class="container">
    <div class="row">
      <div class="images col-xs-12 col-sm-7">
        <?php woocommerce_show_product_images() ?>
      </div>
      <div class="col-xs-12 col-sm-4 col-sm-offset-1">
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
        <?php

        $product_tags = get_terms('product_tag');
        // var_dump($product_tags);
        echo wc_get_product_tag_list($product->get_id());
        ?>

        <div class="share">
          <div class="button-wrap">
            <div class="button share-button facebook-share-button">share</div>
          </div>
          <div class="button-wrap">
            <div class="button share-button twitter-share-button">tweet</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <?php woocommerce_output_product_data_tabs(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 product-backlink">
        <a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" title="Back to products"><i></i> Back to products</a>
      </div>
    </div>
  </div>
</section>

<?php woocommerce_output_related_products(); ?>