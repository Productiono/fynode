<?php

/*************************************************
## Main Footer Function
*************************************************/

add_action('fynode_main_footer','fynode_main_footer_function',20);

if ( ! function_exists( 'fynode_main_footer_function' ) ) {
	function fynode_main_footer_function(){
		
		get_template_part( 'includes/footer/footer-type1' );
		
	}
}