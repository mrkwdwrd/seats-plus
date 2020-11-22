<?php
get_header();
?>

<main class="error">
	<header role="banner" <?php echo get_the_post_thumbnail() ? 'style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : '' ?>>
		<div class="container">
			<nav class="breadcrumbs">
				<?php the_breadcrumb(); ?>
			</nav>
			<h2>Error 404</h2>
		</div>
	</header>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<h1>404: Page not found</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<article>
						<p>The page you're looking for doesn't exist!</p>
						<a href="/" class="button">Return to the homepage</a>
					</article>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>