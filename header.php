<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' | '; } ?><?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="robots" content="index,follow">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">