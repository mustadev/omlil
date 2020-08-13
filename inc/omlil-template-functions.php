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