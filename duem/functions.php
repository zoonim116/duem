<?php

require_once 'cpt/_loader.php';

function duem_setup() {
	add_theme_support( 'html5', array( 'search-form' ) );

	register_nav_menus(
        [
			'top-header-menu' => esc_html__( 'Primary', 'duem' ),
        ]
	);
}

add_action( 'after_setup_theme', 'duem_setup' );

function duem_scripts() {
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/assets/js/bundle.min.js', ['jquery'], null, true );
    wp_enqueue_style( 'styles', get_template_directory_uri().'/assets/css/starter.css', array(), time() );
}

add_action( 'wp_enqueue_scripts', 'duem_scripts' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
        'page_title' => 'Настройки темы',
        'menu_title' => 'Настройки темы',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}