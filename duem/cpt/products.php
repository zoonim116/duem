<?php

function create_product_post_type() {
    register_post_type( 'product', [
        'labels' => [
            'name' => __( 'Products', 'duem'),
            'singular_name' => __('Product', 'duem')
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