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



// overide credit function

/**
 * Display the theme credit
 *
 * @since  1.0.0
 * @return void
 */
function storefront_credit() {
	$links_output = '';
	if ( apply_filters( 'storefront_credit_link', true ) ) {
		if ( storefront_is_woocommerce_activated() ) {
			$links_output .= '<a href="https://github.com/mustadev/omlil" target="_blank" title="' . esc_attr__( 'Omlil - The Best eCommerce Theme for WordPress', 'omlil' ) . '" rel="noreferrer">' . esc_html__( 'Built with Omlil &amp; WooCommerce', 'omlil' ) . '</a>.';
		} else {
			$links_output .= '<a href="https://github.com/mustdev/omlil" target="_blank" title="' . esc_attr__( 'Omlil -  The perfect Theme for your next WooCommerce project.', 'omlil' ) . '" rel="noreferrer">' . esc_html__( 'Built with Omlil', 'omlil' ) . '</a>.';
		}
	}
	if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
		$separator = '<span role="separator" aria-hidden="true"></span>';
		$links_output = get_the_privacy_policy_link( '', ( ! empty( $links_output ) ? $separator : '' ) ) . $links_output;
	}
	
	$links_output = apply_filters( 'storefront_credit_links_output', $links_output );
	?>
	<div class="site-info">
		<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
		<?php if ( ! empty( $links_output ) ) { ?>
			<br />
			<?php echo wp_kses_post( $links_output ); ?>
		<?php } ?>
	</div><!-- .site-info -->
	<?php
}