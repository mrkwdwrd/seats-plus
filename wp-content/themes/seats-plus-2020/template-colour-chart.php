<?php
/* Template Name: Colour Chart Template */
get_header();
?>

<main id="colour-chart">
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
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="col-xs-8">
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>
					</div>

					<?php $colours = carbon_get_the_post_meta('crb_colours');
					$brights = array_filter($colours, function ($val) {
						return $val['category'] === 'brights';
					});	?>

					<div class="row">
						<div class="col-xs-12">
							<h3>Brights</h3>
						</div>
					</div>

					<div class="category row">
						<?php foreach ($brights as $key => $colour) :
							$name = $colour['name'];
							$hexvalue = $colour['colour'];
							$id = strtolower(str_replace(' ', '-', $name)) ?>
							<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
								<div class="colour-swatch">
									<figure id="<?php echo $id; ?>" style="background-color: <?php echo $hexvalue; ?>"></figure>
									<figcaption for="<?php echo $id; ?>">
										<?php echo $name; ?>
									</figcaption>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<?php $colorbond = array_filter($colours, function ($val) {
						return $val['category'] === 'colorbond';
					}); ?>

					<div class="row">
						<div class="col-xs-12">
							<h3>Colourbond</h3>
						</div>
					</div>
					<div class="category row">
						<?php foreach ($colorbond as $key => $colour) :
							$name = $colour['name'];
							$hexvalue = $colour['colour'];
							$id = strtolower(str_replace(' ', '-', $name)) ?>
							<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
								<div class="colour-swatch">
									<figure id="<?php echo $id; ?>" style="background-color: <?php echo $hexvalue; ?>">
									</figure>
									<figcaption for="<?php echo $id; ?>">
										<?php echo $name; ?>
									</figcaption>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endwhile; ?>
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