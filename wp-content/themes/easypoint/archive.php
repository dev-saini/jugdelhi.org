<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyPoint
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
	<header class="page-header ep-archive">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						easypoint_breadcrumb_trail();
					?>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->
<?php endif; ?>

<div class="container">
	<div class="row justify-content-center">

		<?php
			if ( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'left' ) {
				get_sidebar();
			}
		?>

		<div id="primary" class="content-area col-md-9 ep-archive-page <?php if( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'left' ) : echo 'order-first order-md-last'; endif; ?>">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation( array(
					'next_text' => esc_html__( 'Newer Posts', 'easypoint' ),
					'prev_text' => esc_html__( 'Older Posts', 'easypoint' ),
				) );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
			if ( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'right' ) {
				get_sidebar();
			}
		?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
