<?php

Kirki::add_section( 'posts_slider', array(
    'title'          => esc_html__( 'Posts Slider on Blog Home', 'easypoint' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );


Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'blog_display_posts_slider',
	'label'    => esc_html__( 'Display Posts Slider', 'easypoint' ),
	'section'  => 'posts_slider',
	'type'     => 'checkbox',
    'default'  => 0,
) );

Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'featured_count',
	'label'    => esc_html__( 'Number of Posts In Slider', 'easypoint' ),
	'section'  => 'posts_slider',
	'type'     => 'number',
    'default'  => '5',
    'choices'  => array(
		'min'  => 1,
		'max'  => 10,
		'step' => 1,
	),
) );

if( class_exists( 'Kirki_Helper' ) ) {
    Kirki::add_field( 'easypoint_theme', array(
    	'settings'    => 'featured_ids',
    	'label'       => esc_html__( 'Select Posts', 'easypoint' ),
    	'section'     => 'posts_slider',
    	'type'        => 'select',
        'multiple'    => 10,
        'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 100, 'post_type' => 'post' ) ),
    ) );
}
