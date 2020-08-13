<?php

require 'inc/omlil-template-functions.php';
require 'inc/omlil-template-functions-overrides.php';
require 'inc/omlil-template-hooks.php';







// Theme Customization

function omlil_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_setting( 'topbar_backgroundcolor' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_section( 'omlil_topbar' , array(
        'title'      => __( 'Top Bar', 'omlil' ),
        'priority'   => 30,
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'      => __( 'Top Bar Color', 'omlil' ),
        'section'    => 'omlil_topbar',
        'settings'   => 'topbar_backgroundcolor',
    ) ) );
    
 }
add_action( 'customize_register', 'omlil_customize_register' );