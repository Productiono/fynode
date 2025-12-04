(function($) {

	fynodeThemeModule.ajaxLinks = '.widget_klb_product_categories a, .widget_product_status a, .remove-filter a, .widget_layered_nav a, .product-views-buttons a, .woocommerce-pagination a';

	fynodeThemeModule.ajaxFilters = function() {

		fynodeThemeModule.$document.pjax(fynodeThemeModule.ajaxLinks, '.main-content', {
			timeout       : 5000,
			scrollTo      : false,
			renderCallback: function(context, html, afterRender) {
				context.html(html);
				afterRender();
			}
		});

		fynodeThemeModule.$document.on('submit', '.widget_price_filter form', function(event) {
			$.pjax.submit(event, '.main-content');
			fynodeThemeModule.$document.trigger('fynodeShopPageInit');
		});

		fynodeThemeModule.$document.on('submit', '.widget_search_filter form', function(event) {
			$.pjax.submit(event, '.main-content');
			fynodeThemeModule.$document.trigger('fynodeShopPageInit');
		});

		fynodeThemeModule.$document.on('submit', 'form.woocommerce-widget-layered-nav-dropdown', function(event) {
			$.pjax.submit(event, '.main-content');
			fynodeThemeModule.$document.trigger('fynodeShopPageInit');
		});

		fynodeThemeModule.$document.on('pjax:error', function(xhr, textStatus, error) {
			console.log('pjax error ' + error);
		});

		fynodeThemeModule.$document.on('pjax:start', function() {

			scrollToTop(false);

			var $siteContent = $('.main-content');

			$siteContent.removeClass('ajax-loaded');
			$siteContent.addClass('ajax-loading');
			$(".main-content .primary-column .products, nav.woocommerce-pagination").hide();
			$('.main-content .primary-column .products').before('<svg class="loader-image preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');


     		const drawers = document.querySelectorAll('.site-drawer');
			const toggleButtons = document.querySelectorAll('.toggle-button');

	        drawers.forEach(drawer => drawer.classList.remove('active'));
	        toggleButtons.forEach(btn => btn.classList.remove('active'));
	        document.body.classList.remove('drawer-open');


			$('body').removeClass('drawer-open');
		});

		fynodeThemeModule.$document.on('pjax:complete', function() {

			$('.main-content').removeClass('ajax-loading');

			$('.loader-image.preloader').remove();
			
			fynodeThemeModule.$document.trigger('fynodeShopPageInit');
			
			$('.mobile-overlay').removeClass('active');
			$(".mobile-overlay").css({"opacity": "0", "visibility": "hidden"});

		});


		fynodeThemeModule.$document.on('pjax:end', function() {

			scrollToTop(false);

			var $siteContent = $('.main-content');

			$siteContent.removeClass('ajax-loading');
			$siteContent.addClass('ajax-loaded');
			
		});

		var scrollToTop = function(type) {
			if (fynode_settings.ajax_scroll === 'no' && type === false) {
				return false;
			}

			var $scrollTo = $(fynode_settings.ajax_scroll_class),
			    scrollTo  = $scrollTo.offset().top - fynode_settings.ajax_scroll_offset;

			$('html, body').stop().animate({
				scrollTop: scrollTo
			}, 400);
		};
	};

	$(document).ready(function() {
		fynodeThemeModule.ajaxFilters();
	});
})(jQuery);
