<?php

if ( ! function_exists( 'fynode_header_canvas_menu' ) ) {
	function fynode_header_canvas_menu(){
		$canvasmenu = get_theme_mod('fynode_canvas_menu','0');
			
		?>
		
		<div class="site-drawer menu-drawer">
			<div class="site-drawer-inner">
				<div class="site-drawer-row site-drawer-header flex items-center justify-between">
					<h3 class="entry-title"><?php esc_html_e('Menu','fynode'); ?></h3>
					<div class="site-close">
					  <a href="#">
						<i class="klb-icon-x"></i>
					  </a>
					</div><!-- site-close -->    
				</div><!-- site-drawer-row -->
				<div class="site-drawer-body">
					<div class="site-nav menu-vertical drawer-menu">
						<?php 
							wp_nav_menu(array(
							'theme_location' => 'main-menu',
							'container' => '',
							'fallback_cb' => 'show_top_menu',
							'menu_id' => '',
							'menu_class' => 'site-menu',
							'echo' => true,
							"walker" => '',
							'depth' => 0 
							));
						?>    
					</div><!-- site-nav -->     
				</div><!-- site-drawer-body -->
			</div><!-- site-drawer-inner -->
			<div class="site-drawer-overlay"></div>
		</div><!-- site-drawer --> 
		
		<?php
	
	}
}

add_action('wp_footer', 'fynode_header_canvas_menu');