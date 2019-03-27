/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/single_custom.js":
/*!***************************************!*\
  !*** ./resources/js/single_custom.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Thumbnail
5. Init Quantity
6. Init Star Rating
7. Init Favorite
8. Init Tabs



******************************/
jQuery(document).ready(function ($) {
  "use strict";
  /* 
  
  1. Vars and Inits
  
  */

  var header = $('.header');
  var topNav = $('.top_nav');
  var hamburger = $('.hamburger_container');
  var menu = $('.hamburger_menu');
  var menuActive = false;
  var hamburgerClose = $('.hamburger_close');
  var fsOverlay = $('.fs_menu_overlay');
  setHeader();
  $(window).on('resize', function () {
    setHeader();
  });
  $(document).on('scroll', function () {
    setHeader();
  });
  initMenu();
  initThumbnail();
  initQuantity();
  initStarRating();
  initFavorite();
  initTabs();
  /* 
  
  2. Set Header
  
  */

  function setHeader() {
    if (window.innerWidth < 992) {
      if ($(window).scrollTop() > 100) {
        header.css({
          'top': "0"
        });
      } else {
        header.css({
          'top': "0"
        });
      }
    } else {
      if ($(window).scrollTop() > 100) {
        header.css({
          'top': "-50px"
        });
      } else {
        header.css({
          'top': "0"
        });
      }
    }

    if (window.innerWidth > 991 && menuActive) {
      closeMenu();
    }
  }
  /* 
  
  3. Init Menu
  
  */


  function initMenu() {
    if (hamburger.length) {
      hamburger.on('click', function () {
        if (!menuActive) {
          openMenu();
        }
      });
    }

    if (fsOverlay.length) {
      fsOverlay.on('click', function () {
        if (menuActive) {
          closeMenu();
        }
      });
    }

    if (hamburgerClose.length) {
      hamburgerClose.on('click', function () {
        if (menuActive) {
          closeMenu();
        }
      });
    }

    if ($('.menu_item').length) {
      var items = document.getElementsByClassName('menu_item');
      var i;

      for (i = 0; i < items.length; i++) {
        if (items[i].classList.contains("has-children")) {
          items[i].onclick = function () {
            this.classList.toggle("active");
            var panel = this.children[1];

            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          };
        }
      }
    }
  }

  function openMenu() {
    menu.addClass('active'); // menu.css('right', "0");

    fsOverlay.css('pointer-events', "auto");
    menuActive = true;
  }

  function closeMenu() {
    menu.removeClass('active');
    fsOverlay.css('pointer-events', "none");
    menuActive = false;
  }
  /* 
  
  4. Init Thumbnail
  
  */


  function initThumbnail() {
    if ($('.single_product_thumbnails ul li').length) {
      var thumbs = $('.single_product_thumbnails ul li');
      var singleImage = $('.single_product_image_background');
      thumbs.each(function () {
        var item = $(this);
        item.on('click', function () {
          thumbs.removeClass('active');
          item.addClass('active');
          var img = item.find('img').data('image');
          singleImage.css('background-image', 'url(' + img + ')');
        });
      });
    }
  }
  /* 
  
  5. Init Quantity
  
  */


  function initQuantity() {
    if ($('.plus').length && $('.minus').length) {
      var plus = $('.plus');
      var minus = $('.minus');
      var value = $('#quantity_value');
      plus.on('click', function () {
        var x = parseInt(value.text());
        value.text(x + 1);
      });
      minus.on('click', function () {
        var x = parseInt(value.text());

        if (x > 1) {
          value.text(x - 1);
        }
      });
    }
  }
  /* 
  
  6. Init Star Rating
  
  */


  function initStarRating() {
    if ($('.user_star_rating li').length) {
      var stars = $('.user_star_rating li');
      stars.each(function () {
        var star = $(this);
        star.on('click', function () {
          var i = star.index();
          stars.find('i').each(function () {
            $(this).removeClass('fa-star');
            $(this).addClass('fa-star-o');
          });

          for (var x = 0; x <= i; x++) {
            $(stars[x]).find('i').removeClass('fa-star-o');
            $(stars[x]).find('i').addClass('fa-star');
          }

          ;
        });
      });
    }
  }
  /* 
  
  7. Init Favorite
  
  */


  function initFavorite() {
    if ($('.product_favorite').length) {
      var fav = $('.product_favorite');
      fav.on('click', function () {
        fav.toggleClass('active');
      });
    }
  }
  /* 
  
  8. Init Tabs
  
  */


  function initTabs() {
    if ($('.tabs').length) {
      var tabs = $('.tabs li');
      var tabContainers = $('.tab_container');
      tabs.each(function () {
        var tab = $(this);
        var tab_id = tab.data('active-tab');
        tab.on('click', function () {
          if (!tab.hasClass('active')) {
            tabs.removeClass('active');
            tabContainers.removeClass('active');
            tab.addClass('active');
            $('#' + tab_id).addClass('active');
          }
        });
      });
    }
  }
});

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/js/single_custom.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ProvaLPC\resources\js\single_custom.js */"./resources/js/single_custom.js");


/***/ })

/******/ });