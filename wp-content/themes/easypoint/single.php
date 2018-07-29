<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EasyPoint
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<header class="entry-header ep-single <?php if ( has_post_thumbnail() ) : ?> ep-has-thumb <?php endif; ?>">

		<?php easypoint_post_thumbnail(); ?>

		<div class="ep-thumb-overlay">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>
						<div class="entry-meta">
							<?php easypoint_breadcrumb_trail(); ?>
				        </div><!-- .entry-meta -->
					</div>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="row justify-content-center">

			<?php
				$content_area_class = '';
				if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'no' ) {
					$content_area_class = 'col-md-12';
				}
				else {
					$content_area_class = 'col-md-9';
					if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'left' ) {
						$content_area_class = 'col-md-9 order-first order-md-last';
					}
				}
			?>

			<?php
				if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'left' ) {
					get_sidebar();
				}
			?>

			<div id="primary" class="content-area ep-single-php <?php echo esc_attr($content_area_class); ?>">
				<main id="main" class="site-main">
					<?php get_template_part( 'template-parts/content', 'single' ); ?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
				if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'right' ) {
					get_sidebar();
				}
			?>

		</div><!-- /.row -->
	</div><!-- /.container -->

	<div class="ep-post-nav-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<?php the_post_navigation( array(
							'next_text' => '<span class="ep-post-nav-label">' . esc_html__( 'Next', 'easypoint' ) . '<small class="fas fa-chevron-right ml-2"></small></span>' . '%title',
							'prev_text' => '<span class="ep-post-nav-label"><small class="fas fa-chevron-left mr-2"></small>' . esc_html__( 'Previous', 'easypoint' ) . '</span>' . '%title',
						) ); ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<div class="ep-comments-area">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<?php comments_template(); ?>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div>
	<?php endif; ?>

<?php endwhile; ?>

<?php
get_footer();
