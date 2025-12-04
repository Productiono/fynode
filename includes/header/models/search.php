<?php

if ( ! function_exists( 'fynode_header_search_input' ) ) {
	function fynode_header_search_input(){
		$headersearch = get_theme_mod('fynode_header_search','0');
		if($headersearch == 1){
		?>
			<div class="site-action-button">
				<a href="#" class="site-action-link toggle-button search-toggle">
					<div class="site-action-icon">
					  <i class="klb-icon-search"></i>
					</div><!-- site-action-icon -->
				</a>
			</div><!-- site-action-button -->  
			
	<?php  }
	}
}