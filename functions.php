<?php
/**
 * Adds a top bar to Storefront, before the header.
 */
function storefront_add_topbar() {
    ?>
    <div class="topbar">
            <div class="topbar__logo">
                <!-- <img class="topbar__logo__img" src="logo.png" alt="Logo"> -->
                <?php echo get_custom_logo( ); ?>

            </div>
            <div class="topbar__search">
                <!-- <form action="">    
                    <input type="search" name="search" id="">
                </form> -->
                <?php storefront_product_search(); ?>
            </div>
            <!-- <div class="topbar__nav">
                <div class="topbar__nav__item">
                    <span class="topbar__nav__item__text" >Upload</span>
                    <i class="fas fa-upload"></i>
                </div>
                <div class="topbar__nav__item">
                    <span class="topbar__nav__item__text">Card</span>
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="topbar__nav__item">
                    <span class="topbar__nav__item__text">Account</span>
                    <i class="fas fa-user"></i>
                </div>
            </div> -->
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

add_action( 'storefront_before_header', 'storefront_add_topbar' );

function register_topbar_menu() {
    register_nav_menus( 
        array(
        'topbar' => __( 'TopBar Menu', 'omlil' )
        ) 
    );
}
add_action( 'after_setup_theme', 'register_topbar_menu' );