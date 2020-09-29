<li <?php wc_product_cat_class('', $category); ?>>
	<?php
	do_action('woocommerce_before_subcategory', $category);
	do_action('woocommerce_before_subcategory_title', $category);
	?>

	<h3><?php echo $category->name ?></h3>

	<?php
	do_action('woocommerce_after_subcategory_title', $category);
	do_action('woocommerce_after_subcategory', $category);
	?>
</li>