<?php
/**
 * EasyPoint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EasyPoint
 */

if ( ! function_exists( 'easypoint_setup' ) ) :
	function easypoint_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'easypoint', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set image & thumbnail sizes
		set_post_thumbnail_size( 1366, 820 );
		add_image_size( 'easypoint-small-post-thumb', 820, 820 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'easypoint' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add excerpt support for pages.
		add_post_type_support( 'page', 'excerpt' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'easypoint_custom_background_args', array(
			'default-color' => 'E2E5E7',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'easypoint_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function easypoint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'easypoint_content_width', 1000 );
}
add_action( 'after_setup_theme', 'easypoint_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function easypoint_scripts() {
	wp_enqueue_style( 'easypoint-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600' );
	wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '5.0.6', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'slicknavcss', get_template_directory_uri() . '/assets/css/slicknav.css', array(), 'v1.0.10', 'all' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.css', array(), '4.1.6', 'all' );
	wp_enqueue_style( 'easypoint-style', get_stylesheet_uri(), array(), 'v1.0.3', 'all' );

	wp_enqueue_script( 'easypoint-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), 'v1.0.10', true );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery'), '4.1.6', true );
	wp_enqueue_script( 'easypoint-theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'easypoint_scripts' );



// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Register Sidebars
require get_template_directory() . '/inc/register-sidebars.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/theme-hooks.php';
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Install Plugins
require get_template_directory() . '/inc/install-plugins.php';

// Add customizer settings
if ( class_exists( 'Kirki' ) ) {
	require get_template_directory() . '/inc/customizer/settings.php';
}

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Add breadcrumb trail
require get_template_directory() . '/inc/lib/breadcrumb-trail/breadcrumb-trail.php';
