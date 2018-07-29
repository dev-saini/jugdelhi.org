<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyPoint
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<header class="entry-header ep-page <?php if ( has_post_thumbnail() ) : ?> ep-has-thumb <?php endif; ?>">

		<?php easypoint_post_thumbnail(); ?>

		<div class="ep-thumb-overlay">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>
						<?php easypoint_breadcrumb_trail(); ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="row justify-content-center">

			<?php
				$content_area_class = '';
				if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'no' ) {
					$content_area_class = 'col-md-12';
				}
				else {
					$content_area_class = 'col-md-9';
					if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'left' ) {
						$content_area_class = 'col-md-9 order-first order-md-last';
					}
				}
			?>

			<?php
				if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'left' ) {
					get_sidebar();
				}
			?>
			<div id="primary" class="content-area <?php echo esc_attr($content_area_class); ?>">
				<main id="main" class="site-main">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
				if ( get_theme_mod( 'page_sidebar_position', 'no' ) === 'right' ) {
					get_sidebar();
				}
			?>
		</div><!-- /.row -->
	</div><!-- /.container -->

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
