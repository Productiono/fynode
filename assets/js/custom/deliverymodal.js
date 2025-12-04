(function ($) {
  "use strict";

	fynodeThemeModule.deliverymodal = function() {
		
		const button = document.querySelector('.product-extra-link a.product-delivery-button');
		const container = document.querySelector('.site-delivery-box-holder');
		const close = document.querySelector( '.site-delivery-box-holder .delivery-box-close' );
		const mask = document.querySelector( '.site-delivery-box-holder .delivery-box-mask' );

		  if (container !== null) {
			if (button !== null) {
			  button.addEventListener('click', function(e) {
				e.preventDefault();
				container.classList.add('active');
			  });
			}

			close.addEventListener('click', function(e) {
			  e.preventDefault();
			  container.classList.remove('active');
			});

			mask.addEventListener('click', function(e) {
			  e.preventDefault();
			  container.classList.remove('active');
			});
		}
	}
	
	$(document).ready(function() {
		fynodeThemeModule.deliverymodal();
	});

})(jQuery);
