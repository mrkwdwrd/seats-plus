<?php get_header(); ?>
<main id="product-index">
	<header role="banner">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="/" title="Home">Home</a></li>
				<li><?php woocommerce_page_title(); ?></li>
			</ul>
			<h2><?php woocommerce_page_title(); ?></h2>
		</div>
	</header>
	<section>
		<div class="container">
			<!--
			<h5><?php woocommerce_page_title(); ?></h5>
			<?php do_action('woocommerce_archive_description'); ?>
			-->
			<?php woocommerce_content(); ?>
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