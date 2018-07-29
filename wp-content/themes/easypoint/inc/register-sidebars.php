<?php


/**
 * Register widget area.
 */
function easypoint_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'easypoint' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets for sidebar here.', 'easypoint' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'easypoint' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'easypoint' ),
		'before_widget' => '<section id="%1$s" class="widget ep-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'easypoint' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'easypoint' ),
		'before_widget' => '<section id="%1$s" class="widget ep-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'easypoint' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'easypoint' ),
		'before_widget' => '<section id="%1$s" class="widget ep-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'easypoint' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'easypoint' ),
		'before_widget' => '<section id="%1$s" class="widget ep-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'easypoint_widgets_init' );
