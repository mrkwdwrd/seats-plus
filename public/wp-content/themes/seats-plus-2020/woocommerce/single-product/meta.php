<?php
global $product;
?>

<div class="product_meta">
	<?php echo wc_get_product_category_list($product->get_id(), ', '); ?>
</div>