<?php

Kirki::add_section( 'easypoint_frontpage', array(
    'title'          => esc_html__( 'Static Frontpage', 'easypoint' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'active_callback' => 'easypoint_is_static_frontpage'
) );

if( class_exists( 'Kirki' ) ) {
    function easypoint_move_header_bg_image( $wp_customize ) {
        $wp_customize->get_control( 'header_image' )->section = 'easypoint_frontpage';
    }
    add_action( 'customize_register', 'easypoint_move_header_bg_image' );
}

Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'header_img_info',
	'section'  => 'easypoint_frontpage',
	'type'     => 'custom',
	'priority' => '1',
    'default'  => esc_html__( 'This image is displayed as a cover image on static frontpage.', 'easypoint' ),
) );


Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'front_cover_btn_text',
	'label'    => esc_html__( 'Cover Button Text', 'easypoint' ),
	'section'  => 'easypoint_frontpage',
	'type'     => 'text',
    'default'  => '',
) );

Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'front_cover_btn_link',
	'label'    => esc_html__( 'Cover Button Link', 'easypoint' ),
	'section'  => 'easypoint_frontpage',
	'type'     => 'text',
    'default'  => '',
) );
