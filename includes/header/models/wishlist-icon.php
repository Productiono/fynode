<?php
if ( ! function_exists( 'fynode_wishlist_icon' ) ) {
	function fynode_wishlist_icon(){
	?>

	<?php $wishlistheader = get_theme_mod('fynode_header_wishlist',0); ?>
	<?php if($wishlistheader == 1){ ?>
	
		<?php if ( class_exists( 'KlbWishlist' ) ) { ?>	
			<div class="site-action-button">
				<a href="<?php echo KlbWishlist::get_url(); ?>" class="site-action-link toggle-button wishlist-toggle">
					<div class="site-action-icon">
					  <i class="klb-icon-hearth"></i>
					  <div class="site-action-count klbwl-wishlist-count"><?php echo KlbWishlist::get_count(); ?></div>
					</div><!-- site-action-icon -->
				</a>
			</div><!-- site-action-button --> 
		<?php } ?>
		
	<?php } ?>
	
	<?php 
	
	}
}