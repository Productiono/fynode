(function ($) {
  "use strict";

	$(document).on('fynodeShopPageInit', function () {
		fynodeThemeModule.siteslider();
	});

	fynodeThemeModule.siteslider = function() {
		const container = document.querySelectorAll('.site-slider');
		  container.forEach((slider) => {
			let slider_items = $(slider).data('items') || 4;
			let slider_items_tablet = $(slider).data('items-tablet') || 2;
			let slider_items_mobile = $(slider).data('items-mobile') || 1;
			let slider_items_to = $(slider).data('items-scroll') || 1;
			let slider_items_to_tablet = $(slider).data('items-scroll-tablet') || 1;
			let slider_items_to_mobile = $(slider).data('items-scroll-mobile') || 1;
			let slider_speed = $(slider).data('speed') || 900;

			let slider_arrows = $(slider).data('arrows') || true;
			let slider_arrows_tablet = $(slider).data('arrows-tablet') || true;
			let slider_arrows_mobile = $(slider).data('arrows-mobile') || true;
			let slider_dots = $(slider).data('dots') || false;
			let slider_dots_tablet = $(slider).data('dots-tablet') || false;
			let slider_dots_mobile = $(slider).data('dots-mobile') || false;

			let slider_loop = $(slider).data('infinite') || false;

			let slider_autoplay = $(slider).data('autoplay') || false;
			let slider_autoplay_speed = $(slider).data('autoplay-speed') || 3000;

			let slider_as_for_nav = $(slider).data('for') || false;
			let slider_focus_on_select = $(slider).data('focus') || false;

			let args = {
			  slidesToShow: slider_items,
			  slidesToScroll: slider_items_to,
			  speed: slider_speed,
			  arrows: slider_arrows,
			  dots: slider_dots,
			  asNavFor: slider_as_for_nav,
			  focusOnSelect: slider_focus_on_select,
			  touchThreshold: 100,
			  rows: 0,
			  fade: false,
			  infinite: slider_loop,
			  autoplay: slider_autoplay,
			  autoplaySpeed: slider_autoplay_speed,
			  prevArrow: '<button type="button" class="slick-nav slick-prev slick-button unset"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="17.2,22.4 6.8,12 17.2,1.6 "/></svg></button>',
			  nextArrow: '<button type="button" class="slick-nav slick-next slick-button unset"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="6.8,22.4 17.2,12 6.8,1.6 "/></svg></button>',
			  responsive: [
				{
				  breakpoint: 1024,
				  settings: {
					slidesToShow: slider_items_tablet,
					slidesToScroll: slider_items_to_tablet,
					arrows: slider_arrows_tablet,
					dots: slider_dots_tablet,
				  }
				},
				{
				  breakpoint: 768,
				  settings: {
					slidesToShow: slider_items_mobile,
					slidesToScroll: slider_items_to_mobile,
					arrows: slider_arrows_mobile,
					dots: slider_dots_mobile,
				  }
				},
				{
				  breakpoint: 320,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				  }
				},
			  ]
			};

			$(slider).not('.slick-initialized').slick(args);
		});
	}
	
	$(document).ready(function() {
		fynodeThemeModule.siteslider();
	});

})(jQuery);
