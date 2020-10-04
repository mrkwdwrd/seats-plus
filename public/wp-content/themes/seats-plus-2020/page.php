<?php get_header(); ?>

<main>
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
			<div class="row">
				<h1><?php the_title(); ?></h1>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>

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