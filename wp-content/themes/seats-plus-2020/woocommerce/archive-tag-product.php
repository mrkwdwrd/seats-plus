<?php get_header(); ?>
<main id="product-category">
  <header role="banner">
    <div class="container">
      <?php woocommerce_breadcrumb(); ?>
      <h2><?php woocommerce_page_title(); ?></h2>
    </div>
  </header>
  <section class="content">
    <div class="container">
      <header class="row">
        <div class="col-xs-12 col-md-8 col-lg-6">
          <h5>Products</h5>
          <h1><?php woocommerce_page_title(); ?></h1>
          <?php do_action('woocommerce_archive_description'); ?>
        </div>
      </header>
      <?php
      if (woocommerce_product_loop()) {
        woocommerce_product_loop_start();
        if (wc_get_loop_prop('total')) {
          while (have_posts()) {
            the_post();
            do_action('woocommerce_shop_loop');
            wc_get_template_part('content', 'product');
          }
        }
        woocommerce_product_loop_end();
      } else {
        do_action('woocommerce_no_products_found');
      } ?>

    </div>
  </section>
  <section class="get-a-quote">
    <div class="container">
      <div class="row">
        <div class="content">
          <h5>Get a Quote</h5>
          <h2>Reliable quality outdoor seating and aluminium furniture</h2>
          <a href="" class="button primary" title="Get a quote">Get a quote</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>