<?php

function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');

function load_assets() {
	if ( ! is_admin() ) {
		wp_deregister_script('wp-embed');
	}

	// wp_enqueue_style( 'normalize-css', get_stylesheet_directory_uri() . '/assets/css/normalize.min.css', false, false );
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', false, false );
	wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/assets/css/style.css', false, false );

	wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/assets/scripts/bundle.js', false, false );
}

add_action( 'wp_enqueue_scripts', 'load_assets' );
