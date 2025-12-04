<footer class="site-footer">

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-4' )) { ?>

    <div class="site-footer-row footer-widgets">
        <div class="container">
			<div class="site-footer-inner">
				<div class="row gap-y-20">
					<?php if(get_theme_mod('fynode_footer_column') == '5columns'){ ?>
						<div class="col col-12 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-2">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-2">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div><!-- col -->
						
						<?php $subscribe = get_theme_mod('fynode_footer_subscribe_area',0); ?>
						<?php if($subscribe == 1){ ?>
							<div class="col col-12 col-md-6 col-lg-3">
								<div class="widget">
								  <h4 class="widget-title"><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_title')); ?></h4>
								  <div class="widget-body">
									<div class="site-newsletter-form">
									  <p><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_subtitle')); ?></p>
									  <?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('fynode_footer_subscribe_formid').'"]'); ?>
									</div><!-- site-newsletter-form -->
								  </div><!-- widget-body -->
								</div><!-- widget -->
							</div><!-- col -->
						<?php } ?>
					<?php } elseif(get_theme_mod('fynode_footer_column') == '3columns'){ ?>
						<div class="col col-12 col-md-6 col-lg-4">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-4">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div><!-- col -->
						
						<?php $subscribe = get_theme_mod('fynode_footer_subscribe_area',0); ?>
						<?php if($subscribe == 1){ ?>
							<div class="col col-12 col-md-6 col-lg-4">
								<div class="widget">
								  <h4 class="widget-title"><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_title')); ?></h4>
								  <div class="widget-body">
									<div class="site-newsletter-form">
									  <p><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_subtitle')); ?></p>
									  <?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('fynode_footer_subscribe_formid').'"]'); ?>
									</div><!-- site-newsletter-form -->
								  </div><!-- widget-body -->
								</div><!-- widget -->
							</div><!-- col -->
						<?php } else { ?>
							<div class="col col-12 col-md-6 col-lg-3">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div><!-- col -->
						<?php } ?>
					<?php } else { ?>
						<div class="col col-12 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div><!-- col -->
						
						<?php $subscribe = get_theme_mod('fynode_footer_subscribe_area',0); ?>
						<?php if($subscribe == 1){ ?>
							<div class="col col-12 col-md-6 col-lg-3">
								<div class="widget">
								  <h4 class="widget-title"><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_title')); ?></h4>
								  <div class="widget-body">
									<div class="site-newsletter-form">
									  <p><?php echo fynode_sanitize_data(get_theme_mod('fynode_footer_subscribe_subtitle')); ?></p>
									  <?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('fynode_footer_subscribe_formid').'"]'); ?>
									</div><!-- site-newsletter-form -->
								  </div><!-- widget-body -->
								</div><!-- widget -->
							</div><!-- col -->
						<?php } else { ?>
							<div class="col col-12 col-md-6 col-lg-3">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div><!-- col -->
						<?php } ?>
					<?php } ?>
					
				</div><!-- row -->
			</div><!-- site-footer-inner -->
        </div><!-- container -->
    </div><!-- site-footer-row -->
<?php } ?>
	
    <div class="site-row footer-copyright">
        <div class="container">
			<div class="site-footer-inner">
				<?php if(get_theme_mod( 'fynode_copyright' )){ ?>
					<p class="site-copyright"><?php echo fynode_sanitize_data(str_replace( '[year]', date('Y'), get_theme_mod( 'fynode_copyright' ) )); ?></p>
				<?php } ?> 
				
				<?php $footerpayment = get_theme_mod('fynode_footer_payment_repeater',0); ?>
				<?php if($footerpayment){ ?>
				
					<div class="site-payment-cards">
					  <ul>
						<?php foreach($footerpayment as $f){ ?>
							<?php if($f['payment_image']){ ?>
								<li>
								  <img src="<?php echo esc_url( fynode_get_image($f['payment_image'])); ?>" alt="<?php esc_attr_e('payment','fynode'); ?>"/>           
								</li>
							<?php } ?>
						<?php } ?>
					  </ul>
					</div><!-- site-payment-cards -->
				<?php } ?>
				
			</div><!-- site-footer-inner -->
        </div><!-- container -->
    </div><!-- site-row -->
</footer><!-- site-footer -->