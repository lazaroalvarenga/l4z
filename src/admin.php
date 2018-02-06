<?php

function l4z_admin_scripts() {
    wp_enqueue_style( 'l4z-admin', get_template_directory_uri() . '/assets/css/custom-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'l4z_admin_scripts' );
add_action( 'login_enqueue_scripts', 'l4z_admin_scripts' );

function l4z_admin_footer() {
    echo '';
}

add_filter( 'admin_footer_text', 'l4z_admin_footer' );

function l4z_admin_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'l4z_admin_logo_url' );

function l4z_admin_logo_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'l4z_admin_logo_title' );

function l4z_admin_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

    remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'l4z_admin_remove_dashboard_widgets' );

remove_action( 'welcome_panel', 'wp_welcome_panel' );

function l4z_admin_adminbar_remove_logo() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'l4z_admin_adminbar_remove_logo' );