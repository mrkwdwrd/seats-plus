<?php get_header(); ?>
<main id="product-index">
	<header role="banner">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>
	<section>
		<div class="container">

			<?php while (have_posts()) : ?>
				<?php the_post(); ?>
				<?php wc_get_template_part('content', 'single-product'); ?>
			<?php endwhile; ?>

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