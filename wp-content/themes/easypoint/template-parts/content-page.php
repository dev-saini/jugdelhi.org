<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyPoint
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'ep-single-page' ); ?>>

	<div class="entry-content">
		<div class="<?php if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'no' ) : echo 'row justify-content-center'; endif;?>">
            <div class="<?php if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'no' ) : echo 'col-md-8'; endif;?>">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'easypoint' ),
					'after'  => '</div>',
				) );
				?>
			</div>
			<!-- /.col-md-8 -->
		</div>
		<!-- /.row -->
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
