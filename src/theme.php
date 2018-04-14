<?php

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
    )
);

add_post_type_support( 'page', 'excerpt' );

function remove_api () {
    remove_action( 'wp_head', 'wp_resource_hints', 2 );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}

add_action( 'after_setup_theme', 'remove_api' );

function doctype_opengraph($output) {
    return $output . 'xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'doctype_opengraph');

function fb_opengraph() {
    global $post;

    if(has_post_thumbnail($post->ID)) {
        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
    } else {
        $img_src = get_stylesheet_directory_uri() . '/assets/images/social.jpg';
    }
    if($excerpt = $post->post_excerpt) {
        $excerpt = strip_tags($post->post_excerpt);
        $excerpt = str_replace("", "'", $excerpt);
    } else {
        $excerpt = get_bloginfo('description');
    }
    ?>
        <meta property="og:title" content="<?php echo the_title(); ?>"/>
        <meta property="og:description" content="<?php echo $excerpt; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
        <meta property="og:image" content="<?php echo $img_src; ?>"/>

    <?php
}

add_action('wp_head', 'fb_opengraph', 15);

$lang = THEME_URI . '/lang';

load_theme_textdomain( 'theme_textdomain', $lang );

function register_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'social-menu' => __( 'Social Menu' )
      )
    );
}

add_action( 'init', 'register_menus' );