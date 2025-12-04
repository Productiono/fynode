<?php
/*----------------------------
  Product Type 1
 ----------------------------*/
if(!function_exists('fynode_product_type1')){
	function fynode_product_type1($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = '', $product_sku = '', $productattributes = ''){
		global $product;
		global $post;
		global $woocommerce;
		
		
		$output = '';
		
		$id = get_the_ID();
		$allproduct = wc_get_product( get_the_ID() );

		$cart_url = wc_get_cart_url();
		$price = $allproduct->get_price_html();
		$weight = $product->get_weight();
		$stock_status = $product->get_stock_status();
		$stock_text = $product->get_availability();
		$short_desc = $product->get_short_description();
		$rating = wc_get_rating_html($product->get_average_rating());
		$ratingcount = $product->get_review_count();
		$ratingaverage  = $product->get_average_rating();


		$wishlist = get_theme_mod( 'fynode_wishlist_button', '0' );
		$compare = get_theme_mod( 'fynode_compare_button', '0' );
		$quickview = get_theme_mod( 'fynode_quick_view_button', '0' );

		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s unit left','fynode');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}
		
		$total_sales = $product->get_total_sales();
		$total_stock = $total_sales + $stock_quantity;
		
		if($managestock && $stock_quantity > 0) {
		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
		}
		
		$gallery = get_theme_mod('fynode_product_hover_gallery') == 1 ? 'product-thumbnail' : '';
			
			$output .= '<div class="product-wrapper product-background product-type-1">';
			$output .= '<div class="product-inner">';
			$output .= '<div class="product-thumbnail-wrapper">';
			$output .= fynode_sale_percentage();
			if($ratingcount){	
				$output .= '<div class="product-rating simple">';
				$output .= '<div class="rating-count">';
				$output .= '<i class="klb-icon-star-solid"></i>';
				$output .= '<span class="count-text"><strong>'.esc_html($ratingaverage).'</strong></span>';
				$output .= '</div><!-- rating-count -->';
				$output .= '</div><!-- product-rating -->';       
			}
			$output .= '<div class="product-buttons">';
				$output .= fynode_quickview();
			
				ob_start();
				do_action('fynode_compare_action');
				$output .= ob_get_clean();
			$output .= '</div><!-- product-buttons -->';
			$output .= '<div class="product-thumbnail">';
				ob_start();
				$output .= fynode_product_second_image();
				$output .= ob_get_clean();
			$output .= '</div><!-- product-thumbnail -->';
			$output .= '<div class="product-cart-button">';
				ob_start();
				woocommerce_template_loop_add_to_cart();
				$output .= ob_get_clean();;
			$output .= '</div><!-- product-cart-button -->';
			$output .= '</div><!-- product-thumbnail-wrapper -->';
			$output .= '<div class="product-content-header">';
				ob_start();
				do_action('fynode_after_shop_loop_item_image');
				$output .= ob_get_clean();
			$output .= '</div><!-- product-content-header -->';
			$output .= '<div class="product-content-wrapper">';
			$output .= '<div class="product-content-inner">';
			$output .= '<div class="product-brand">';
			$output .= wc_get_product_category_list($product->get_id(), '');
			$output .= '</div>';
			$output .= '<h2 class="product-title"><a href="'.get_permalink().'" tabindex="0">'.get_the_title().'</a></h2>';
			$output .= '<span class="price">';
			$output .= $price;
			$output .= '</span>';
			$output .= '</div><!-- product-content-inner -->';
			$output .= '<div class="product-buttons">';
				ob_start();
				do_action('fynode_wishlist_action');
				$output .= ob_get_clean();
			$output .= '</div><!-- product-buttons -->';
			$output .= '</div><!-- product-content-wrapper -->';
			
			$output .= '<div class="product-content-footer">';
				ob_start();
				do_action('fynode_product_box_footer', $stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
				$output .= ob_get_clean();
			$output .= '</div><!-- product-content-footer -->';
			$output .= '</div><!-- product-inner -->';
			$output .= '</div><!-- product-wrapper -->';
			
			ob_start();
			do_action('fynode_after_product_box');
			$output .= ob_get_clean();
			
		return $output;
	}
}