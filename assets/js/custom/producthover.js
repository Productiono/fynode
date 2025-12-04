(function ($) {
  "use strict";

	$(document).on('fynodeShopPageInit added_to_cart', function () {
		fynodeThemeModule.producthover();
	});

	fynodeThemeModule.producthover = function() {
		const container = document.querySelectorAll('.hover-gallery-slider');
		if (container !== null) {
			container.forEach(self => {
			  const slider = new HoverSlider({
				selector: self,
				debug: false,
				duration: Number(0.4),
				delay: Number(0),
				easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
			  });
			});
		}
		
	}
	
	$(document).ready(function() {
		fynodeThemeModule.producthover();
	});

})(jQuery);
