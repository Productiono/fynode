(function ($) {
  "use strict";

	$(document).on('fynodeShopPageInit', function () {
		fynodeThemeModule.drawerAnimation();
	});

	fynodeThemeModule.drawerAnimation = function() {
		
      const drawers = document.querySelectorAll('.site-drawer');

      const toggleButtons = document.querySelectorAll('.toggle-button');

      const closeButtons = document.querySelectorAll('.site-close a');
      const overlays = document.querySelectorAll('.site-drawer-overlay');

      const closeActiveDrawer = () => {
        drawers.forEach(drawer => drawer.classList.remove('active'));
        toggleButtons.forEach(btn => btn.classList.remove('active'));
        document.body.classList.remove('drawer-open');
      };

      toggleButtons.forEach(button => {
        button.addEventListener('click', (e) => {
          e.preventDefault();
          
          const buttonClasses = Array.from(button.classList);
          const toggleClass = buttonClasses.find(cls => cls.endsWith('-toggle'));
          const type = toggleClass.replace('-toggle', '');

          closeActiveDrawer();
          
          drawers.forEach(drawer => drawer.classList.remove('active'));
          toggleButtons.forEach(btn => btn.classList.remove('active'));
          
          button.classList.add('active');
          
          const targetDrawer = Array.from(drawers).find(drawer => 
            drawer.classList.contains(`${type}-drawer`)
          );
          
          if (targetDrawer) {
            targetDrawer.classList.add('active');
          }

          document.body.classList.add('drawer-open');
        });
      });

      closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', (e) => {
          e.preventDefault();
          closeActiveDrawer();
        });
      });

      overlays.forEach(overlay => {
        overlay.addEventListener('click', closeActiveDrawer);
      });

      document.addEventListener('click', (e) => {
        if (!e.target.closest('.site-drawer') && 
            !e.target.closest('.toggle-button')) {
          closeActiveDrawer();
        }
      });

		$(document.body).on('added_to_cart', function() {
			var button = document.querySelector(".toggle-button.cart-toggle");
			if (button) {
				button.click();
			}
		});

	}
	
	$(document).ready(function() {
		fynodeThemeModule.drawerAnimation();
	});

})(jQuery);
