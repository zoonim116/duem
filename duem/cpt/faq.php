<?php

function create_faq_post_type() {
    register_post_type( 'faq', [
        'labels' => [
            'name' => __( 'FAQ', 'duem'),
            'singular_name' => __('FAQ', 'duem')
        ],
        'public' => true,
        'has_archive' => true,
        'query_var' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => false
    ]);
}

add_action( 'init', 'create_faq_post_type' );

add_action('show_faq_items_action', 'show_faq_items');

function show_faq_items() {
    $items = get_posts([
        'post_type' => 'faq',
        'numberposts' => -1
    ]);
    if ($items) {
        global $post;
        foreach ($items as $index => $post) {
            setup_postdata( $post );
            get_template_part('template-parts/faq', 'item', compact('index'));
        }
    }
    wp_reset_postdata();
}