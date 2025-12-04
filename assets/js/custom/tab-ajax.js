jQuery(document).ready(function($) {
	"use strict";

	$(document).on('click', '.site-module-tabs li:not(active) a', function(event){
		event.preventDefault(); 
		
		var $thisbutton = $(this);
		var $action = 'tab_view';
		var $find = $(this).closest('.klb-module').find('.klb-products-tab .products');
		
        var data = {
			cache: false,
            action: $action,
			beforeSend: function() {
				$($thisbutton).closest('.klb-module').find('.klb-products-tab .products').append('<svg class="tab-ajax loader-image preloader quick-view" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
			},
			'catid': $(this).attr('id'),
			'items': $find.data('items'),
			'mobile': $find.data('mobileitems'),
			'tablet': $find.data('tabletitems'),
			'speed': $find.data('speed'),
			'post_count': $find.data('perpage'),
			'dots': $find.data('dots'),
			'arrows': $find.data('arrows'),
			'autoplay': $find.data('autoplay'),
			'autospeed': $find.data('autospeed'),
			'producttype': $find.data('producttype'),
			'productclass': $find.attr('class').replace(/slick-(\S+)/g,''),
			'best_selling': $find.data('best_selling'),
			'featured': $find.data('featured'),
			'on_sale': $find.data('onsale'),
			'stockprogressbar': $find.data('stockprogressbar'),
			'countdown': $find.data('countdown'),
			'stockstatus': $find.data('stockstatus'),
			'shippingclass': $find.data('shippingclass'),
			'product_sku': $find.data('product_sku'),
			'productattributes': $find.data('productattributes'),
			'hideoutofstock': $find.data('hideoutofstock'),
        };
		

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$($thisbutton).closest('.klb-module').find('.klb-products-tab').html(response);

		    $thisbutton.closest('.site-module-tabs').find('.header-tab-link').removeClass('active');
		    $thisbutton.closest('.header-tab-link').addClass('active');


			fynodeThemeModule.siteslider();
	
			fynodeThemeModule.countdown();
			
			fynodeThemeModule.producthover();

			fynodeThemeModule.productquantity();
			
			fynodeThemeModule.variationform();	
			
        });
    });	

});