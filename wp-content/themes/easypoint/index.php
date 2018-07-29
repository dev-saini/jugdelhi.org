<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyPoint
 */

get_header();
?>

	<div class="container">
		<div class="row justify-content-center">

			<?php
				if ( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'left' ) {
					get_sidebar();
				}
			?>

			<div id="primary" class="content-area col-md-9 <?php if( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'left' ) : echo 'order-first order-md-last'; endif; ?>">
				<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					if( get_theme_mod( 'blog_display_posts_slider', '0' ) && is_home() && !is_paged() ) {
						get_template_part( 'template-parts/others/featured-posts' );
					}

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

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary .col-md-9 -->

			<?php
				if ( get_theme_mod( 'blog_archive_sidebar_position', 'right' ) === 'right' ) {
					get_sidebar();
				}
			?>

		</div><!-- /.row -->
	</div><!-- /.container -->
<?php
get_footer();
