<?php
if ( ! function_exists( 'fynode_cart_holder' ) ) {
	function fynode_cart_holder(){
		$headercart = get_theme_mod('fynode_header_cart','0');
		if($headercart == 1){
		
		?>
		
			<div class="site-drawer cart-drawer">
				<div class="site-drawer-inner">
					<div class="site-drawer-row site-drawer-header flex items-center justify-between">
						<h3 class="entry-title"><?php esc_html_e('Your Cart','fynode'); ?></h3>
						<div class="site-close">
						  <a href="#">
							<i class="klb-icon-x"></i>
						  </a>
						</div><!-- site-close -->    
					</div><!-- site-drawer-row -->
					<div class="site-drawer-body">
						<div class="site-mini-cart">
							<div class="site-mini-cart-inner">
								<div class="site-mini-cart-row site-mini-cart-body">
									<div class="fl-mini-cart-content">
										<?php woocommerce_mini_cart(); ?>
									</div><!-- fl-mini-cart-content -->
								</div><!-- site-mini-cart-row -->
							</div><!-- site-mini-cart-inner -->
						</div><!-- site-mini-cart --> 
					</div><!-- site-drawer-body -->
				</div><!-- site-drawer-inner -->
				<div class="site-drawer-overlay"></div>
			</div><!-- site-drawer -->
			
		<?php  }
	}
}
add_action('wp_footer', 'fynode_cart_holder');