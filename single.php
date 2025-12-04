<?php
/**
 * single.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
 ?>

<?php get_header(); ?>

<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) { ?>
	<div class="container">
			
		<?php if( get_theme_mod( 'fynode_blog_layout' ) == 'left-sidebar') { ?>
			<div class="row content-wrapper mt-5 sidebar-left">
				<div id="sidebar" class="col col-12 col-lg-3 sidebar secondary-column hidden lg:block blog-sidebar">
					<div class="sidebar-inner sticky-holder sticky-top-20 overflow-visible">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
				</div>
				<div id="primary" class="col col-12 col-lg-9 primary-column">
					<div class="blog-posts-single">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
						<?php endwhile; ?>
					
							<?php comments_template(); ?>
							
						<?php else : ?>
	
							<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>
	
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'fynode_blog_layout' ) == 'full-width') { ?>
			<div class="row content-wrapper mt-5">
				<div id="primary" class="col col-12 col-lg-12 primary-column">
					<div class="blog-posts-single">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
						<?php endwhile; ?>
					
							<?php comments_template(); ?>
							
						<?php else : ?>
	
							<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>
	
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				<div class="row content-wrapper mt-5 sidebar-right">
					<div id="primary" class="col col-12 col-lg-9 primary-column">
						<div class="blog-posts-single">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
								<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
							<?php endwhile; ?>
						
								<?php comments_template(); ?>
								
							<?php else : ?>
	
								<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>
	
							<?php endif; ?>
						</div>
					</div>
					<div id="sidebar" class="col col-12 col-lg-3 sidebar secondary-column hidden lg:block blog-sidebar">
						<div  class="sidebar-inner sticky-holder sticky-top-20 overflow-visible">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="row content-wrapper mt-5">
					<div id="primary" class="col col-12 col-lg-12 primary-column">
						<div class="blog-posts-single">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
								<?php  get_template_part( 'post-format/single', get_post_format() ); ?>
	
							<?php endwhile; ?>
						
								<?php comments_template(); ?>
								
							<?php else : ?>
	
								<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>
	
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>
			
		<?php } ?>
				
	</div>
<?php } ?>
<?php get_footer(); ?>