<?php get_header(); ?>

<main id="product-index">
  <header role="banner">
    <div class="container">
      <ul class="breadcrumbs">
        <li><a href="/" title="Home">Home</a></li>
        <li><?php woocommerce_page_title(); ?></li>
      </ul>
      <h2><?php woocommerce_page_title(); ?></h2>
    </div>
  </header>
  <section>
    <div class="container">
      <h5><?php woocommerce_page_title(); ?></h5>
      <?php do_action('woocommerce_archive_description'); ?>

      <?php
      $orderby = 'name';
      $order = 'asc';
      $hide_empty = true;
      $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty
      );

      $product_categories = get_terms('product_cat', $cat_args);
      if (!empty($product_categories)) { ?>

        <div class="row product-categories">
          <?php foreach ($product_categories as $key => $category) { ?>
            <div class="category col-xs-4">
              <figure></figure>
              <h3>
                <a href="<?php echo get_term_link($category) ?>" title="<?php echo $category->name ?>">
                  <?php echo $category->name ?>
                </a>
              </h3>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
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