(function ($) {
  "use strict";

	$(document).on('fynodeShopPageInit added_to_cart', function () {
		fynodeThemeModule.widgetlayerednavDropdown();
	});

	fynodeThemeModule.widgetlayerednavDropdown = function() {
		
		$( 'select.woocommerce-widget-layered-nav-dropdown' ).on( 'change', function() {
			var slug = $( this ).val();
			
			var taxonomyfiltername = $(this).closest('form').find('input').attr('name');
			$(this).closest('form').find('input[name='+taxonomyfiltername+']').val( slug  );
			// Submit form on change if standard dropdown.
			if ( ! $( this ).attr( 'multiple' ) ) {
				$( this ).closest( 'form' ).trigger( 'submit' );
			}
		});
		
	}
	
	$(document).ready(function() {
		fynodeThemeModule.widgetlayerednavDropdown();
	});

})(jQuery);
