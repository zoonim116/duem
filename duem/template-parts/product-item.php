<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="products-list__item">
		<div class="products-list__img">
			<a href="<?php the_permalink(); ?>">
				<?php echo get_the_post_thumbnail(); ?>
			</a>
		</div>
		<a href="<?php the_permalink(); ?>">
			<div class="products-list__content">
				<h3 class="name"><?php the_field('taste'); ?></h3>
				<p class="description"><?php the_title(); ?></p>
				<p class="price">Цена: <span><?php the_field('price'); ?> грн</span></p>
			</div>
		</a>
	</div>

</div>