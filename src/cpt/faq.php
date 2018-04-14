<?php

function faq_cpt() {

	$labels = array(
		'name'                  => _x( 'FAQ', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Pergunta', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'FAQ', 'text_domain' ),
		'all_items'             => __( 'Todo o FAQ', 'text_domain' )
    );
    
	$args = array(
		'label'                 => __( 'FAQ', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'menu_icon'           => 'dashicons-warning',
        'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
    );
    
	register_post_type( 'faq', $args );
}
add_action( 'init', 'faq_cpt', 0 );