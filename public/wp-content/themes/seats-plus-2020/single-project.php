<?php get_header(); ?>
<main id="project-single">
	<header role="banner">
		<div class="container">
			<nav class="breadcrumbs">
				<?php the_breadcrumb(); ?>
			</nav>
			<h2><?php the_title(); ?></h2>
		</div>
	</header>

	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="project-content">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
						<?php edit_post_link(); ?>
					</div>
					<div class="col-xs-6">
						<h3>Requirement</h3>
						<?php echo carbon_get_the_post_meta('crb_requirement_content'); ?>

						<h3>Solution</h3>
						<?php echo carbon_get_the_post_meta('crb_solution_content'); ?>

						<h3>Result</h3>
						<?php echo carbon_get_the_post_meta('crb_result_content'); ?>
					</div>
				</div>
			</div>
			<section class="project-slides">

			</section>
			<section class="project-info">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<h4>Client Name</h4>
							<p><?php echo carbon_get_the_post_meta('crb_client'); ?></p>
						</div>
						<div class="col-xs-4">
							<h4>Project Name</h4>
							<p><?php the_title(); ?></p>
						</div>
						<div class="col-xs-4">
							<h4>Project Location</h4>
							<p><?php echo carbon_get_the_post_meta('crb_location'); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 product-backlink">
							<a href="/our-work" title="Back to projects"><i></i> Back to projects</a>
						</div>
					</div>
				</div>
			</section>
		</article>
		<section class="related">

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