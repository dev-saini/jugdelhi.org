<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package EasyPoint
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function easypoint_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_page() && get_theme_mod( 'page_sidebar_position', 'no' ) != 'no' && !is_front_page() ) {
		$classes[] = 'page-with-sidebar';
	}

	if ( is_page() && get_theme_mod( 'page_sidebar_position', 'no' ) === 'left' && !is_front_page() ) {
		$classes[] = 'page-left-sidebar';
	}

	if ( is_front_page() && get_theme_mod( 'frontpage_sidebar_position', 'no' ) != 'no' ) {
		$classes[] = 'frontpage-with-sidebar';
	}

	if ( is_front_page() && get_theme_mod( 'frontpage_sidebar_position', 'no' ) === 'left' ) {
		$classes[] = 'frontpage-left-sidebar';
	}

	if ( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'left' &&
 			( is_archive() || is_search() || is_home() || is_404() ) ) {
		$classes[] = 'archive-left-sidebar';
	}

	if ( is_single() && get_theme_mod( 'blog_single_sidebar_position', 'no' ) != 'no' ) {
		$classes[] = 'single-with-sidebar';
	}

	if ( is_single() && get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'left' ) {
		$classes[] = 'single-left-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'easypoint_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function easypoint_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'easypoint_pingback_header' );


/**
* Get header markup
*/
function easypoint_get_header() {
	get_template_part( 'template-parts/others/header' );
}
add_action( 'easypoint_header', 'easypoint_get_header' );


/**
* Get footer markup
*/
function easypoint_get_footer() {
	get_template_part( 'template-parts/others/footer' );
}
add_action( 'easypoint_footer', 'easypoint_get_footer' );


/**
* Return exerpt for frontpage
*/
function easypoint_get_short_excerpt( $length = 40, $post_obj = null ) {
	global $post;
	if ( is_null( $post_obj ) ) {
		$post_obj = $post;
	}
	$length = absint( $length );
	if ( $length < 1 ) {
		$length = 40;
	}
	$source_content = $post_obj->post_content;
	if ( ! empty( $post_obj->post_excerpt ) ) {
		$source_content = $post_obj->post_excerpt;
	}
	$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
	$trimmed_content = wp_trim_words( $source_content, $length, '...' );
	return $trimmed_content;
}

/**
* Change excerpt length
*/
function easypoint_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'easypoint_excerpt_length', 999 );



/**
* Add classes to navigation buttons
*/
add_filter( 'next_posts_link_attributes', 'easypoint_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'easypoint_posts_link_attributes' );
add_filter( 'next_comments_link_attributes', 'easypoint_comments_link_attributes' );
add_filter( 'previous_comments_link_attributes', 'easypoint_comments_link_attributes' );

function easypoint_posts_link_attributes() {
    return 'class="btn btn-outline-primary btn-sm mt-4 mb-4"';
}

function easypoint_comments_link_attributes() {
    return 'class="btn btn-outline-primary btn-sm mt-4 mb-4"';
}



/**
* Breadcrumb Function
*/
function easypoint_breadcrumb_trail() {
	$breadcrumb_defaults = array(
		'browse_tag'      => 'h6',
		'show_browse'     => false,
		'labels' => array(
			'home' => '<i class="fas fa-home"></i>'
		),
	);
	if ( get_theme_mod( 'enable_breadcrumbs', '1' ) && function_exists( 'breadcrumb_trail' ) ) :
		breadcrumb_trail( $breadcrumb_defaults );
	endif;
}


/**
* Is static frontpage
*/
function easypoint_is_static_frontpage() {
	if ( get_option( 'show_on_front' ) === 'page' ) {
		$current_frontpage = get_option( 'page_on_front' );
		$current_frontpage_template = get_page_template_slug( $current_frontpage );
		if ( $current_frontpage_template ) {
			return false;
		}
		else {
			return true;
		}
	}
	else {
		return false;
	}
}


/**
* Greet new users & guide them to help page
*/
function easypoint_admin_notice(){
	if ( is_admin() ) {
		easypoint_greet_user();
	}
}
$sp_intro_notice_dismissed = get_option( 'easypoint-intro-dismissed' );
if( empty( $sp_intro_notice_dismissed ) ) {
	add_action('admin_notices', 'easypoint_admin_notice');
}

function easypoint_greet_user() {
	$help_url = esc_url( admin_url( 'themes.php?page=easypoint-theme-help' ) );
	echo '<div class="notice easypoint-intro-notice notice-success is-dismissible">';
	echo wp_kses_post( __( '<p>Welcome! Thank you for choosing EasyPoint. We are always here to help you. Go to \'Appearance > EasyPoint Help\' page to get any type of help.</p>', 'easypoint' ) );
	echo "<p><a href='" . esc_url( admin_url( 'themes.php?page=easypoint-theme-help' ) ) . "' class='button button-primary'>";
	esc_html_e( 'Get started with EasyPoint', 'easypoint' );
	echo '</a></p></div>';
}


// Enqueue dismiss script
function easypoint_admin_scripts() {
	wp_enqueue_script( 'easypoint-admin', get_template_directory_uri() . '/assets/js/easypoint-admin.js' );
}
$sp_intro_notice_dismissed = get_option( 'easypoint-intro-dismissed' );
if( empty( $sp_intro_notice_dismissed ) ) {
	add_action( 'admin_enqueue_scripts' , 'easypoint_admin_scripts' );
}


// Update option if notice dismissed
add_action( 'wp_ajax_easypoint-intro-dismissed', 'easypoint_dismiss_intro_notice' );
function easypoint_dismiss_intro_notice() {
	update_option( 'easypoint-intro-dismissed', 1 );
}



/**
* Add Help Page
*/
function easypoint_add_welcome_page() {
    $_name = esc_html__( 'Theme Help' , 'easypoint' );

    $theme_page = add_theme_page(
        $_name,
        $_name,
        'edit_theme_options',
        'easypoint-theme-help',
        'easypoint_welcome_page'
    );
}
add_action( 'admin_menu', 'easypoint_add_welcome_page', 1 );

function easypoint_welcome_page() {
	include_once( get_template_directory() . '/inc/theme-help.php' );
}
