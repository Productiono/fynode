<?php
/*----------------------------
  Product Type List
 ----------------------------*/
if(!function_exists('fynode_product_type_list')){
	function fynode_product_type_list($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = '', $product_sku = '', $productattributes = ''){
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

		if( $product->is_type('variable') ) {
			$variation_ids = $product->get_visible_children();

			if($variation_ids[0]){
				$variation = wc_get_product( $variation_ids[0] );

				$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
			} else {
				$sale_price_dates_to = '';
			}
		} else {
			$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		}
		
		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s left in stock','fynode');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}

		$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';
		
		
		$output .= '<div class="product-wrapper product-background">';
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
		$output .= '<div class="product-content-wrapper">';
		$output .= '<div class="product-content-inner">';
		$output .= '<div class="product-brand">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="product-title"><a href="'.get_permalink().'" tabindex="0">'.get_the_title().'</a></h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span> ';       
		$output .= '</div><!-- product-content-inner -->';
		$output .= '<div class="product-buttons">';
			ob_start();
			do_action('fynode_wishlist_action');
			$output .= ob_get_clean();
		$output .= '</div><!-- product-buttons -->';
		if($short_desc){
			$output .= '<div class="product-description">';
			$output .= $short_desc;
			$output .= '</div>';
		}
		ob_start();
		woocommerce_template_loop_add_to_cart();
		$output .= ob_get_clean();;
		$output .= '</div><!-- product-content-wrapper -->';
		$output .= '<div class="product-content-footer">';
			ob_start();
			do_action('fynode_product_box_footer', $stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
			$output .= ob_get_clean();
		$output .= '</div><!-- product-content-footer -->';
		$output .= '</div><!-- product-inner -->';
		$output .= '</div><!-- product-wrapper -->';
			
		return $output;
	}
}