<?php

function theme_customizer ( $wp_customize ) {

    $wp_customize->add_section('theme_settings_section', array(
        'title' => __('Configurações do Tema')
    ));

    $wp_customize->add_setting('ga_code', array(
        'default' => 'UA-XXXXX-Y'
    ));

    $wp_customize->add_control('ga_code', array(
        'label' => 'Código do Google Analytics',
        'section' => 'theme_settings_section',
        'type' => 'text'
    ));
}

add_action( 'customize_register', 'theme_customizer' );
