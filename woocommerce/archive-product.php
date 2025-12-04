<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */
 
defined( 'ABSPATH' ) || exit;

// Elementor `archive` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {

	if ( ! fynode_is_pjax() ) {
	    get_header( 'shop' );
	}
	?>
	
	<div class="container">
		
		<?php woocommerce_breadcrumb(); ?>
		
	</div>
	
	<?php fynode_do_action( 'fynode_before_main_shop'); ?>
		
	<div class="container">
	
		<?php do_action( 'woocommerce_before_main_content' ); ?>
		
		<header class="woocommerce-products-header">
			<?php do_action( 'woocommerce_archive_description' ); ?>
		</header>
		
		<?php if( get_theme_mod( 'fynode_shop_layout' ) == 'full-width' || fynode_get_option() == 'full-width') { ?>
			<div class="row content-wrapper full-width">
				<div id="primary" class="col col-12 primary-column">
					<?php do_action('klb_before_products'); ?>
					
					
					<?php
					if ( woocommerce_product_loop() ) {
						
						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );

		
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
				
			</div>
		<?php } elseif( get_theme_mod( 'fynode_shop_layout' ) == 'right-sidebar' || fynode_get_option() == 'right-sidebar') { ?>
			<div class="row content-wrapper flex-row-reverse gap-y-30 sidebar-right">
				<div id="primary" class="col col-12 col-lg-9 primary-column">
					<?php do_action('klb_before_products'); ?>
					
					
					<?php
					if ( woocommerce_product_loop() ) {
						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
				<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
					<div id="secondary" class="col col-12 col-lg-3 sidebar secondary-column desktop-only">
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
				<div class="row content-wrapper flex-row-reverse gap-y-30 sidebar-left">
					
					<div id="primary" class="col col-12 col-lg-9 primary-column">
						<?php do_action('klb_before_products'); ?>
						
					
						<?php
						if ( woocommerce_product_loop() ) {
							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<div id="secondary" class="col col-12 col-lg-3 sidebar secondary-column desktop-only">
							<?php dynamic_sidebar( 'shop-sidebar' ); ?>
						</div>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="row content-wrapper flex-row-reverse gap-y-30 sidebar-left">
					<div id="primary" class="col col-12 col-lg-12 primary-column">
						<?php do_action('klb_before_products'); ?>
						
						
						<?php
						if ( woocommerce_product_loop() ) {
							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					
					</div>
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<div id="secondary" class="col col-12 col-lg-3 sidebar secondary-column desktop-only">
							<?php dynamic_sidebar( 'shop-sidebar' ); ?>
						</div>
					<?php } ?>					
				</div>
			<?php } ?>
		<?php } ?>
			
		<?php

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php fynode_do_action( 'fynode_after_main_shop'); ?>
	</div>

	<?php
		if ( ! fynode_is_pjax() ) {
			get_footer( 'shop' );
		}
}
