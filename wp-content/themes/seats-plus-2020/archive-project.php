<?php

/**
 * Template Post Type: project
 */

get_header(); ?>
<main id="project-index" class="woocommerce woocommerce-page">
  <header role="banner">
    <div class="container">
      <nav class="breadcrumbs">
        <?php the_breadcrumb(); ?>
      </nav>
      <h2><?php the_archive_title(); ?></h2>
    </div>
  </header>
  <section class="content">
    <div class="container">
      <header class="row">
        <?php $page = get_page_by_path('our-work'); ?>
        <div class="col-xs-12 col-md-8 col-lg-6">
          <h5>Projects</h5>
          <?php echo apply_filters('the_content', $page->post_content); ?>
        </div>
      </header>
      <?php if (have_posts()) : ?>
        <ul class="projects columns-3">
          <?php while (have_posts()) : the_post(); ?>
            <li class="project">
              <a href="<?php echo esc_url(the_permalink()); ?>">
                <?php echo the_post_thumbnail('list-image'); ?>
                <h3 class="project-title"><?php echo the_title(); ?></h3>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
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