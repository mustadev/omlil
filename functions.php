<?php

require 'inc/omlil-template-functions.php';
require 'inc/omlil-template-hooks.php';


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


 function omlil_customize_css()
{
    ?>
         <style type="text/css">
             .topbar { background-color: <?php echo get_theme_mod('topbar_backgroundcolor', '#000000'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'omlil_customize_css');