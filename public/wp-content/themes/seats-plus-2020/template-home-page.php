<?php
/* Template Name: Home Page Template */
get_header();
?>

<main id="home-page" role="main">
	<section class="slider">
		<?php
		$slider = carbon_get_the_post_meta('crb_slides');
		if (!empty($slider)) { ?>

			<div class="main-slider">
				<?php foreach ($slider as $key => $slide) {
					$caption = $slide['crb_caption'];
					$link_url = esc_url(get_permalink($slide['crb_association'][0]['id']));
					$link_title = get_the_title($slide['crb_association'][0]['id']); ?>
					<div class="slide" style="background-image: url(<?php echo wp_get_attachment_url($slide['image']) ?>">
						<div class="container">
							<div class="row">
								<div>
									<h5><?php echo $link_title ?></h5>
									<h2><?php echo $caption ?></h2>
								</div>
							</div>
						</div>
					</div>
				<?php	} ?>
			<?php	} ?>
	</section>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<h4>Why SeatsPlus</h4>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</div>
						<div class="features col-xs-offset-1 col-xs-7">
							<?php $features = carbon_get_the_post_meta('crb_features');
							if (!empty($features)) : foreach ($features as  $feature) { ?>
									<div class="feature">
										<h3><?php echo $feature['title'] ?></h3>
										<p><?php echo $feature['content'] ?></p>
									</div>
							<?php }
							endif; ?>
						</div>
					</div>
				</div>
			</article>
	<?php endwhile;
	endif; ?>

	<section class="product-categories">
		<div class="container">
			<div class="row">
				<div>
					<h5>Products</h5>
					<h2>Premium Aluminium Outdoor Furniture Specialists</h2>
				</div>
				<div>
					<a href="products" title="View All Products">View All Products</a>
				</div>
			</div>
		</div>
		<?php
		$orderby = 'name';
		$order = 'asc';
		$hide_empty = true;
		$cat_args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => $hide_empty
		);

		$product_categories = get_terms('product_cat', $cat_args);
		if (!empty($product_categories)) { ?>

			<div class="product-category-slider">
				<?php foreach ($product_categories as $key => $category) { ?>
					<div class="caterory-slide" />
					<figure></figure>
					<h4>
						<a href="<?php echo get_term_link($category); ?>" title="<?php echo $category->name; ?>">
							<?php echo $category->name; ?>
						</a>
					</h4>
			</div>
		<?php } ?>
		</div>
	<?php } ?>
	</section>

	<section class="our-process">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Our Process</h2>
					<ol class="our-process">
						<li>Choose your Product</li>
						<li>Select a Colour</li>
						<li>Request a Quote</li>
						<li>Order Confirmation</li>
						<li>Product Locally Manufactured</li>
						<li>Order Dispatched</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="our-projects">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h4>Our Work</h4>
					<h2>Our Latest Projects</h2>
				</div>
				<?php
				$args = array(
					'post_type' => 'project',
					'order'    => 'ASC'
				);
				$projects = get_posts($args);
				if (!empty($projects)) { ?>
					<ul class="our-projects">
						<?php foreach ($projects as $key => $project) {
							$link_url = esc_url(get_permalink($project)); ?>
							<li>
								<figure></figure>
								<?php echo $project->post_title; ?>
								<a href="<?php echo $link_url; ?>" title="<?php echo $project->post_title; ?>">
									View Project
								</a>
							</li>
					</ul>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
	</section>

	<section class="about-us">
		<div class="container">
			<div class="row">
				<?php
				$about = get_page_by_path('about-us');
				$link_url = esc_url(get_permalink($about)); ?>

				<h2><?php echo $about->post_title; ?></h2>
				<?php echo get_the_excerpt($about); ?>
				<a href="<?php echo $link_url; ?>" title="<?php echo $about->post_title; ?>">Read More</a>
			</div>
		</div>
	</section>

	<section class="our-clients">
		<div class="container">
			<div class="row">
			</div>
		</div>
	</section>

</main>
<?php get_footer(); ?>