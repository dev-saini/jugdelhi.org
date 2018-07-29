<?php

Kirki::add_config( 'easypoint_theme', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

Kirki::add_panel( 'theme_options', array(
    'priority'    => 31,
    'title'       => esc_html__( 'Theme Options', 'easypoint' ),
) );

// Add settings
include( get_template_directory() . '/inc/customizer/site-identity-settings.php' );
include( get_template_directory() . '/inc/customizer/layout-settings.php' );
include( get_template_directory() . '/inc/customizer/sidebar-settings.php' );
include( get_template_directory() . '/inc/customizer/theme-colors.php' );
include( get_template_directory() . '/inc/customizer/posts-slider.php' );
include( get_template_directory() . '/inc/customizer/static-frontpage.php' );



Kirki::add_section( 'upgrade_theme', array(
    'title'          => esc_html__( 'Free Upgrade To Pro', 'easypoint' ),
    'panel'          => '',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
	'priority'		 => 500
) );

Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'pro_features',
	'section'  => 'upgrade_theme',
	'type'     => 'custom',
    'default'  => '<h2>' . esc_html__( 'Free Upgrade To Pro', 'easypoint' ) . '</h2>
					<p>' . esc_html__( 'Every day, one user will have the chance to win a free upgrade to the EasyPoint Pro WordPress theme.', 'easypoint' ) . '</p>
					<a class="button button-primary" href="https://themes.salttechno.com/easypoint-pro-free-upgrade/" target="_blank">' . esc_html__( 'I want to participate', 'easypoint' ) . '</a>
					<br>
					<h2 style="margin-top: 40px;">' . esc_html__( 'EasyPoint Pro Features', 'easypoint' ) . '</h2>
					<ol>
						<li>' . esc_html__( 'Google Fonts Integration', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Add slider to the static frontpage.', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Add up-to 3 featured pages on frontpage for better navigation.', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Remove theme branding fro the footer.', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Advanced Customization.', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Premium Support.', 'easypoint' ) . '</li>
						<li>' . esc_html__( 'Performace improvement and much more...', 'easypoint' ) . '</li>
					</ol>
					<a class="button button-primary" href="https://themes.salttechno.com/wordpress-theme/easypoint-pro/" target="_blank">' . esc_html__( 'Know More', 'easypoint' ) . '</a>',
) );



/**
* Styling Customizer
*/
function easypoint_customizer_css()
{
	if( class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'easypoint-customizer-css', get_template_directory_uri() . '/inc/customizer/customizer.css' );
	}
}
add_action( 'customize_controls_print_styles', 'easypoint_customizer_css' );
