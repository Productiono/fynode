<?php
if ( ! function_exists( 'fynode_cart_icon' ) ) {
	function fynode_cart_icon(){
		$headercart = get_theme_mod('fynode_header_cart','0');
		if($headercart == '1'){
			global $woocommerce;
			$carturl = wc_get_cart_url(); 
			?>
				
				<div class="site-action-button action-cart">
					<a href="<?php echo esc_url($carturl); ?>" class="site-action-link toggle-button cart-toggle">
						<div class="site-action-icon">
						  <!-- <i class="klb-icon-shopping-bag"></i> -->
						  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22">
							<path d="M1.4,1.4h3.4c.2,0,.4.1.4.3l2.3,11.9c0,.2.2.3.4.3h13c.2,0,.3-.1.4-.3l2.3-9.7c0-.3-.1-.5-.4-.5H5.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
							<circle cx="8.8" cy="18.9" r="1.9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
							<circle cx="19.2" cy="18.9" r="1.9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
						  </svg>
						  <div class="site-action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'fynode'), $woocommerce->cart->cart_contents_count);?></div>
						</div><!-- site-action-icon -->
					</a>
                </div><!-- site-action-button -->  
				
		<?php }
	}
}