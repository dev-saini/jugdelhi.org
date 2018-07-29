<?php

if( class_exists( 'Kirki' ) ) {
    function easypoint_colors_section( $wp_customize ) {
        $wp_customize->get_control( 'background_color' )->label = esc_html__( 'Background Color', 'easypoint' );
        $wp_customize->get_control( 'background_color' )->description = esc_html__( 'Color outside the boxed layout. Click "Hide Controls" at bottom left corner.', 'easypoint' );
        $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'easypoint' );
        $wp_customize->get_control( 'header_textcolor' )->description = esc_html__( 'You will need this if you have not uploaded logo.', 'easypoint' );
        $wp_customize->get_section( 'colors' )->title = esc_html__( 'Theme Colors', 'easypoint' );
    }
    add_action( 'customize_register', 'easypoint_colors_section' );
}

Kirki::add_field( 'easypoint_theme', array(
	'settings'    => 'styling_primary_color',
	'section'     => 'colors',
	'type'        => 'color',
    'label'       => esc_html__( 'Primary Color', 'easypoint' ),
    'description' => esc_html__( 'This color is used for maxium buttons & links.', 'easypoint' ),
    'default'     => '#007bff',
    'output'   => array(
        array(
			'element'  => array( 'a', '.btn-outline-primary', '.content-area .ep-the-post .entry-header .entry-title a:hover', '.btn-link' ),
			'property' => 'color',
		),
        array(
			'element'  => array( '.btn-primary', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.button.add_to_cart_button', '.wc-proceed-to-checkout .checkout-button.button', '.price_slider_amount button[type="submit"]' ),
			'property' => 'background-color',
		),
        array(
			'element'  => array( '.btn-primary', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.btn-outline-primary', '.button.add_to_cart_button', '.wc-proceed-to-checkout .checkout-button.button', '.price_slider_amount button[type="submit"]' ),
			'property' => 'border-color',
		),
        array(
			'element'  => array( '.btn-outline-primary:hover' ),
			'property' => 'background-color',
		),
        array(
			'element'  => array( '.btn-outline-primary:hover' ),
			'property' => 'border-color',
		),
        array(
            'element'  => array( '.entry-title a:hover', ),
            'property' => 'color',
            'value_pattern' => '$ !important',
        ),
        array(
            'element'       => array( '.btn-primary:focus', '.btn-outline-primary:focus' ),
            'property'      => 'box-shadow',
            'value_pattern' => '0 0 0 0.1rem $',
        ),
        array(
            'element' => array( '.shop_table.shop_table_responsive.woocommerce-cart-form__contents button[type="submit"]', '.form-row.place-order button[type="submit"]', '.single-product .summary.entry-summary button[type="submit"]' ),
            'property' => 'background-color',
        ),
        array(
            'element' => array( '.shop_table.shop_table_responsive.woocommerce-cart-form__contents button[type="submit"]', '.form-row.place-order button[type="submit"]', '.single-product .summary.entry-summary button[type="submit"]' ),
            'property' => 'border-color',
        ),
    ),
) );


Kirki::add_field( 'easypoint_theme', array(
	'settings'    => 'styling_primary_hover_color',
	'label'       => esc_html__( 'Primary Hover Color', 'easypoint' ),
    'description' => esc_html__( 'Color for button & link hovers.', 'easypoint' ),
	'section'     => 'colors',
	'type'        => 'color',
    'default'     => '#0069d9',
    'output'   => array(
        array(
			'element'  => array( 'a:hover', 'a:active', 'a:focus', '.btn-link:hover', '.entry-meta a:hover', '.comments-link a:hover', '.edit-link a:hover' ),
			'property' => 'color',
		),
        array(
			'element'  => array( '.btn-primary:hover', '.btn-primary:active', '.btn-primary:focus', 'input[type="button"]:hover', 'input[type="button"]:active', 'input[type="button"]:focus', 'input[type="submit"]:hover', 'input[type="submit"]:active', 'input[type="submit"]:focus', '.btn-primary:not(:disabled):not(.disabled):active', '.button.add_to_cart_button:hover', '.wc-proceed-to-checkout .checkout-button.button:hover', '.price_slider_amount button[type="submit"]:hover' ),
			'property' => 'background-color',
		),
        array(
			'element'  => array( '.btn-primary:hover', '.btn-primary:active', '.btn-primary:focus', 'input[type="button"]:hover', 'input[type="button"]:active', 'input[type="button"]:focus', 'input[type="submit"]:hover', 'input[type="submit"]:active', 'input[type="submit"]:focus', '.btn-primary:not(:disabled):not(.disabled):active', '.button.add_to_cart_button:hover', '.wc-proceed-to-checkout .checkout-button.button:hover', '.price_slider_amount button[type="submit"]:hover' ),
			'property' => 'border-color',
		),
        array(
            'element' => array( '.shop_table.shop_table_responsive.woocommerce-cart-form__contents button[type="submit"]:hover', '.form-row.place-order button[type="submit"]:hover', '.single-product .summary.entry-summary button[type="submit"]:hover' ),
            'property' => 'background-color',
            'value_pattern' => '$ !important',
        ),
        array(
            'element' => array( '.shop_table.shop_table_responsive.woocommerce-cart-form__contents button[type="submit"]:hover', '.form-row.place-order button[type="submit"]:hover', '.single-product .summary.entry-summary button[type="submit"]:hover' ),
            'property' => 'border-color',
            'value_pattern' => '$ !important',
        ),
    ),
) );
