<?php

function holder_cpt() {

	$labels = array(
		'name'                  => _x( 'Apoiadores', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Apoiador', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Apoiadores', 'text_domain' ),
		'all_items'             => __( 'Todos os Apoiadores', 'text_domain' )
    );
    
	$args = array(
		'label'                 => __( 'Apoiadores', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
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
        'menu_icon'           => 'dashicons-id',
        'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
    );
    
	register_post_type( 'holder', $args );
}
add_action( 'init', 'holder_cpt', 0 );