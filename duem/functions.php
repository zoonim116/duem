<?php

require_once 'cpt/_loader.php';

function duem_setup() {
	add_theme_support( 'html5' );
	add_theme_support('post-thumbnails');

	register_nav_menus(
        [
			'top-header-menu' => esc_html__( 'Primary', 'duem' ),
        ]
	);

	load_theme_textdomain('duem');
}

add_action( 'after_setup_theme', 'duem_setup' );

function duem_scripts() {
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/assets/js/bundle.min.js', ['jquery'], null, true );
    wp_enqueue_style( 'styles', get_template_directory_uri().'/assets/css/starter.css', array(), time() );
	wp_localize_script( 'bundle', 'duem',
		array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('make-order-nonce')
		)
	);
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
if( wp_doing_ajax() ) {
	add_action( 'wp_ajax_make_order', 'make_order' );
	add_action( 'wp_ajax_nopriv_make_order', 'make_order' );
}

function make_order() {
	check_ajax_referer( 'make-order-nonce', 'nonce' );
	if (
		($_POST['pid'] && !empty($_POST['pid'])) &&
		($_POST['count'] && !empty($_POST['count'])) &&
		($_POST['phone'] && !empty($_POST['phone']))) {

		$product = get_post((int)$_POST['pid']);
		$email_body = <<<EOD
		<p>Новый заказ с сайта:</p>
		<table>
		<tr>
			<td><b>Товар</b></td>
			<td>{$product->post_title}</td>
		</tr>
		<tr>
			<td>Количество</td>	
			<td>{$_POST['count']}</td>	
		</tr>
		<tr>
			<td>Телефон</td>
			<td>{$_POST['phone']}</td>
		</tr>	
		</table>
EOD;
		if ($product) {
			wp_mail(get_option('admin_email'), 'Новый заказ с сайта', $email_body, [
				'Content-Type: text/html; charset=UTF-8'
			]);
			echo "true";
			wp_die();
		}
		echo "false";
		wp_die();

	}
}

function wpse27856_set_content_type(){
	return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );