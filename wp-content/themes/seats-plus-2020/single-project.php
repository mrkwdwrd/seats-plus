<?php get_header(); ?>
<main id="project-single">
	<header role="banner" <?php echo get_the_post_thumbnail() ? 'style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : '' ?>>
		<div class="container">
			<nav class="breadcrumbs">
				<?php the_breadcrumb(); ?>
			</nav>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>

	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						<h5>Our Work</h5>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php edit_post_link(); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-sm-offset-1">
						<div class="feature requirement">
							<i class="requirement"></i>
							<h3>Requirement</h3>
							<?php echo apply_filters('the_content', carbon_get_the_post_meta('crb_requirement_content')); ?>
						</div>
						<div class="feature solution">
							<i class="solution"></i>
							<h3>Solution</h3>
							<?php echo apply_filters('the_content', carbon_get_the_post_meta('crb_solution_content')); ?>
						</div>
						<div class="feature result">
							<i class="result"></i>
							<h3>Result</h3>
							<?php echo apply_filters('the_content', carbon_get_the_post_meta('crb_result_content')); ?>
						</div>
					</div>
				</div>
			</div>
		</article>
		<section class="project-image-slider">
			<div class="container">
				<?php $slider = carbon_get_the_post_meta('crb_slides'); ?>
				<?php if (!empty($slider)) : ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ($slider as $key => $slide) : ?>
								<div class="swiper-slide">
									<figure>
										<?php echo wp_get_attachment_image($slide['image'], 'main-image') ?>
									</figure>
								</div>
								<?php endforeach; ?>;
						</div>
						<ul class="project-image-slider-nav">
							<li><a class="swiper-button-prev">Previous</a></li>
							<li><a class="swiper-button-next">Next</a></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<section class="project-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="info">
							<h5>Client Name</h5>
							<h3><?php echo carbon_get_the_post_meta('crb_client'); ?></h3>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="info">
							<h5>Project Name</h5>
							<h3><?php the_title(); ?></h3>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="info">
							<h5>Project Location</h5>
							<h3><?php echo carbon_get_the_post_meta('crb_location'); ?></h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 product-backlink">
						<a href="/our-work" title="Back to projects"><i></i> Back to projects</a>
					</div>
				</div>
			</div>
		</section>
		<section class="related projects">
			<div class="container">
				<header class="row">
					<div class="col-xs-12">
						<h5>Releated Projects</h5>
						<h2>You may also like</h2>
					</div>
				</header>

				<div class="project-slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php
							$args = array(
								'post_type' => 'project',
								'order'    => 'ASC',
								'numberposts' => 6
							);
							$related_projects = get_posts($args);
							foreach ($related_projects as $project) :
								$post_thumbnail_id = get_post_thumbnail_id($project->ID); ?>
								<div class="swiper-slide">
									<?php $post_object = get_post($project->ID);
									setup_postdata($GLOBALS['post'] = &$post_object); ?>

									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
										<figure>
											<?php echo get_the_post_thumbnail($project->ID, 'list-image'); ?>
										</figure>
										<h3><?php the_title(); ?></h3>
									</a>
								</div>
							<?php endforeach;
							wp_reset_postdata(); ?>
						</div>
					</div>
					<ul class="project-slider-nav">
						<li><a class="swiper-button-prev">Previous</a></li>
						<li><a class="swiper-button-next">Next</a></li>
					</ul>
				</div>
		</section>
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