<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
 ?>
 
		
		<?php get_template_part( 'includes/footer/models/featured-box' ); ?>
		
		</div><!-- main-content -->
		
		<?php fynode_do_action( 'fynode_before_main_footer'); ?>

		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		
			<?php
			/**
			* Hook: fynode_main_footer
			*
			* @hooked fynode_main_footer_function - 10
			*/
			do_action( 'fynode_main_footer' );
		
			?>
			
		<?php } ?>
		
		<?php fynode_do_action( 'fynode_after_main_footer'); ?>	
		
	</div><!-- page-content -->
  
	<?php wp_footer(); ?>
  
	</body>
</html>