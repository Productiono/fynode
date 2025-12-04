<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( "charset" ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body <?php body_class('content-rounded'); ?>>
<?php wp_body_open(); ?>
	
	
	<?php if (get_theme_mod( 'fynode_preloader' )) { ?>
	<div class="site-loading">
		<div class="preloading">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
			</svg>
		</div>
	</div>
	<?php } ?>

	<div id="page" class="page-content">
		
		<?php fynode_do_action( 'fynode_before_main_header'); ?>

		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
			<?php
			/**
			* Hook: fynode_main_header
			*
			* @hooked fynode_main_header_function - 10
			*/
			do_action( 'fynode_main_header' );
		
			?>
		<?php } ?>
		
		<?php fynode_do_action( 'fynode_after_main_header'); ?> 
	
		<div id="main" class="main-content">