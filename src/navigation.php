<?php

function l4z_menus() {
    register_nav_menus(
        array(
            'menu-social' => __( 'Menu Social'),
            'menu-primary' => __( 'Menu Principal')
        )
    );
}

add_action( 'init', 'l4z_menus' );
