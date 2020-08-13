<?php 
/**
 * Before Header 
 * @see storefront_add_topbar()
 * 
 */
add_action( 'storefront_before_header', 'storefront_add_topbar' );


/**
 * Register Top Bar Menu
 * @see register_topbar_menu()
 */
add_action( 'after_setup_theme', 'register_topbar_menu' );