<header id="masthead" class="site-header header-type1">
    <div class="site-header-row">
        <div class="container">
			<div class="site-header-inner d-flex align-items-center">
				<div class="column mobile-column">
					<div class="site-action-button">
						<a href="#" class="site-action-link toggle-button menu-toggle">
						  <div class="site-action-icon">
							<i class="klb-icon-menu"></i>
						  </div><!-- site-action-icon -->
						</a>
					</div><!-- site-action-button --> 
				</div><!-- column -->
				<div class="column brand-column">
					<div class="site-brand black">
						<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 
						
							<?php if($elementor_page){ ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if(isset(fynode_page_settings('logo')['url']) && !empty(fynode_page_settings('logo')['url']) ){ ?>
										<img src="<?php echo esc_url( fynode_page_settings('logo')['url'] ); ?>" alt="<?php bloginfo("name"); ?>">
									<?php } elseif (get_theme_mod( 'fynode_logo' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'fynode_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="site-brand-logo default">
									<?php } elseif (get_theme_mod( 'fynode_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'fynode_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-black.png" width="149" height="34" alt="<?php bloginfo("name"); ?>" class="site-brand-logo default">
									<?php } ?>
									
									<?php if( isset(fynode_page_settings('logo_light')['url']) && !empty(fynode_page_settings('logo_light')['url']) ){ ?>
										<img src="<?php echo esc_url( fynode_page_settings('logo_light')['url'] ); ?>" alt="<?php bloginfo("name"); ?>" class="site-brand-logo transparent">
									<?php } elseif (get_theme_mod( 'fynode_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'fynode_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="site-brand-logo transparent">
									<?php } ?>
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if (get_theme_mod( 'fynode_logo' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'fynode_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="site-brand-logo default">
									<?php } elseif (get_theme_mod( 'fynode_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'fynode_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-black.png" width="149" height="34" alt="<?php bloginfo("name"); ?>" class="site-brand-logo default">
									<?php } ?>
									
									
									<?php if (get_theme_mod( 'fynode_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'fynode_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="site-brand-logo transparent">
									<?php } ?>
								</a>
							<?php } ?>
					</div><!-- site-brand -->   

					<div class="site-nav menu-horizontal primary-menu">
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
				</div><!-- column -->
				<div class="column actions-column">
					<div class="site-actions">
						<?php fynode_header_search_input(); ?> 
						
						<?php fynode_account_icon(); ?>       
						
						<?php fynode_wishlist_icon(); ?>  
					
						<?php fynode_compare_icon(); ?>        
						
						<?php fynode_cart_icon(); ?>       
					</div><!-- site-actions -->
				</div><!-- column -->
				<div class="column mobile-column">
					<?php fynode_cart_icon(); ?>       
				</div><!-- column -->
			</div><!-- site-header-inner -->
        </div><!-- container -->
    </div><!-- site-header-row -->
</header><!-- site-header -->