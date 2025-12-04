<?php
if ( ! function_exists( 'fynode_search_holder' ) ) {
	function fynode_search_holder(){
		$headersearch = get_theme_mod('fynode_header_search','0');
		if($headersearch == 1){
		
		?>
		
			<div class="site-drawer search-drawer">
				<div class="site-drawer-inner">
					<div class="site-drawer-row site-drawer-header flex items-center justify-between">
						<h3 class="entry-title"><?php esc_html_e('Search','fynode'); ?></h3>
						<div class="site-close">
						  <a href="#">
							<i class="klb-icon-x"></i>
						  </a>
						</div><!-- site-close -->    
					</div><!-- site-drawer-row -->
					<div class="site-drawer-body">
						<div class="site-search-form site-mobile-search filled-dark">
							<?php echo fynode_header_product_search(); ?>
						</div>
					</div><!-- site-drawer-body -->
				</div><!-- site-drawer-inner -->
				<div class="site-drawer-overlay"></div>
			</div><!-- site-drawer -->

		<?php  }
	}
}
add_action('wp_footer', 'fynode_search_holder');