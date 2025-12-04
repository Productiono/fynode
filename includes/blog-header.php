<div class="site-page-header style-1">
	<div class="container">
	  <div class="site-page-header-inner">
		<?php $breadcrumb_title = get_theme_mod('fynode_blog_breadcrumb_title'); ?>
		<?php if($breadcrumb_title){ ?>
			<h1 class="entry-title"><?php echo esc_html($breadcrumb_title); ?></h1>
		<?php } else { ?>
			<h1 class="entry-title"><?php echo esc_html_e('Our News','fynode'); ?></h1>
		<?php } ?>			
		<div class="entry-description">
		  <p><?php echo fynode_sanitize_data(get_theme_mod('fynode_blog_breadcrumb_desc')); ?></p>
		</div><!-- New Arrival -->
	  </div><!-- site-page-header-inner -->
	</div><!-- container -->
</div>