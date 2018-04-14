<?php

define( 'HOME_URI', home_url() );
define( 'THEME_URI', get_stylesheet_directory_uri() );
define( 'THEME_INC', dirname( __FILE__ ) );
define( 'THEME_ASSETS_URI', THEME_URI . '/assets' );
define( 'THEME_IMAGES', THEME_ASSETS_URI . '/images' );
define( 'THEME_CSS', THEME_ASSETS_URI . '/css' );
define( 'THEME_JS', THEME_ASSETS_URI . '/scripts' );

add_filter('show_admin_bar', '__return_false');

require_once THEME_INC . '/output-compress.php';
require_once THEME_INC . '/assets.php';
require_once THEME_INC . '/admin.php';
require_once THEME_INC . '/optimize.php';
require_once THEME_INC . '/theme.php';
require_once THEME_INC . '/theme-options.php';

require_once THEME_INC . '/cpt/attraction.php';
require_once THEME_INC . '/cpt/expositor.php';
require_once THEME_INC . '/cpt/faq.php';
require_once THEME_INC . '/cpt/holder.php';
