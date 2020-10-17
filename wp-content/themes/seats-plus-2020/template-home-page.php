<?php
/* Template Name: Home Page Template */
get_header();
?>

<main id="home-page" role="main">
	<section class="main-slider">

		<?php $slider = carbon_get_the_post_meta('crb_slides');
		if (!empty($slider)) : ?>

			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ($slider as $key => $slide) : ?>
						<?php
						$caption = $slide['crb_caption'];
						$link_url = esc_url(get_permalink($slide['crb_association'][0]['id']));
						$link_title = get_the_title($slide['crb_association'][0]['id']);
						$button_text = $slide['button_text'];
						?>
						<div class="swiper-slide" style="background-image: url(<?php echo wp_get_attachment_url($slide['image']) ?>">
							<div class="container">
								<div class="row content">
									<div class="col-xs-5">
										<h5><?php echo $link_title ?></h5>
										<h2><?php echo $caption ?></h2>
										<a href="<?php echo $link_url ?>" class="button primary hollow" title="<?php echo $link_title ?>">
											<?php echo $button_text ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="main-slider-pagination container">
					<div class="swiper-pagination"></div>
				</div>
				<ul class="main-slider-nav container">
					<li><a class="swiper-button-next">Next</a></li>
					<li><a class="swiper-button-prev">Previous</a></li>
				</ul>
			</div>
		<?php endif; ?>

	</section>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<?php the_content() ?>
							<?php edit_post_link() ?>
						</div>
						<div class="features col-xs-offset-1 col-xs-7">
							<?php $features = carbon_get_the_post_meta('crb_features');
							if (!empty($features)) : foreach ($features as  $feature) { ?>
									<div class="feature">
										<?php echo wp_get_attachment_image($feature['icon'], $icon = false) ?>
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
			<header class="row">
				<div class="col-xs-4">
					<h5>Products</h5>
					<h2>Premium Aluminium Outdoor Furniture Specialists</h2>
				</div>
				<div>
					<a href="products" class="button secondary" title="View all Products">View all Products</a>
				</div>
			</header>
		</div>
		<div class="container">
			<div class="product-category-slider">
				<?php $args = array(
					'orderby'    => 'name',
					'order'      => 'asc',
					'hide_empty' => true
				);
				$product_categories = get_terms('product_cat', $args); ?>

				<?php if (!empty($product_categories)) : ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ($product_categories as $key => $category) : ?>
								<div class="swiper-slide">
									<figure></figure>
									<h3>
										<a href="<?php echo get_term_link($category) ?>" title="<?php echo $category->name ?>">
											<?php echo $category->name ?>
										</a>
									</h3>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<ul class="product-category-slider-nav">
				<li><a class="swiper-button-prev">Previous</a></li>
				<li><a class="swiper-button-next">Next</a></li>
			</ul>
		</div>
	</section>

	<section class="our-process">
		<div class="container">
			<header class="row">
				<div class="col-xs-12">
					<h2>Our Process</h2>
				</div>
			</header>
			<div class="row">
				<ol class="our-process">
					<li class="select-your-product"><i></i>Select your Product</li>
					<li class="select-a-colour"><i></i>Select a Colour</li>
					<li class="request-a-quote"><i></i>Request a Quote</li>
					<li class="order-confirmation"><i></i>Order Confirmation</li>
					<li class="product-locally-manufactured"><i></i>Product Locally Manufactured</li>
					<li class="order-dispatched"><i></i>Order Dispatched</li>
				</ol>
			</div>
		</div>
	</section>

	<section class="our-projects">
		<div class="container">
			<header class="row">
				<div class="col-xs-4">
					<h5>Our Work</h5>
					<h2>Our Latest Projects</h2>
				</div>
				<!--<div>
					<label>Filter by</label>
				</div>-->
			</header>
			<ul class="projects row">
				<?php
				$args = array(
					'post_type' => 'project',
					'order'    => 'ASC'
				);
				$projects = get_posts($args);
				if (!empty($projects)) : ?>
					<?php foreach ($projects as $key => $project) {
						$link_url = esc_url(get_permalink($project));
						$categories = get_the_category($project->ID);
					?>
						<li class="project col-xs-6">
							<figure>
								<?php echo get_the_post_thumbnail($project->ID, [600, 600]); ?>
							</figure>
							<h3><?php echo $project->post_title; ?></h3>
							<p>
								<?php foreach ($categories as $key => $categ) : ?>
									<?php echo $categ->cat_name . ($key + 1 < count($categories) ? ', ' : '') ?>
								<?php endforeach; ?>
							</p>
							<a href="<?php echo $link_url ?>" title="<?php echo $project->post_title ?>" class="button secondary">
								View Project
							</a>
						</li>
					<?php } ?>
				<?php endif; ?>
			</ul>
			<div class="row">
				<div class="buttons col-xs-12">
					<a href="" class="button primary" title="Our work">
						View all Projects
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="about-us">
		<?php
		$about = get_page_by_path('about-us');
		$link_url = esc_url(get_permalink($about)); ?>
		<div class="container">
			<div class="row">
				<div class="image col-xs-4 col-xs-offset-1">
					<?php echo get_the_post_thumbnail($about->ID, $icon = false); ?>
				</div>
				<div class="col-xs-5 col-xs-offset-1">
					<h2><?php echo $about->post_title; ?></h2>
					<?php echo apply_filters('the_content', get_the_excerpt($about)) ?></p>
					<a href="<?php echo $link_url; ?>" class="button secondary" title="<?php echo $about->post_title; ?>">Read More</a>
				</div>
			</div>
	</section>

	<section class="our-clients">
		<div class="container">
			<header class="row">
				<div>
					<h2>Our Clients include Schools, Parks, Councils, Sporting Clubs, Architects and more</h2>
				</div>
			</header>
			<div class="row">
				<div class="col-xs-12">
					<?php
					$clients = carbon_get_the_post_meta('crb_clients');
					if (!empty($clients)) { ?>
						<ul class="client-logos">
							<?php foreach ($clients as $key => $client) : ?>
								<li>
									<figure title="<?php echo $client['client'] ?>">
										<?php echo wp_get_attachment_image($client['logo'], $icon = false) ?>
									</figure>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php } ?>
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