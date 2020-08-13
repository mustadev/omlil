<?php 
/**
 * Before Header 
 * @see storefront_add_topbar()
 * @since  1.0.0
 * 
 */
add_action( 'storefront_before_header', 'storefront_add_topbar' );


/**
 * Register Top Bar Menu
 * @see register_topbar_menu()
 * @since  1.0.0
 */
add_action( 'after_setup_theme', 'register_topbar_menu' );


/**
 * 
 * Omlil Customize Css
 * @see omlil_customuze_css
 * @since  1.0.0
 */
add_action( 'wp_head', 'omlil_customize_css');