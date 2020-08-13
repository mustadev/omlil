<?php

/**
 * Adds a top bar to Storefront, before the header.
 */
function storefront_add_topbar() {
    ?>
    <div class="topbar">
            <div class="topbar__logo">
                <?php echo get_custom_logo( ); ?>

            </div>
            <div class="topbar__search">
                <?php storefront_product_search(); ?>
            </div>
            <?php
            wp_nav_menu(
     
                array( 'theme_location'=> 'topbar', 
                'depth' => 0,
                'container' => 'div',
                'container_class' => 'topbar__nav__container', 
                'menu_class' => 'topbar__nav__container__menu'
                )
            ); ?>
        </div>
        <?php 
}

/**
 * Regester TopBar Menu
 * 
 */
function register_topbar_menu() {
    register_nav_menus( 
        array(
        'topbar' => __( 'TopBar Menu', 'omlil' )
        ) 
    );
}



/**
 * Omlil Customize Css
 */

function omlil_customize_css()
{
    ?>
         <style type="text/css">
             .topbar { background-color: <?php echo get_theme_mod('topbar_backgroundcolor', '#000000'); ?>; }
         </style>
    <?php
}