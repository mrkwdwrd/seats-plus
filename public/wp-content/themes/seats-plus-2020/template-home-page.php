<?php
/* Template Name: Home Page Template */
get_header();
?>

<main role="main">
	<section>
		<h1><?php the_title(); ?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php
					$slider = carbon_get_the_post_meta('crb_slides');

					if (!empty($slider)) {
						echo '<ul>';
						foreach ($slider as $key => $slide) {
							$caption = $slide['crb_caption'];
							$link_url = esc_url(get_permalink($slide['crb_association'][0]['id']));
							$link_title = get_the_title($slide['crb_association'][0]['id']);

							echo '<li>';
							echo wp_get_attachment_image($slide['image'], [1200, 300]);
							echo '<div class="content">';
							echo '<p>' . $caption . '</p>';
							echo '<a href="' . $link_url . '"';
							echo 'title="' . $link_title . '">';
							echo $link_title;
							echo '</a>';
							echo '</div>';
							echo '</li>';
						}
						echo '</ul>';
					} ?>

					<?php the_content(); ?>

					<?php
					$orderby = 'name';
					$order = 'asc';
					$hide_empty = true;
					$cat_args = array(
						'orderby'    => $orderby,
						'order'      => $order,
						'hide_empty' => $hide_empty,
					);

					$product_categories = get_terms('product_cat', $cat_args);

					if (!empty($product_categories)) {
						echo '<ul>';
						foreach ($product_categories as $key => $category) {
							echo '<li>';
							echo '<a href="' . get_term_link($category) . '" >';
							echo $category->name;
							echo '</a>';
							echo '</li>';
						}
						echo '</ul>';
					} ?>

					<?php
					$about = get_page_by_path('about-us');
					$link_url = esc_url(get_permalink($about));

					echo '<h2>' . $about->post_title . '</h2>';
					echo $about->post_content; // get extract instead
					echo '<a href="' . $link_url . '" title="' . $about->post_title . '">Read More</a>';
					?>


					<?php

					$args = array(
						'post_type' => 'project',
						'order'    => 'ASC'
					);

					$projects = get_posts($args);
					if (!empty($projects)) {
						echo '<ul>';
						foreach ($projects as $key => $project) {
							$link_url = esc_url(get_permalink($project));

							echo '<li>';
							echo '<h4>' . $project->post_title . '</h4>';
							echo '<a href="' . $link_url . '" >View Project</a>';
							echo '</li>';
						}
						echo '</ul>';
					} ?>

					<br class="clear">
					<?php edit_post_link(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<article>
				<h2><?php _e('Sorry, nothing to display.'); ?></h2>
			</article>
		<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>