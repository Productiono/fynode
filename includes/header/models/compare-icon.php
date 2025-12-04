<?php
if ( ! function_exists( 'fynode_compare_icon' ) ) {
	function fynode_compare_icon(){
	?>

	<?php $compareheader = get_theme_mod('fynode_header_compare',0); ?>
	<?php if($compareheader == 1){ ?>

		<?php if ( class_exists( 'KlbCompare' ) ) { ?>
			<div class="site-action-button action-compare">
				<a href="<?php echo KlbCompare::get_page_url(); ?>" class="site-action-link compare-toggle">
					<div class="site-action-icon">
					  <i class="klb-icon-repeat"></i>
					</div><!-- site-action-icon -->
				</a>
			</div><!-- site-action-button -->
		<?php } ?>
		
	<?php } ?>
	
	<?php 
	
	}
}