<?php
/**
 * archive.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
 ?>

<?php get_header(); ?>

<div class="klb-blog page-container">
	<div class="container">
			
		<?php if( get_theme_mod( 'fynode_blog_layout' ) == 'left-sidebar') { ?>
		
			<h2 class="search-title"><?php the_archive_title(); ?></h2>
		
			<div class="row content-wrapper sidebar-left">
				<div id="sidebar" class="col col-12 col-lg-3 sidebar secondary-column hidden lg:block blog-sidebar">
					<div class="sidebar-inner sticky-holder sticky-top-20 overflow-visible">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
				</div>
				<div id="primary" class="col col-12 col-lg-9 primary-column">
					<div class="blog-posts">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
					
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>

						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'fynode_blog_layout' ) == 'full-width') { ?>
			<div class="row content-wrapper">
				<div id="primary" class="col col-12 col-lg-12 primary-column">
				
					<h2 class="search-title"><?php the_archive_title(); ?></h2>
				
					<div class="blog-posts">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
					
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>

						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
			
				<h2 class="search-title"><?php the_archive_title(); ?></h2>
			
				<div class="row content-wrapper sidebar-right">
					<div id="primary" class="col col-12 col-lg-9 primary-column">
						<div class="blog-posts">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>

							<?php endif; ?>
						</div>
					</div>
					<div id="sidebar" class="col col-12 col-lg-3 sidebar secondary-column hidden lg:block blog-sidebar">
						<div class="sidebar-inner sticky-holder sticky-top-20 overflow-visible">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="row content-wrapper">
					<div id="primary" class="col col-12 col-lg-12 primary-column">
					
						<h2 class="search-title"><?php the_archive_title(); ?></h2>
						
						<div class="blog-posts">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'fynode') ?></h2>

							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
					
	</div>
</div>

<?php get_footer(); ?>