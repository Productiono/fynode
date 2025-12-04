(function ($) {
  "use strict";

  const FYNODE_THEME = {
    init: function () {
      this.dom();
      this.headerHeightCalculate();
      this.megaMenuWrap();
      this.drawerAnimation();
      this.mobileDropdownMenu();
      this.slider();
      this.countdown();
      this.hoverSlider();
      this.stickyCategory();
      this.productQuantity();
      this.themeLoginTab();
      this.themeMyAccountMenu();
      this.themeQuickView();
    },
    dom: function () {
      console.log("Fynode Theme");
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    },
    domReady: function (callback) {
      document.readyState === "complete" ? callback() : document.addEventListener("DOMContentLoaded", callback);
    },
    createElement: function (value, tag, attributes) {
      const element = document.createElement(tag);
      Object.assign(element, attributes);
      element.innerHTML = value;
      return element.firstElementChild;
    },
    wrap: function (element, target) {
      if (!element || !target) return;
      let wrapper;
      if (typeof target === "object" && target.nodeType === 1) {
        wrapper = target;
      } else {
        wrapper = this.createElement(target);
      }
      element.parentNode.insertBefore(wrapper, element);
      wrapper.appendChild(element);
      return wrapper;
    },
    headerHeightCalculate: function () {
      const header = document.querySelector('.site-header');
      const menuIsMain = header.querySelector('.header-main .primary-menu');
      const subHeader = document.querySelector('.site-header .header-sub');
      const announcement = document.querySelector('.site-announcement-bar');
      const root = document.documentElement;
      const mediaQuery = window.matchMedia('(min-width: 1024.02px)');
      const calculateHeight = () => {
        if (mediaQuery.matches) {
          let totalHeight = parseFloat(getComputedStyle(root).getPropertyValue('--theme-header-height-desktop'));
          if (subHeader && !menuIsMain) {
            totalHeight += subHeader.offsetHeight;
          }
          if (announcement) {
            totalHeight += announcement.offsetHeight;
          }
          header.style.setProperty('--header-height-desktop', `${totalHeight}px`);
        } else {
          header.style.removeProperty('--header-height-desktop');
        }
      };
      calculateHeight();
      mediaQuery.addEventListener('change', calculateHeight);
    },
    megaMenuWrap: function () {
      const menu = document.querySelectorAll('.site-nav.menu-horizontal .mega-menu > .sub-menu');
      if (menu !== null) {
        menu.forEach(item => {
          this.wrap(item, "<div class='sub-menu mega-sub-menu'></div>");
        });
      }
    },
    drawerAnimation: function () {
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
        button.addEventListener('click', e => {
          e.preventDefault();
          const buttonClasses = Array.from(button.classList);
          const toggleClass = buttonClasses.find(cls => cls.endsWith('-toggle'));
          const type = toggleClass.replace('-toggle', '');
          closeActiveDrawer();
          drawers.forEach(drawer => drawer.classList.remove('active'));
          toggleButtons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');
          const targetDrawer = Array.from(drawers).find(drawer => drawer.classList.contains(`${type}-drawer`));
          if (targetDrawer) {
            targetDrawer.classList.add('active');
          }
          document.body.classList.add('drawer-open');
        });
      });
      closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', e => {
          e.preventDefault();
          closeActiveDrawer();
        });
      });
      overlays.forEach(overlay => {
        overlay.addEventListener('click', closeActiveDrawer);
      });
      document.addEventListener('click', e => {
        if (!e.target.closest('.site-drawer') && !e.target.closest('.toggle-button')) {
          closeActiveDrawer();
        }
      });
    },
    mobileDropdownMenu: function () {
      const mobileQuery = window.matchMedia('(max-width: 1023px)');
      function calculateTotalHeight(submenu) {
        let totalHeight = submenu.scrollHeight;
        const activeNestedSubmenus = submenu.querySelectorAll('.active > .sub-menu');
        activeNestedSubmenus.forEach(nestedSubmenu => {
          totalHeight += nestedSubmenu.scrollHeight;
        });
        return totalHeight;
      }
      function initMobileMenu(e) {
        cleanup();
        if (!e.matches) return;
        const dropdownIcon = `
          <svg class="dropdown-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        `;
        const mobileMenu = document.querySelectorAll('.site-nav.menu-vertical');
        mobileMenu.forEach(menu => {
          const menuItemsWithChildren = menu.querySelectorAll('.menu-item-has-children');
          menuItemsWithChildren.forEach(menuItem => {
            const link = menuItem.querySelector('a');
            const wrapper = document.createElement('div');
            wrapper.className = 'menu-item-wrapper';
            link.parentNode.insertBefore(wrapper, link);
            wrapper.appendChild(link);
            const iconDiv = document.createElement('div');
            iconDiv.className = 'dropdown-icon-wrapper';
            iconDiv.innerHTML = dropdownIcon;
            wrapper.appendChild(iconDiv);
            const submenu = menuItem.querySelector('.sub-menu');
            const linkClickHandler = e => {
              if (link.getAttribute('href') === '#') {
                e.preventDefault();
                toggleSubmenu(menuItem, submenu);
              }
            };
            const iconClickHandler = e => {
              e.stopPropagation();
              toggleSubmenu(menuItem, submenu);
            };
            menuItem.mobileMenuHandlers = {
              link: linkClickHandler,
              icon: iconClickHandler
            };
            link.addEventListener('click', linkClickHandler);
            iconDiv.addEventListener('click', iconClickHandler);
          });
        });
      }
      function cleanup() {
        const mobileMenu = document.querySelectorAll('.site-nav.menu-vertical');
        mobileMenu.forEach(menu => {
          const menuItemsWithChildren = menu.querySelectorAll('.menu-item-has-children');
          menuItemsWithChildren.forEach(menuItem => {
            const wrapper = menuItem.querySelector('.menu-item-wrapper');
            if (wrapper) {
              const link = wrapper.querySelector('a');
              menuItem.insertBefore(link, wrapper);
              wrapper.remove();
            }
            if (menuItem.mobileMenuHandlers) {
              const link = menuItem.querySelector('a');
              link.removeEventListener('click', menuItem.mobileMenuHandlers.link);
              delete menuItem.mobileMenuHandlers;
            }
            menuItem.classList.remove('active');
            const submenu = menuItem.querySelector('.sub-menu');
            if (submenu) {
              submenu.style.maxHeight = '';
            }
          });
        });
      }
      function toggleSubmenu(menuItem, submenu) {
        if (!mobileQuery.matches) return;
        const isActive = menuItem.classList.contains('active');
        const activeSiblings = menuItem.parentElement.querySelectorAll('.menu-item.active');
        activeSiblings.forEach(sibling => {
          if (sibling !== menuItem) {
            sibling.classList.remove('active');
            const siblingSubmenu = sibling.querySelector('.sub-menu');
            if (siblingSubmenu) {
              siblingSubmenu.style.maxHeight = '0px';
            }
            const activeChildren = sibling.querySelectorAll('.active');
            activeChildren.forEach(child => {
              child.classList.remove('active');
              const childSubmenu = child.querySelector('.sub-menu');
              if (childSubmenu) {
                childSubmenu.style.maxHeight = '0px';
              }
            });
          }
        });
        if (!isActive) {
          menuItem.classList.add('active');
          if (submenu) {
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
            let parent = menuItem.parentElement.closest('.sub-menu');
            while (parent) {
              const totalHeight = calculateTotalHeight(parent);
              parent.style.maxHeight = totalHeight + 'px';
              parent = parent.parentElement.closest('.sub-menu');
            }
          }
        } else {
          menuItem.classList.remove('active');
          if (submenu) {
            submenu.style.maxHeight = '0px';
            let parent = menuItem.parentElement.closest('.sub-menu');
            while (parent) {
              const totalHeight = calculateTotalHeight(parent);
              parent.style.maxHeight = totalHeight + 'px';
              parent = parent.parentElement.closest('.sub-menu');
            }
          }
          const activeChildren = menuItem.querySelectorAll('.active');
          activeChildren.forEach(child => {
            child.classList.remove('active');
            const childSubmenu = child.querySelector('.sub-menu');
            if (childSubmenu) {
              childSubmenu.style.maxHeight = '0px';
            }
          });
        }
      }
      document.addEventListener('DOMContentLoaded', () => {
        initMobileMenu(mobileQuery);
        try {
          mobileQuery.addEventListener('change', initMobileMenu);
        } catch (e1) {
          try {
            mobileQuery.addListener(initMobileMenu);
          } catch (e2) {
            console.error('Could not add media query listener:', e2);
          }
        }
      });
    },
    slider: function () {
      const container = document.querySelectorAll('.site-slider');
      container.forEach(slider => {
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
          responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: slider_items_tablet,
              slidesToScroll: slider_items_to_tablet,
              arrows: slider_arrows_tablet,
              dots: slider_dots_tablet
            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: slider_items_mobile,
              slidesToScroll: slider_items_to_mobile,
              arrows: slider_arrows_mobile,
              dots: slider_dots_mobile
            }
          }, {
            breakpoint: 320,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          }]
        };
        $(slider).not('.slick-initialized').slick(args);
      });
    },
    countdown: function () {
      $('.site-countdown').each(function () {
        let $this = $(this);
        let currentDate = $(this).data('date');
        let currentTimeZone = $(this).data('timezone');
        let $days = $this.find('.days');
        let $hours = $this.find('.hours');
        let $minutes = $this.find('.minutes');
        let $second = $this.find('.second');
        let finalDate = moment.tz(currentDate, currentTimeZone);
        $this.countdown(finalDate.toDate(), function (event) {
          $days.html(event.strftime('%D'));
          $hours.html(event.strftime('%H'));
          $minutes.html(event.strftime('%M'));
          $second.html(event.strftime('%S'));
        });
      });
    },
    hoverSlider: function () {
      const container = document.querySelectorAll('.hover-gallery-slider');
      if (container !== null) {
        container.forEach(self => {
          const slider = new HoverSlider({
            selector: self,
            debug: false,
            duration: Number(0.4),
            delay: Number(0),
            easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
          });
        });
      }
    },
    stickyCategory: function () {
      const block = document.querySelector('.site-sticky-category');
      if (block !== null) {
        const handleScroll = () => {
          const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          const scrollHeight = document.documentElement.scrollHeight;
          const clientHeight = document.documentElement.clientHeight;
          const distanceFromBottom = scrollHeight - (scrollTop + clientHeight);

          // Add/remove disable class when at top or near bottom
          if (scrollTop === 0 || distanceFromBottom <= 100) {
            block.classList.add('disable');
            block.classList.remove('active'); // Remove active class when disabled
          } else {
            block.classList.remove('disable');
            // Only add active class if not disabled and scrolled past 100px
            if (scrollTop > 100) {
              block.classList.add('active');
            } else {
              block.classList.remove('active');
            }
          }
        };

        // Initial check
        handleScroll();

        // Add scroll event listener
        window.addEventListener('scroll', handleScroll);
      }
    },
    productQuantity: function () {
      const themeAjaxQuantity = (event, target) => {
        const block = document.querySelectorAll('.cart-with-quantity');
        if (block !== null) {
          for (var i = 0; i < block.length; i++) {
            const self = block[i];
            const button = self.querySelector('.add-to-cart-quantity');
            const quantity = self.querySelector('.ajax-quantity');
            const addQty = () => {
              quantity.style.cssText = `display: flex`;
            };
            button.addEventListener('click', e => {
              e.preventDefault();
              e.target.closest('A').style.cssText = `display: none`;
              addQty();
            });
            if (Number(event) === 0) {
              const parentDiv = target.closest('.quantity.ajax-quantity');
              const targetCartButton = target.closest('.cart-with-quantity').querySelector('.add-to-cart-quantity');
              targetCartButton.style.cssText = `display: inline-flex`;
              parentDiv.style.cssText = `display: none !important`;
            }
          }
        }
      };
      const container = document.querySelectorAll('.quantity');
      if (container !== null) {
        for (var i = 0; i < container.length; i++) {
          const self = container[i];
          const changeQuantity = () => {
            const buttons = self.querySelectorAll('.quantity-button');
            if (buttons !== null) {
              buttons.forEach(button => {
                const qty_input = self.querySelector('.input-text.qty');
                if (qty_input.disabled) return;
                let qty_step = parseFloat(qty_input.getAttribute('step'));
                let qty_min = parseFloat(qty_input.getAttribute('min'));
                let qty_max = parseFloat(qty_input.getAttribute('max'));
                button.addEventListener('click', e => {
                  if (e.target.closest('DIV').classList.contains('minus')) {
                    let oldValue = parseFloat(qty_input.value);
                    if (isNaN(oldValue)) {
                      qty_input.val = 0;
                    }
                    qty_input.value = oldValue - qty_step < qty_min ? qty_min : oldValue - qty_step;
                  } else {
                    let oldValue = parseFloat(qty_input.value);
                    if (isNaN(oldValue)) {
                      qty_input.val = 0;
                    }
                    qty_input.value = oldValue + qty_step > qty_max ? qty_max : oldValue + qty_step;
                  }
                  qty_input.addEventListener('change', () => {
                    themeAjaxQuantity(qty_input.value, e.target);
                    if (self.classList.contains('ajax-quantity') && qty_input.value === '0') {
                      qty_input.value = 1;
                    }
                  });
                  qty_input.dispatchEvent(new Event('change'));
                });
              });
            }
          };
          changeQuantity();
          if (!self.classList.contains('ajax-quantity')) {
            $('body').on('updated_cart_totals', changeQuantity);
          }
        }
      }
    },
    themeLoginTab: function () {
      const tab = document.querySelectorAll('.login-page-tab li');
      const form = document.querySelector('.login-form-container');
      if (tab !== null && form !== null) {
        const removeClass = () => {
          for (var i = 0; i < tab.length; i++) {
            if (tab[i].children[0].classList.contains('active')) {
              tab[i].children[0].classList.remove('active');
            }
          }
        };
        for (var i = 0; i < tab.length; i++) {
          const button = tab[i].children[0];
          button.addEventListener('click', event => {
            event.preventDefault();
            if (!event.target.classList.contains('active')) {
              removeClass();
              event.target.classList.add('active');
              form.classList.toggle('show-register-form');
            }
          });
        }
      }
    },
    themeMyAccountMenu() {
      const button = document.querySelector('.user-menu-toggle a');
      const accountMenu = document.querySelector('.my-account-navigation');
      if (button !== null || accountMenu !== null) {
        button.addEventListener('click', e => {
          e.preventDefault();
          accountMenu.classList.toggle('active');
        });
      }
    },
    themeQuickView() {
      const button = document.querySelectorAll('.product-quickview a');
      if (button !== null) {
        for (var i = 0; i < button.length; i++) {
          const self = button[i];
          $(self).magnificPopup({
            type: 'inline'
          });
        }
      }
    }
  };
  FYNODE_THEME.init();
})(jQuery);