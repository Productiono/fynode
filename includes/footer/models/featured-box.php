<?php $featured_box = get_theme_mod('fynode_footer_featured_box'); ?>
	<?php if($featured_box){ ?>
		
	<div class="container">		
		<div class="section-padding border-top section-margin" style="--padding-top-mobile: 40px; --padding-top-tablet: 40px; --padding-top-desktop: 60px;">
			<div class="site-slider carousel-style loader-default gap-base" data-items="4" data-items-tablet="3" data-items-mobile="1" data-itemsscroll="1" data-speed="600" data-arrows="false" data-dots="false" data-dots-tablet="true" data-dots-mobile="true" data-loop="false">
				
				<?php foreach($featured_box as $featured){ ?>
					<div class="site-slider-item">
					  <div class="site-iconbox horizontal">
						<div class="site-iconbox-icon">
							<img src="<?php echo esc_url( fynode_get_image($featured['featured_image'])); ?>"/>   
						</div>
						<div class="site-iconbox-content">
						  <h4 class="entry-title"><?php echo esc_html($featured['featured_title']); ?></h4>
						  <div class="entry-description"><p><?php echo fynode_sanitize_data($featured['featured_desc']); ?></p></div>
						</div><!-- site-iconbox-content -->
					  </div><!-- site-iconbox -->
					</div><!-- site-slider-item -->
				<?php } ?>
				
			</div><!-- site-slider -->  
		</div>
	</div>
<?php } ?>		