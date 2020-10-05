<?php

/**
 * Template Post Type: project
 */

get_header(); ?>
<main id="project-index">
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
        <?php
        $args = array(
          'name'        => 'our-work',
          'post_type'   => 'page',
          'post_status' => 'publish',
          'numberposts' => 1
        );
        $post = get_posts($args);
        ?>
        <h5>Projects</h5>

      </header>
      <div class="row">
        <?php
        if (have_posts()) :
        ?>
          <?php
          while (have_posts()) : the_post(); ?>
            <div class="col-xs-4">

              <?php
              the_title();

              the_post_thumbnail(array(600, 600));

              the_permalink();

              the_content(); ?>

            </div>
        <?php endwhile;
        endif;
        ?>
      </div>
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