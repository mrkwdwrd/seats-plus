<?php
/* Template Name: Contact Us */
get_header();
?>

<main id="contact-us">
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
			<div class="row">
				<div class="text col-xs-12 col-sm-6 col-md-5">
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
					<div class="row">
						<!-- <section class="col-sm-10 col-sm-offset-1 col-lg-7 col-lg-offset-2 contact-details"> -->
						<section class="contact-details">
							<ul>
								<li class="phone">
									<label><i></i>Phone</label>
									<p>
										<a href="tel:<?php echo get_theme_mod('phone'); ?>" title="Call SeatsPlus: <?php echo get_theme_mod('phone'); ?>"><?php echo get_theme_mod('phone'); ?></a>
									</p>
								</li>
								<li class="email">
									<label><i></i>Email</label>
									<p>
										<a href="mailto:<?php echo get_theme_mod('email'); ?>" title="Email SeatsPlus: <?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a>
									</p>
								</li>
							</ul>
						</section>
					</div>
				</div>
				<div class="form col-xs-12 col-sm-6 col-md-6 col-md-offset-1">
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
				<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "7796129",
							formId: "c2b3354f-d369-4b6e-92c2-39e329cbdaf4"
						});
					</script>
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