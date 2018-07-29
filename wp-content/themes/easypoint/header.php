<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EasyPoint
 */

?>
<!doctype html>
<?php easypoint_html_before(); ?>
<html <?php language_attributes(); ?>>
	<head>
		<?php easypoint_head_top(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php easypoint_head_bottom(); ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php easypoint_body_top(); ?>

		<div id="page" class="site page-wrapper <?php if ( get_theme_mod( 'boxed_site', 1 ) ) : echo 'boxed-wrapper'; endif; ?>">

			<?php easypoint_header_before(); ?>
			<?php easypoint_header(); ?>
			<?php easypoint_header_after(); ?>

			<div id="content" class="site-content">
