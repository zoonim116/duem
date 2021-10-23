<?php

function create_product_post_type() {
    register_post_type( 'product', [
        'labels' => [
            'name' => __( 'Products', 'duem'),
            'singular_name' => __('Product', 'duem'),
	        'add_new' => __('Add new product', 'duem')
        ],
        'public' => true,
        'has_archive' => true,
        'query_var' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-superhero',
        'show_in_rest' => false
    ]);
}

add_action( 'init', 'create_product_post_type' );

add_action('show_products_items_action', 'show_products_items', 10);

function show_products_items() {
	$items = get_posts([
		'post_type' => 'product',
		'numberposts' => -1
	]);
	if ($items) {
		global $post;
		foreach ($items as $post) {
			setup_postdata( $post );
			get_template_part('template-parts/product', 'item');
		}
	}
	wp_reset_postdata();
}

add_action('show_similar_products_action', 'show_similar_products', 10);

function show_similar_products() {
	global $post;

	$related = new WP_Query(
		array(
			'posts_per_page' => 4,
			'post__not_in'   => array( $post->ID ),
			'post_type' => 'product'
		)
	);

	if( $related->have_posts() ) {
		while( $related->have_posts() ) {
			$related->the_post();
			get_template_part('template-parts/product', 'item');
		}
		wp_reset_postdata();
	}
}