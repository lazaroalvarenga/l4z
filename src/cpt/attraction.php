<?php

function attraction_cpt() {

	$labels = array(
		'name'                  => _x( 'Atrações', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Atração', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Atrações', 'text_domain' ),
		'all_items'             => __( 'Todas as Atrações', 'text_domain' )
    );
    
	$args = array(
		'label'                 => __( 'Atrações', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
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
        'menu_icon'           => 'dashicons-carrot',
        'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
    );
    
	register_post_type( 'attraction', $args );
}
add_action( 'init', 'attraction_cpt', 0 );