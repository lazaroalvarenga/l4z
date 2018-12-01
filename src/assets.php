<?php

function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');

function load_assets() {
	if ( ! is_admin() ) {
		wp_deregister_script('wp-embed');
	}
	wp_deregister_style( 'contact-form-7' );
	wp_deregister_script( 'jquery-form' );
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );

	wp_enqueue_style( 'bootstrap', THEME_CSS . '/bootstrap.min.css', false, false );
	wp_enqueue_style( 'app', THEME_CSS . '/style.css', false, false );

	wp_enqueue_script( 'app', THEME_JS . '/bundle.js', false, false );
}

add_action( 'wp_enqueue_scripts', 'load_assets' );
