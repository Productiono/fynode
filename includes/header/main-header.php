<?php

/*************************************************
## Fynode Theme options
*************************************************/
require_once get_template_directory() . '/includes/header/models/search.php';
require_once get_template_directory() . '/includes/header/models/search-holder.php';
require_once get_template_directory() . '/includes/header/models/cart.php';
require_once get_template_directory() . '/includes/header/models/cart-holder.php';
require_once get_template_directory() . '/includes/header/models/wishlist-icon.php';
require_once get_template_directory() . '/includes/header/models/wishlist-holder.php';
require_once get_template_directory() . '/includes/header/models/compare-icon.php';
require_once get_template_directory() . '/includes/header/models/account-icon.php';
require_once get_template_directory() . '/includes/header/models/canvas-menu.php';
require_once get_template_directory() . '/includes/header/models/canvas-categories.php';
require_once get_template_directory() . '/includes/header/models/top-header.php';
require_once get_template_directory() . '/includes/header/models/sticky-category.php';
/*************************************************
## Main Header Function
*************************************************/

add_action('fynode_main_header','fynode_main_header_function',20);

if ( ! function_exists( 'fynode_main_header_function' ) ) {
	function fynode_main_header_function(){
		
		if(fynode_page_settings('page_header_type') == 'type2') {
			
			get_template_part( 'includes/header/header-type2' );
			
		} elseif(fynode_page_settings('page_header_type') == 'type1') {
			
			get_template_part( 'includes/header/header-type1' );
			
		} elseif(get_theme_mod('fynode_header_type') == 'type2'){
			
			get_template_part( 'includes/header/header-type2' );
			
		} else {
			
			get_template_part( 'includes/header/header-type1' );
			
		}
		
	}
}
