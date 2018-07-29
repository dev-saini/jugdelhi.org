<?php

Kirki::add_section( 'easypoint_sidebars', array(
    'title'          => esc_html__( 'Sidebar Settings', 'easypoint' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );


// Frontpage sidebar
Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'frontpage_sidebar_position',
	'label'    => esc_html__( 'Frontpage Sidebar', 'easypoint' ),
	'section'  => 'easypoint_sidebars',
	'type'     => 'radio',
    'default'  => 'no',
    'choices'  => array(
        'no'    => esc_html__( 'No Sidebar', 'easypoint' ),
        'right' => esc_html__( 'Right', 'easypoint' ),
        'left'  => esc_html__( 'Left', 'easypoint' ),
    ),
    'active_callback' => 'easypoint_is_static_frontpage',
) );

// Page Sidebar Position
Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'page_sidebar_position',
	'label'    => esc_html__( 'Page Sidebar', 'easypoint' ),
    'tooltip'  => esc_html__( 'This can be overwritten on the particular page by using a page template.', 'easypoint' ),
	'section'  => 'easypoint_sidebars',
	'type'     => 'radio',
    'default'  => 'no',
    'choices'  => array(
        'no'    => esc_html__( 'No Sidebar', 'easypoint' ),
        'right' => esc_html__( 'Right', 'easypoint' ),
        'left'  => esc_html__( 'Left', 'easypoint' ),
    )
) );

// Blog Archive Sidebar Position
Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'blog_archive_sidebar_position',
	'label'    => esc_html__( 'Blog Archive Sidebar', 'easypoint' ),
    'tooltip'  => esc_html__( 'Sidebar position for blog archive pages.', 'easypoint' ),
	'section'  => 'easypoint_sidebars',
	'type'     => 'radio',
    'default'  => 'right',
    'choices'  => array(
        'no'    => esc_html__( 'No Sidebar', 'easypoint' ),
        'right' => esc_html__( 'Right', 'easypoint' ),
        'left'  => esc_html__( 'Left', 'easypoint' ),
    )
) );

// Blog Single Sidebar Position
Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'blog_single_sidebar_position',
	'label'    => esc_html__( 'Blog Single Post Sidebar', 'easypoint' ),
    'tooltip'  => esc_html__( 'Sidebar position for blog single post.', 'easypoint' ),
	'section'  => 'easypoint_sidebars',
	'type'     => 'radio',
    'default'  => 'no',
    'choices'  => array(
        'no'    => esc_html__( 'No Sidebar', 'easypoint' ),
        'right' => esc_html__( 'Right', 'easypoint' ),
        'left'  => esc_html__( 'Left', 'easypoint' ),
    )
) );
