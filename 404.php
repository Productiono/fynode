<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="content-not-found text-center">
		<h1 class="entry-title font-extrabold leading-none"><?php esc_html_e('404','fynode'); ?></h1>
		<h2 class="entry-subtitle font-semibold"><?php esc_html_e('That Page Cant Be Found','fynode'); ?></h2>
		<div class="entry-teaser">
		  <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try to search for what you are looking for?','fynode'); ?></p>
		</div><!-- entry-teaser -->
		<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-black btn-rounded"><?php esc_html_e('Go To Homepage','fynode'); ?></a>
	</div><!-- content-not-found -->
</div><!-- container -->

<?php get_footer(); ?>