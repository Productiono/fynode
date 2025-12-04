/* global fynode_settings */
(function($) {
	fynodeThemeModule.$document.on('fynodeShopPageInit', function() {
		fynodeThemeModule.sortByWidget();
	});

	fynodeThemeModule.sortByWidget = function() {
		var $wcOrdering = $('.woocommerce-ordering');

		$wcOrdering.on('change', 'select.orderby', function() {
			var $form = $(this).closest('form');
			$form.find('[name="_pjax"]').remove();

			$.pjax({
				container: '.main-content',
				timeout  : fynode_settings.pjax_timeout,
				url      : '?' + $form.serialize(),
				scrollTo : false,
				renderCallback: function(context, html, afterRender) {
					context.html(html);
					afterRender();
				}
			});
		});

		$wcOrdering.on('submit', function(e) {
			e.preventDefault(e);
		});
	};

	$(document).ready(function() {
		fynodeThemeModule.sortByWidget();
	});
})(jQuery);
