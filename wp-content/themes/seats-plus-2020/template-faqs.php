<?php
/* Template Name: FAQs Template */
get_header();
?>

<main id="faqs">
	<header role="banner" <?php echo get_the_post_thumbnail() ? 'style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : '' ?>>
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
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="row">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="col-xs-12 col-md-8">
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>
					</div>
					<div class="row">
						<?php $faqs = carbon_get_the_post_meta('crb_faqs');	?>
						<div class="col-xs-12 clear">
							<ul class="accordion">
								<?php foreach ($faqs as $key => $faq) : ?>
									<li>
										<div class="title">
											<h3><?php echo $faq['title']; ?></h3>
										</div>
										<div class="content">
											<?php echo apply_filters('the_content', $faq['content']); ?>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endwhile; ?>

			<?php else : ?>
				<article>
					<h2><?php _e('Sorry, nothing to display.'); ?></h2>
				</article>
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