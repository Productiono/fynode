(function ($) {
  "use strict";

	$(document).on('fynodeShopPageInit', function () {
		fynodeThemeModule.countdown();
	});

  fynodeThemeModule.countdown = function () {
	$('.site-countdown').each(function () {
	  var $el = $(this);
	  var dateStr = $el.attr('data-date') || '';
	  var tz = $el.attr('data-timezone') || 'UTC';
	  var expiredText = $el.attr('data-text') || 'Expired';

	  // Validate timezone
	  if (!moment.tz.zone(tz)) {
		console.warn('[countdown] Invalid timezone:', tz, '› using UTC fallback.');
		tz = 'UTC';
	  }

	  // If only a date is provided (no time), use end of the day 23:59:59
	  if (/^\d{4}[-/]\d{2}[-/]\d{2}$/.test(dateStr)) {
		dateStr = dateStr.replace(/\//g, '-') + ' 23:59:59';
	  }

	  // Parse the date inside the selected timezone
	  var m = moment.tz(dateStr, [
		'YYYY-MM-DD HH:mm:ss',
		'YYYY-MM-DDTHH:mm:ss',
		'YYYY/MM/DD HH:mm:ss',
		'YYYY-MM-DD'
	  ], tz);

	  if (!m.isValid()) {
		console.warn('[countdown] Invalid date:', dateStr, 'TZ:', tz);
		return;
	  }


	  // Initialize countdown with UTC time for consistent behavior
	  $el.countdown(m.utc().toDate(), function (event) {
		$el.find('.days').html(event.strftime('%D'));
		$el.find('.hours').html(event.strftime('%H'));
		$el.find('.minutes').html(event.strftime('%M'));
		$el.find('.second, .seconds').html(event.strftime('%S'));
	  }).on('finish.countdown', function () {
		$el.find('.days,.hours,.minutes,.second,.seconds').text('00');
		$el.find('.countdown-separator').hide();
		$el.append('<span class="countdown-expired">' + expiredText + '</span>');
	  });
	});
  };
	
	$(document).ready(function() {
		fynodeThemeModule.countdown();
	});

})(jQuery);
