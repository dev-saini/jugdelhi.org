<?php

Kirki::add_field( 'easypoint_theme', array(
	'settings' => 'logo_height',
	'label'    => esc_html__( 'Logo Height (in px)', 'easypoint' ),
	'section'  => 'title_tagline',
	'type'     => 'number',
	'priority' => 8,
	'default'  => 50,
    'tooltip'  => esc_html__( 'Minimum height 25px & maximum height 150px. Width will be adjusted automatically.', 'easypoint' ),
    'choices'  => array(
		'min'  => 25,
		'max'  => 150,
		'step' => 1,
	),
    'output'   => array(
        array(
			'element'  => '.site-header .custom-logo',
			'property' => 'height',
			'units'    => 'px',
		),
        array(
			'element'       => '.site-header .custom-logo',
			'property'      => 'width',
            'value_pattern' => 'auto',
		)
    )
) );
