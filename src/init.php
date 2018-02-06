<?php

add_action( 'l4z_init', 'l4z_define_constants', -1 );

function l4z_define_constants() {
    define( 'L4Z_VERSION', '0.1' );

    if( !defined( 'L4Z_THEME_PATH' ) ) {
        define( 'L4Z_THEME_PATH', wp_normalize_path( trailingslashit( get_template_directory() ) ) );
    }

    define( 'L4Z_PATH', L4Z_THEME_PATH . 'src/' );
    define( 'L4Z_API_PATH', L4Z_PATH . 'api/' );
}

if ( ! isset( $content_width ) ) {
    $content_width = 600;
}

add_filter('show_admin_bar', '__return_false');

require_once get_template_directory() . '/src/output-compress.php';
require_once get_template_directory() . '/src/assets.php';
require_once get_template_directory() . '/src/admin.php';
require_once get_template_directory() . '/src/optimize.php';
// require_once get_template_directory() . '/src/assets.php';
// require_once get_template_directory() . '/src/assets.php';
// require_once get_template_directory() . '/src/assets.php';
// require_once get_template_directory() . '/src/assets.php';

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );