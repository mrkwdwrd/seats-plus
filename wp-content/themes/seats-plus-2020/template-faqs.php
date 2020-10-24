<?php
/* Template Name: FAQs Template */
get_header();
?>

<main id="faqs">
	<header role="banner">
		<div class="container">
			<nav class="breadcrumbs">
				<?php the_breadcrumb(); ?>
			</nav>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>

	<section>
		<div class="container">
			<header class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</header>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="row">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="col-xs-8">
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>
					</div>

					<?php $faqs = carbon_get_the_post_meta('crb_faqs');	?>
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
	<?php endwhile; ?>

<?php else : ?>
	<article>
		<h2><?php _e('Sorry, nothing to display.'); ?></h2>
	</article>
<?php endif; ?>
</div>
</div>
	</section>
</main>

<?php get_footer(); ?>