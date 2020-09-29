<?php get_header(); ?>
<main id="product-index">
  <header role="banner">
    <div class="container">
      <?php woocommerce_breadcrumb(); ?>
      <h2><?php woocommerce_page_title(); ?></h2>
    </div>
  </header>
  <section>
    <div class="container">
      <h5><?php woocommerce_page_title(); ?></h5>
      <?php do_action('woocommerce_archive_description'); ?>

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