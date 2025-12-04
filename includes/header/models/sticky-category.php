<?php
if ( ! function_exists( 'fynode_sticky_category' ) ) {
	function fynode_sticky_category(){
		
		$stickycategory = get_theme_mod('fynode_sticky_category_toggle','0');
		if($stickycategory == 1){
		?>
			<?php $category = get_theme_mod('fynode_sticky_category_title'); ?>	
			<?php if($category){ ?>	
				<div class="site-sticky-category">
					<div class="site-sticky-category-inner">
						<nav class="site-category-nav">
							<ul class="site-category-list">
								<?php foreach($category as $f){ ?>
									<li><a href="<?php echo esc_attr($f['sticky_category_url']); ?>" data-bs-toggle="tooltip" data-bs-title="<?php echo esc_attr($f['sticky_category_title']); ?>" data-bs-placement="right" data-bs-custom-class="white-tooltip"><img src="<?php echo esc_url( fynode_get_image($f['sticky_category_image'])); ?>"></a></li>
								<?php } ?>	
							</ul>
						</nav>
					</div><!-- site-sticky-category-inner -->
				</div>
			<?php  } ?>	
		<?php  }
	}
}
add_action('wp_footer', 'fynode_sticky_category');