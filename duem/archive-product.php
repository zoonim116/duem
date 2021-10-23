<?php get_header(); ?>
<section class="products-list">
	<div class="container">
		<div class="row">
            <?php do_action('show_products_items_action'); ?>
		</div>
	</div>
</section>
<section class="text-section">
	<div class="container">
		<?php the_field('product_seo_text', 'option'); ?>
	</div>
</section>
<?php get_footer(); ?>
