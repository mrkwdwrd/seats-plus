<?php
/* Template Name: Text col. w/ Image col. */
get_header();
?>

<main id="text-col-with-image-col">
	<header role="banner">
		<div class="container">
			<nav class="breadcrumbs">
				<?php the_breadcrumb(); ?>
			</nav>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>
	<section class="content">
		<div class="container">
			<header class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="row">
				<div class="text col-xs-6">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(); ?>
								<?php edit_post_link(); ?>
							</article>
						<?php endwhile; ?>

					<?php else : ?>
						<article>
							<h2><?php _e('Sorry, nothing to display.'); ?></h2>
						</article>
					<?php endif; ?>
				</div>
				<div class="image col-xs-5 col-xs-offset-1">
					<figure>
						<?php echo get_the_post_thumbnail(); ?>
					</figure>
				</div>
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