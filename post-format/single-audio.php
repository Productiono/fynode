<article class="post post-single post-module">
	<div class="post-header">
		<h3 class="entry-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="post-meta entry-post-meta">
			<span class="meta-item entry-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
			
			<?php if(has_category()){ ?>
				<span class="meta-item  entry-category">
					<?php the_category(', '); ?>
				</span><!-- entry-category -->
			<?php } ?>
			
			<?php the_tags( '<span class="meta-item entry-tags">', ', ', ' </span>'); ?>
			
			<?php if ( is_sticky()) {
				printf( '<span class="meta-item sticky-post">%s</span>', esc_html__('Featured', 'fynode' ) );
			} ?>
		</div><!-- entry-post-meta -->
	</div>
	
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		<div class="post-thumbnail">
			<?php  
			
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'full' );
			$image_src = $image_src[0]; 
			?>
			
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></a>
		</div><!-- post-thumbnail -->
	<?php } ?>
	
	<div class="post-content">
		<div class="entry-content">
			<div class="klb-post">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'fynode' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			</div>
		</div><!-- entry-content -->
	</div><!-- post-content -->
</article><!-- post -->