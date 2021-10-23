<?php get_header(); ?>
<section class="faq">
	<div class="container">
		<h1 class="title text-center"><?php the_title(); ?></h1>
		<div class="accordion" id="accordionExample">
			<?php do_action('show_faq_items_action'); ?>
		</div>
	</div>
</section>
<?php get_footer() ?>
