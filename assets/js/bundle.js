(function ($) {
  "use strict";

  const FYNODE_THEME = {
    init: function () {
      this.dom();
      this.headerHeightCalculate();
      this.megaMenuWrap();
      this.mobileDropdownMenu();
      this.hoverSlider();
      this.stickyCategory();
      this.themeMyAccountMenu();
    },
    dom: function () {
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    },
    domReady: function(callback) {
      document.readyState === "complete" ? callback() : document.addEventListener("DOMContentLoaded", callback);
    },
    createElement: function (value, tag, attributes) {
      const element = document.createElement(tag);
      Object.assign(element, attributes);
      element.innerHTML = value;

      return element.firstElementChild;
    },
    wrap: function(element, target) {
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
    headerHeightCalculate: function() {
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
      }

      calculateHeight();
      mediaQuery.addEventListener('change', calculateHeight);
    },
    megaMenuWrap: function() {
      const menu = document.querySelectorAll('.site-nav.menu-horizontal .mega-menu > .sub-menu');

      if (menu !== null) {
        menu.forEach((item) => {
          this.wrap(item, "<div class='sub-menu mega-sub-menu'></div>");
        })
      }
    },
    mobileDropdownMenu: function() {
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
        mobileMenu.forEach((menu) => {
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
            
            const linkClickHandler = (e) => {
              if (link.getAttribute('href') === '#') {
                e.preventDefault();
                toggleSubmenu(menuItem, submenu);
              }
            };
            
            const iconClickHandler = (e) => {
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
        })
      }

      function cleanup() {
        const mobileMenu = document.querySelectorAll('.site-nav.menu-vertical');
        mobileMenu.forEach((menu) => {
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
    hoverSlider: function() {
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
    },
    stickyCategory: function() {
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
    themeMyAccountMenu() {
      const button = document.querySelector('.user-menu-toggle a');
      const accountMenu = document.querySelector('.my-account-navigation');

      if (button !== null || accountMenu !== null) {
        button.addEventListener('click', (e) => {
          e.preventDefault();
          accountMenu.classList.toggle('active');
        })
      }
    },
  }

  FYNODE_THEME.init();
	$(window).load(function(){
		$('.site-loading').fadeOut('slow',function(){$(this).remove();});
	});
	
	$(window).scroll(function() {
        $(this).scrollTop() > 135 ? $("header.site-header").addClass("sticky-header") : $("header.site-header").removeClass("sticky-header")
    });
	
}(jQuery));