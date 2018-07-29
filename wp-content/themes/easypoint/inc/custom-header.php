<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package EasyPoint
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses easypoint_header_style()
 */
function easypoint_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'easypoint_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/images/header-img.jpeg',
		'default-text-color'     => '2A3039',
		'width'                  => 1600,
		'height'                 => 700,
		'flex-height'            => true,
		'wp-head-callback'       => 'easypoint_header_style',
	) ) );

	register_default_headers( array(
		'desk' => array(
			'url'           => '%s/assets/images/header-img.jpeg',
			'thumbnail_url' => '%s/assets/images/header-img.jpeg',
			'description'   => __( 'Easy', 'easypoint' )
		),
	) );
}
add_action( 'after_setup_theme', 'easypoint_custom_header_setup' );

if ( ! function_exists( 'easypoint_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see easypoint_custom_header_setup().
	 */
	function easypoint_header_style() {

		if ( get_header_image() ) : ?>
			<style type="text/css">
				.ep-page.ep-frontpage.entry-header {
					background-image: url(<?php echo esc_url( get_header_image() ); ?>);
					background-size: cover;
					background-position: center center;
					min-height: 600px;
				}
				.ep-page.ep-frontpage.entry-header .ep-thumb-overlay {
		            min-height: 600px;
		        }
				.ep-page.ep-frontpage.entry-header .ep-thumb-overlay p {
						color: #fff;
						font-size: 1.25rem;
				}
				.ep-page.ep-frontpage.entry-header .entry-title {
					font-size: 3.5rem;
				}
				.ep-page.ep-frontpage.entry-header span.entry-subtitle {
		            font-size: 35%;
		            font-weight: 400;
		            line-height: 1.5;
		            margin-top: 10px;
		        }
			</style>
		<?php
		endif;

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-header .site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			.site-description {
				opacity: 0.75;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
