<?php
if ( ! function_exists( 'fynode_wishlist_holder' ) ) {
	function fynode_wishlist_holder(){
		$headerwishlist = get_theme_mod('fynode_header_wishlist','0');
		if($headerwishlist == 1){
		
		?>
			
			<?php if ( class_exists( 'KlbWishlist' ) ) { ?>	
				<div class="site-drawer wishlist-drawer">
					<div class="site-drawer-inner">
						<div class="site-drawer-row site-drawer-header flex items-center justify-between">
							<h3 class="entry-title"><?php esc_html_e('Wishlist','fynode'); ?></h3>
							<div class="site-close">
							  <a href="#">
								<i class="klb-icon-x"></i>
							  </a>
							</div><!-- site-close -->    
						</div><!-- site-drawer-row -->
						<div class="site-drawer-body">
							<?php echo do_shortcode( '[klbwl_list]' ); ?>
						</div><!-- site-drawer-body -->
					</div><!-- site-drawer-inner -->
					<div class="site-drawer-overlay"></div>
				</div><!-- site-drawer -->  
			<?php } ?>
			
		<?php  }
	}
}
add_action('wp_footer', 'fynode_wishlist_holder');