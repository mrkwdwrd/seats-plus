<?php get_header(); ?>
<main id="product-single">
	<div class="notice-wrapper">
		<?php wc_print_notices(); ?>
	</div>
	<header role="banner" <?php echo get_the_post_thumbnail() ? 'style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : '' ?>>
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>

	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<?php wc_get_template_part('content', 'single-product'); ?>
	<?php endwhile; ?>

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