<?php

Kirki::add_section( 'easypoint_layout', array(
    'title'          => esc_html__( 'Layout Settings', 'easypoint' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'easypoint_theme', array(
	'settings'    => 'boxed_site',
	'label'       => esc_html__( 'Boxed Layout', 'easypoint' ),
	'section'     => 'easypoint_layout',
	'type'        => 'toggle',
	'default'     => '1',
    'tooltip'     => esc_html__( 'Select this option to display site within a box.', 'easypoint' ),
    'description' => esc_html__( 'Depending on your screen size, you might need to hide controls to see effects of this change. Click on the "Hide Controls" button at bottom left corner. ', 'easypoint' ),
) );


Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'box_width',
	'label'    => esc_html__( 'Box Max Width (in px)', 'easypoint' ),
	'section'  => 'easypoint_layout',
	'type'     => 'slider',
    'default'  => 1366,
    'description' => esc_html__( 'Depending on your screen size, you might need to hide controls to see effects of this change. Click on the "Hide Controls" button at bottom left corner. ', 'easypoint' ),
	'choices'  => array(
		'min'  => '1080',
		'max'  => '1600',
		'step' => '1',
	),
    'output' => array(
		array(
			'element'  => '.page-wrapper.boxed-wrapper',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
    'active_callback' => array(
        array(
            'setting'  => 'boxed_site',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );


Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'enable_breadcrumbs',
	'label'    => esc_html__( 'Enable Breadcrumbs', 'easypoint' ),
	'section'  => 'easypoint_layout',
	'type'     => 'checkbox',
    'default'  => 1,
) );
