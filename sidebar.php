<?php
/**
 * sidebar.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
 ?>
<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
<?php } ?>