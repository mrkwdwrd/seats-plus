<?php
/* Template Name: Colour Chart Template */
get_header();
?>

<main id="colour-chart">
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

					<?php $colours = carbon_get_the_post_meta('crb_colours'); ?>

					<div class="row">
						<div class="col-xs-12">
							<h3>Brights</h3>
						</div>
					</div>
					<div class="row">
						<?php foreach ($colours as $key => $colour) {
							$name = $colour['name'];
							$hexvalue = $colour['colour'];
							$category = $colour['category'];
						?>
							<div class="col-xs-2 colour-swatch">
								<figure id="<?php echo $name; ?>" style="background-color: <?php echo $hexvalue; ?>">&nbsp;</figure>
								<figcaption for="<?php echo $name; ?>">
									<?php echo $name; ?>
								</figcaption>
							</div>
						<?php }; ?>
					</div>
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