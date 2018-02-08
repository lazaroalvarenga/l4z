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

function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');