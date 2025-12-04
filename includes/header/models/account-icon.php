<?php

if ( ! function_exists( 'fynode_account_icon' ) ) {
	function fynode_account_icon(){
		$headersearch = get_theme_mod('fynode_header_account','0');
		if($headersearch == 1){
						
		?>
			<div class="site-action-button action-account">
				<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="site-action-link">
					<div class="site-action-icon">
					  <!-- <i class="klb-icon-user-circle"></i> -->
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path d="M18.5,19.3c-1.5-2-4-3.3-6.5-3.3-2.6,0-5,1.2-6.5,3.3M18.5,19.3c4.1-3.6,4.4-9.8.8-13.9-3.6-4.1-9.8-4.4-13.9-.8-4.1,3.6-4.4,9.8-.8,13.9.3.3.5.6.8.8M18.5,19.3c-1.8,1.6-4.1,2.5-6.5,2.5-2.4,0-4.7-.9-6.5-2.5M15.3,9.5c0,1.8-1.5,3.3-3.3,3.3s-3.3-1.5-3.3-3.3,1.5-3.3,3.3-3.3,3.3,1.5,3.3,3.3Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"/>
					  </svg>
					</div><!-- site-action-icon -->
					<div class="site-action-label">
					  <!-- <span>Welcome</span> -->
					  <p><?php esc_html_e('Account','fynode'); ?></p>
					</div><!-- site-action-label -->
				</a>
			</div><!-- site-action-button --> 
	<?php  }
	}
}