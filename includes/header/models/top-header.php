<?php
if ( ! function_exists( 'fynode_top_header' ) ) {
	function fynode_top_header(){
			
		if(fynode_page_settings('page_top_header','0') == 1) { ?>	
			<?php $headertopheader = get_theme_mod('fynode_top_header_title'); ?>
			<?php if($headertopheader){ ?>

				<div class="site-announcement-bar top-header">
					<div class="container">
						<div class="site-announcement-bar-inner d-flex align-items-center justify-content-between">
							<div class="column announcement-extra left">
								<?php if(get_theme_mod('fynode_top_left_menu','0') == 1){ ?>
									<div class="site-nav menu-horizontal announcement-menu-left">
										<?php 
											wp_nav_menu(array(
											'theme_location' => 'top-left-menu',
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
								<?php } ?>	
							</div><!-- column -->
							<div class="column announcement-messages center">
								<div class="site-slider text-style loader-default" data-items="1" data-items-tablet="1" data-items-mobile="1" data-itemsscroll="1" data-speed="600" data-arrows="true" data-dots="false" data-loop="false" data-autoplay="true" data-autoplay-speed="5000" data-infinite="true">
									<?php foreach($headertopheader as $f){ ?>
									  <div class="site-slider-item">
										<div class="announcement-message">
										  <p><?php echo esc_html($f['header_title']); ?></p>
										  <a href="<?php echo esc_url($f['header_btn_url']); ?>" class="btn btn-link"><?php echo esc_html($f['header_btn_title']); ?> <i class="klb-icon-move-right"></i></a>
										</div><!-- announcement-message -->
									  </div><!-- site-slider-item -->
									<?php } ?>	
								</div><!-- site-slider -->
							</div><!-- column -->
							<div class="column announcement-extra right">
								<?php if(get_theme_mod('fynode_top_right_menu','0') == 1){ ?>
									<div class="site-nav menu-horizontal announcement-menu-right">
										<?php 
											wp_nav_menu(array(
											'theme_location' => 'top-right-menu',
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
								<?php } ?>
							</div><!-- column -->
						</div><!-- site-announcement-bar-inner -->
					</div><!-- container -->
				</div><!-- site-announcement-bar -->
			<?php } ?>
		<?php } elseif(get_theme_mod('fynode_top_header_toggle','0') == 1) { ?>
			<?php $headertopheader = get_theme_mod('fynode_top_header_title'); ?>
			<?php if($headertopheader){ ?>
			
				<div class="site-announcement-bar top-header">
					<div class="container">
						<div class="site-announcement-bar-inner d-flex align-items-center justify-content-between">
							<div class="column announcement-extra left">
								<?php if(get_theme_mod('fynode_top_left_menu','0') == 1){ ?>
									<div class="site-nav menu-horizontal announcement-menu-left">
										<?php 
											wp_nav_menu(array(
											'theme_location' => 'top-left-menu',
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
								<?php } ?>		
							</div><!-- column -->
							<div class="column announcement-messages center">
								<div class="site-slider text-style loader-default" data-items="1" data-items-tablet="1" data-items-mobile="1" data-itemsscroll="1" data-speed="600" data-arrows="true" data-dots="false" data-loop="false" data-autoplay="true" data-autoplay-speed="5000" data-infinite="true">
									<?php foreach($headertopheader as $f){ ?>
									  <div class="site-slider-item">
										<div class="announcement-message">
										  <p><?php echo esc_html($f['header_title']); ?></p>
										  <a href="<?php echo esc_url($f['header_btn_url']); ?>" class="btn btn-link"><?php echo esc_html($f['header_btn_title']); ?> <i class="klb-icon-move-right"></i></a>
										</div><!-- announcement-message -->
									  </div><!-- site-slider-item -->
									<?php } ?>	
								</div><!-- site-slider -->
							</div><!-- column -->
							<div class="column announcement-extra right">
								<?php if(get_theme_mod('fynode_top_right_menu','0') == 1){ ?>
									<div class="site-nav menu-horizontal announcement-menu-right">
										<?php 
											wp_nav_menu(array(
											'theme_location' => 'top-right-menu',
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
								<?php } ?>
							</div><!-- column -->
						</div><!-- site-announcement-bar-inner -->
					</div><!-- container -->
				</div><!-- site-announcement-bar -->
			<?php } ?>
		<?php }
	}
}
add_action('wp_body_open', 'fynode_top_header');