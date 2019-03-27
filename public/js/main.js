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
/******/ 	return __webpack_require__(__webpack_require__.s = 18);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/vendorTemplate/js/main.js":
/*!************************************************!*\
  !*** ./resources/js/vendorTemplate/js/main.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  \"use strict\";\n\n  var window_width = $(window).width(),\n      window_height = window.innerHeight,\n      header_height = $(\".default-header\").height(),\n      header_height_static = $(\".site-header.static\").outerHeight(),\n      fitscreen = window_height - header_height;\n  $(\".fullscreen\").css(\"height\", window_height);\n  $(\".fitscreen\").css(\"height\", fitscreen);\n\n  if (document.getElementById(\"default-select\")) {\n    $('select').niceSelect();\n  }\n\n  ;\n  $('.img-pop-up').magnificPopup({\n    type: 'image',\n    gallery: {\n      enabled: true\n    }\n  });\n  $('.single-gallery').magnificPopup({\n    type: 'image',\n    gallery: {\n      enabled: true\n    }\n  }); //  Counter Js \n\n  if (document.getElementById(\"facts-area\")) {\n    $('.counter').counterUp({\n      delay: 10,\n      time: 1000\n    });\n  }\n\n  ; // Initiate superfish on nav menu\n\n  $('.nav-menu').superfish({\n    animation: {\n      opacity: 'show'\n    },\n    speed: 400\n  });\n  $(function () {\n    $(\"#datepicker\").datepicker();\n    $(\"#datepicker2\").datepicker();\n  }); // Mobile Navigation\n\n  if ($('#nav-menu-container').length) {\n    var $mobile_nav = $('#nav-menu-container').clone().prop({\n      id: 'mobile-nav'\n    });\n    $mobile_nav.find('> ul').attr({\n      'class': '',\n      'id': ''\n    });\n    $('body').append($mobile_nav);\n    $('body').prepend('<button type=\"button\" id=\"mobile-nav-toggle\"><i class=\"lnr lnr-menu\"></i></button>');\n    $('body').append('<div id=\"mobile-body-overly\"></div>');\n    $('#mobile-nav').find('.menu-has-children').prepend('<i class=\"lnr lnr-chevron-down\"></i>');\n    $(document).on('click', '.menu-has-children i', function (e) {\n      $(this).next().toggleClass('menu-item-active');\n      $(this).nextAll('ul').eq(0).slideToggle();\n      $(this).toggleClass(\"lnr-chevron-up lnr-chevron-down\");\n    });\n    $(document).on('click', '#mobile-nav-toggle', function (e) {\n      $('body').toggleClass('mobile-nav-active');\n      $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');\n      $('#mobile-body-overly').toggle();\n    });\n    $(document).click(function (e) {\n      var container = $(\"#mobile-nav, #mobile-nav-toggle\");\n\n      if (!container.is(e.target) && container.has(e.target).length === 0) {\n        if ($('body').hasClass('mobile-nav-active')) {\n          $('body').removeClass('mobile-nav-active');\n          $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');\n          $('#mobile-body-overly').fadeOut();\n        }\n      }\n    });\n  } else if ($(\"#mobile-nav, #mobile-nav-toggle\").length) {\n    $(\"#mobile-nav, #mobile-nav-toggle\").hide();\n  } // Smooth scroll for the menu and links with .scrollto classes\n\n\n  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function () {\n    if (location.pathname.replace(/^\\//, '') == this.pathname.replace(/^\\//, '') && location.hostname == this.hostname) {\n      var target = $(this.hash);\n\n      if (target.length) {\n        var top_space = 0;\n\n        if ($('#header').length) {\n          top_space = $('#header').outerHeight();\n\n          if (!$('#header').hasClass('header-fixed')) {\n            top_space = top_space;\n          }\n        }\n\n        $('html, body').animate({\n          scrollTop: target.offset().top - top_space\n        }, 1500, 'easeInOutExpo');\n\n        if ($(this).parents('.nav-menu').length) {\n          $('.nav-menu .menu-active').removeClass('menu-active');\n          $(this).closest('li').addClass('menu-active');\n        }\n\n        if ($('body').hasClass('mobile-nav-active')) {\n          $('body').removeClass('mobile-nav-active');\n          $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');\n          $('#mobile-body-overly').fadeOut();\n        }\n\n        return false;\n      }\n    }\n  });\n  $(document).ready(function () {\n    $('html, body').hide();\n\n    if (window.location.hash) {\n      setTimeout(function () {\n        $('html, body').scrollTop(0).show();\n        $('html, body').animate({\n          scrollTop: $(window.location.hash).offset().top - 62\n        }, 1000);\n      }, 0);\n    } else {\n      $('html, body').show();\n    }\n  }); // Header scroll class\n\n  $(window).scroll(function () {\n    if ($(this).scrollTop() > 100) {\n      $('#header').addClass('header-scrolled');\n    } else {\n      $('#header').removeClass('header-scrolled');\n    }\n  });\n  $('.active-model-carusel').owlCarousel({\n    items: 1,\n    loop: true,\n    margin: 30,\n    dots: true\n  });\n  $('.active-exibition-carusel').owlCarousel({\n    items: 3,\n    margin: 30,\n    autoplay: true,\n    loop: true,\n    dots: true,\n    responsive: {\n      0: {\n        items: 1\n      },\n      480: {\n        items: 1\n      },\n      768: {\n        items: 2\n      },\n      900: {\n        items: 3\n      }\n    }\n  }); //  Start Google map \n  // When the window has finished loading create our google map below\n\n  if (document.getElementById(\"map\")) {\n    var init = function init() {\n      // Basic options for a simple Google Map\n      // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions\n      var mapOptions = {\n        // How zoomed in you want the map to start at (always required)\n        zoom: 11,\n        // The latitude and longitude to center the map (always required)\n        center: new google.maps.LatLng(40.6700, -73.9400),\n        // New York\n        // How you would like to style the map. \n        // This is where you would paste any style found on Snazzy Maps.\n        styles: [{\n          \"featureType\": \"water\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#e9e9e9\"\n          }, {\n            \"lightness\": 17\n          }]\n        }, {\n          \"featureType\": \"landscape\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#f5f5f5\"\n          }, {\n            \"lightness\": 20\n          }]\n        }, {\n          \"featureType\": \"road.highway\",\n          \"elementType\": \"geometry.fill\",\n          \"stylers\": [{\n            \"color\": \"#ffffff\"\n          }, {\n            \"lightness\": 17\n          }]\n        }, {\n          \"featureType\": \"road.highway\",\n          \"elementType\": \"geometry.stroke\",\n          \"stylers\": [{\n            \"color\": \"#ffffff\"\n          }, {\n            \"lightness\": 29\n          }, {\n            \"weight\": 0.2\n          }]\n        }, {\n          \"featureType\": \"road.arterial\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#ffffff\"\n          }, {\n            \"lightness\": 18\n          }]\n        }, {\n          \"featureType\": \"road.local\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#ffffff\"\n          }, {\n            \"lightness\": 16\n          }]\n        }, {\n          \"featureType\": \"poi\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#f5f5f5\"\n          }, {\n            \"lightness\": 21\n          }]\n        }, {\n          \"featureType\": \"poi.park\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#dedede\"\n          }, {\n            \"lightness\": 21\n          }]\n        }, {\n          \"elementType\": \"labels.text.stroke\",\n          \"stylers\": [{\n            \"visibility\": \"on\"\n          }, {\n            \"color\": \"#ffffff\"\n          }, {\n            \"lightness\": 16\n          }]\n        }, {\n          \"elementType\": \"labels.text.fill\",\n          \"stylers\": [{\n            \"saturation\": 36\n          }, {\n            \"color\": \"#333333\"\n          }, {\n            \"lightness\": 40\n          }]\n        }, {\n          \"elementType\": \"labels.icon\",\n          \"stylers\": [{\n            \"visibility\": \"off\"\n          }]\n        }, {\n          \"featureType\": \"transit\",\n          \"elementType\": \"geometry\",\n          \"stylers\": [{\n            \"color\": \"#f2f2f2\"\n          }, {\n            \"lightness\": 19\n          }]\n        }, {\n          \"featureType\": \"administrative\",\n          \"elementType\": \"geometry.fill\",\n          \"stylers\": [{\n            \"color\": \"#fefefe\"\n          }, {\n            \"lightness\": 20\n          }]\n        }, {\n          \"featureType\": \"administrative\",\n          \"elementType\": \"geometry.stroke\",\n          \"stylers\": [{\n            \"color\": \"#fefefe\"\n          }, {\n            \"lightness\": 17\n          }, {\n            \"weight\": 1.2\n          }]\n        }]\n      }; // Get the HTML DOM element that will contain your map \n      // We are using a div with id=\"map\" seen below in the <body>\n\n      var mapElement = document.getElementById('map'); // Create the Google Map using our element and options defined above\n\n      var map = new google.maps.Map(mapElement, mapOptions); // Let's also add a marker while we're at it\n\n      var marker = new google.maps.Marker({\n        position: new google.maps.LatLng(40.6700, -73.9400),\n        map: map,\n        title: 'Snazzy!'\n      });\n    };\n\n    google.maps.event.addDomListener(window, 'load', init);\n  }\n\n  $(document).ready(function () {\n    $('#mc_embed_signup').find('form').ajaxChimp();\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdmVuZG9yVGVtcGxhdGUvanMvbWFpbi5qcz9iN2QwIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwid2luZG93X3dpZHRoIiwid2luZG93Iiwid2lkdGgiLCJ3aW5kb3dfaGVpZ2h0IiwiaW5uZXJIZWlnaHQiLCJoZWFkZXJfaGVpZ2h0IiwiaGVpZ2h0IiwiaGVhZGVyX2hlaWdodF9zdGF0aWMiLCJvdXRlckhlaWdodCIsImZpdHNjcmVlbiIsImNzcyIsImdldEVsZW1lbnRCeUlkIiwibmljZVNlbGVjdCIsIm1hZ25pZmljUG9wdXAiLCJ0eXBlIiwiZ2FsbGVyeSIsImVuYWJsZWQiLCJjb3VudGVyVXAiLCJkZWxheSIsInRpbWUiLCJzdXBlcmZpc2giLCJhbmltYXRpb24iLCJvcGFjaXR5Iiwic3BlZWQiLCJkYXRlcGlja2VyIiwibGVuZ3RoIiwiJG1vYmlsZV9uYXYiLCJjbG9uZSIsInByb3AiLCJpZCIsImZpbmQiLCJhdHRyIiwiYXBwZW5kIiwicHJlcGVuZCIsIm9uIiwiZSIsIm5leHQiLCJ0b2dnbGVDbGFzcyIsIm5leHRBbGwiLCJlcSIsInNsaWRlVG9nZ2xlIiwidG9nZ2xlIiwiY2xpY2siLCJjb250YWluZXIiLCJpcyIsInRhcmdldCIsImhhcyIsImhhc0NsYXNzIiwicmVtb3ZlQ2xhc3MiLCJmYWRlT3V0IiwiaGlkZSIsImxvY2F0aW9uIiwicGF0aG5hbWUiLCJyZXBsYWNlIiwiaG9zdG5hbWUiLCJoYXNoIiwidG9wX3NwYWNlIiwiYW5pbWF0ZSIsInNjcm9sbFRvcCIsIm9mZnNldCIsInRvcCIsInBhcmVudHMiLCJjbG9zZXN0IiwiYWRkQ2xhc3MiLCJzZXRUaW1lb3V0Iiwic2hvdyIsInNjcm9sbCIsIm93bENhcm91c2VsIiwiaXRlbXMiLCJsb29wIiwibWFyZ2luIiwiZG90cyIsImF1dG9wbGF5IiwicmVzcG9uc2l2ZSIsImluaXQiLCJtYXBPcHRpb25zIiwiem9vbSIsImNlbnRlciIsImdvb2dsZSIsIm1hcHMiLCJMYXRMbmciLCJzdHlsZXMiLCJtYXBFbGVtZW50IiwibWFwIiwiTWFwIiwibWFya2VyIiwiTWFya2VyIiwicG9zaXRpb24iLCJ0aXRsZSIsImV2ZW50IiwiYWRkRG9tTGlzdGVuZXIiLCJhamF4Q2hpbXAiXSwibWFwcGluZ3MiOiJBQUNBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVU7QUFDM0I7O0FBRUEsTUFBSUMsWUFBWSxHQUFLSCxDQUFDLENBQUNJLE1BQUQsQ0FBRCxDQUFVQyxLQUFWLEVBQXJCO0FBQUEsTUFDQUMsYUFBYSxHQUFNRixNQUFNLENBQUNHLFdBRDFCO0FBQUEsTUFFQUMsYUFBYSxHQUFNUixDQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQlMsTUFBckIsRUFGbkI7QUFBQSxNQUdBQyxvQkFBb0IsR0FBR1YsQ0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJXLFdBQXpCLEVBSHZCO0FBQUEsTUFJQUMsU0FBUyxHQUFPTixhQUFhLEdBQUdFLGFBSmhDO0FBT0FSLEdBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJhLEdBQWpCLENBQXFCLFFBQXJCLEVBQStCUCxhQUEvQjtBQUNBTixHQUFDLENBQUMsWUFBRCxDQUFELENBQWdCYSxHQUFoQixDQUFvQixRQUFwQixFQUE4QkQsU0FBOUI7O0FBRUksTUFBR1gsUUFBUSxDQUFDYSxjQUFULENBQXdCLGdCQUF4QixDQUFILEVBQTZDO0FBQ3hDZCxLQUFDLENBQUMsUUFBRCxDQUFELENBQVllLFVBQVo7QUFDTDs7QUFBQTtBQUVEZixHQUFDLENBQUMsYUFBRCxDQUFELENBQWlCZ0IsYUFBakIsQ0FBK0I7QUFDM0JDLFFBQUksRUFBRSxPQURxQjtBQUUzQkMsV0FBTyxFQUFDO0FBQ1JDLGFBQU8sRUFBQztBQURBO0FBRm1CLEdBQS9CO0FBT0FuQixHQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQmdCLGFBQXJCLENBQW1DO0FBQy9CQyxRQUFJLEVBQUUsT0FEeUI7QUFFL0JDLFdBQU8s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OiIuL3Jlc291cmNlcy9qcy92ZW5kb3JUZW1wbGF0ZS9qcy9tYWluLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xuXHRcInVzZSBzdHJpY3RcIjtcblxuXHR2YXIgd2luZG93X3dpZHRoIFx0ID0gJCh3aW5kb3cpLndpZHRoKCksXG5cdHdpbmRvd19oZWlnaHQgXHRcdCA9IHdpbmRvdy5pbm5lckhlaWdodCxcblx0aGVhZGVyX2hlaWdodCBcdFx0ID0gJChcIi5kZWZhdWx0LWhlYWRlclwiKS5oZWlnaHQoKSxcblx0aGVhZGVyX2hlaWdodF9zdGF0aWMgPSAkKFwiLnNpdGUtaGVhZGVyLnN0YXRpY1wiKS5vdXRlckhlaWdodCgpLFxuXHRmaXRzY3JlZW4gXHRcdFx0ID0gd2luZG93X2hlaWdodCAtIGhlYWRlcl9oZWlnaHQ7XG5cblxuXHQkKFwiLmZ1bGxzY3JlZW5cIikuY3NzKFwiaGVpZ2h0XCIsIHdpbmRvd19oZWlnaHQpXG5cdCQoXCIuZml0c2NyZWVuXCIpLmNzcyhcImhlaWdodFwiLCBmaXRzY3JlZW4pO1xuXG4gICAgIGlmKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiZGVmYXVsdC1zZWxlY3RcIikpe1xuICAgICAgICAgICQoJ3NlbGVjdCcpLm5pY2VTZWxlY3QoKTtcbiAgICB9O1xuXG4gICAgJCgnLmltZy1wb3AtdXAnKS5tYWduaWZpY1BvcHVwKHtcbiAgICAgICAgdHlwZTogJ2ltYWdlJyxcbiAgICAgICAgZ2FsbGVyeTp7XG4gICAgICAgIGVuYWJsZWQ6dHJ1ZVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAkKCcuc2luZ2xlLWdhbGxlcnknKS5tYWduaWZpY1BvcHVwKHtcbiAgICAgICAgdHlwZTogJ2ltYWdlJyxcbiAgICAgICAgZ2FsbGVyeTp7XG4gICAgICAgIGVuYWJsZWQ6dHJ1ZVxuICAgICAgICB9XG4gICAgfSk7XG5cblxuICAgIC8vICBDb3VudGVyIEpzIFxuICAgICBpZihkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImZhY3RzLWFyZWFcIikpe1xuICAgICAgICAgICQoJy5jb3VudGVyJykuY291bnRlclVwKHtcbiAgICAgICAgICBkZWxheTogMTAsXG4gICAgICAgICAgdGltZTogMTAwMFxuICAgICAgIH0pO1xuICAgICB9O1xuXG5cblxuXG4gIC8vIEluaXRpYXRlIHN1cGVyZmlzaCBvbiBuYXYgbWVudVxuICAkKCcubmF2LW1lbnUnKS5zdXBlcmZpc2goe1xuICAgIGFuaW1hdGlvbjoge1xuICAgICAgb3BhY2l0eTogJ3Nob3cnXG4gICAgfSxcbiAgICBzcGVlZDogNDAwXG4gIH0pO1xuXG5cbiAgICAkKCBmdW5jdGlvbigpIHtcbiAgICAgICAgJCggXCIjZGF0ZXBpY2tlclwiICkuZGF0ZXBpY2tlcigpO1xuICAgICAgICAkKCBcIiNkYXRlcGlja2VyMlwiICkuZGF0ZXBpY2tlcigpO1xuICAgICB9KTtcbiAgXG5cbiAgLy8gTW9iaWxlIE5hdmlnYXRpb25cbiAgaWYgKCQoJyNuYXYtbWVudS1jb250YWluZXInKS5sZW5ndGgpIHtcbiAgICB2YXIgJG1vYmlsZV9uYXYgPSAkKCcjbmF2LW1lbnUtY29udGFpbmVyJykuY2xvbmUoKS5wcm9wKHtcbiAgICAgIGlkOiAnbW9iaWxlLW5hdidcbiAgICB9KTtcbiAgICAkbW9iaWxlX25hdi5maW5kKCc+IHVsJykuYXR0cih7XG4gICAgICAnY2xhc3MnOiAnJyxcbiAgICAgICdpZCc6ICcnXG4gICAgfSk7XG4gICAgJCgnYm9keScpLmFwcGVuZCgkbW9iaWxlX25hdik7XG4gICAgJCgnYm9keScpLnByZXBlbmQoJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGlkPVwibW9iaWxlLW5hdi10b2dnbGVcIj48aSBjbGFzcz1cImxuciBsbnItbWVudVwiPjwvaT48L2J1dHRvbj4nKTtcbiAgICAkKCdib2R5JykuYXBwZW5kKCc8ZGl2IGlkPVwibW9iaWxlLWJvZHktb3Zlcmx5XCI+PC9kaXY+Jyk7XG4gICAgJCgnI21vYmlsZS1uYXYnKS5maW5kKCcubWVudS1oYXMtY2hpbGRyZW4nKS5wcmVwZW5kKCc8aSBjbGFzcz1cImxuciBsbnItY2hldnJvbi1kb3duXCI+PC9pPicpO1xuXG4gICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5tZW51LWhhcy1jaGlsZHJlbiBpJywgZnVuY3Rpb24oZSkge1xuICAgICAgJCh0aGlzKS5uZXh0KCkudG9nZ2xlQ2xhc3MoJ21lbnUtaXRlbS1hY3RpdmUnKTtcbiAgICAgICQodGhpcykubmV4dEFsbCgndWwnKS5lcSgwKS5zbGlkZVRvZ2dsZSgpO1xuICAgICAgJCh0aGlzKS50b2dnbGVDbGFzcyhcImxuci1jaGV2cm9uLXVwIGxuci1jaGV2cm9uLWRvd25cIik7XG4gICAgfSk7XG5cbiAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnI21vYmlsZS1uYXYtdG9nZ2xlJywgZnVuY3Rpb24oZSkge1xuICAgICAgJCgnYm9keScpLnRvZ2dsZUNsYXNzKCdtb2JpbGUtbmF2LWFjdGl2ZScpO1xuICAgICAgJCgnI21vYmlsZS1uYXYtdG9nZ2xlIGknKS50b2dnbGVDbGFzcygnbG5yLWNyb3NzIGxuci1tZW51Jyk7XG4gICAgICAkKCcjbW9iaWxlLWJvZHktb3Zlcmx5JykudG9nZ2xlKCk7XG4gICAgfSk7XG5cbiAgICAkKGRvY3VtZW50KS5jbGljayhmdW5jdGlvbihlKSB7XG4gICAgICB2YXIgY29udGFpbmVyID0gJChcIiNtb2JpbGUtbmF2LCAjbW9iaWxlLW5hdi10b2dnbGVcIik7XG4gICAgICBpZiAoIWNvbnRhaW5lci5pcyhlLnRhcmdldCkgJiYgY29udGFpbmVyLmhhcyhlLnRhcmdldCkubGVuZ3RoID09PSAwKSB7XG4gICAgICAgIGlmICgkKCdib2R5JykuaGFzQ2xhc3MoJ21vYmlsZS1uYXYtYWN0aXZlJykpIHtcbiAgICAgICAgICAkKCdib2R5JykucmVtb3ZlQ2xhc3MoJ21vYmlsZS1uYXYtYWN0aXZlJyk7XG4gICAgICAgICAgJCgnI21vYmlsZS1uYXYtdG9nZ2xlIGknKS50b2dnbGVDbGFzcygnbG5yLWNyb3NzIGxuci1tZW51Jyk7XG4gICAgICAgICAgJCgnI21vYmlsZS1ib2R5LW92ZXJseScpLmZhZGVPdXQoKTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH0pO1xuICB9IGVsc2UgaWYgKCQoXCIjbW9iaWxlLW5hdiwgI21vYmlsZS1uYXYtdG9nZ2xlXCIpLmxlbmd0aCkge1xuICAgICQoXCIjbW9iaWxlLW5hdiwgI21vYmlsZS1uYXYtdG9nZ2xlXCIpLmhpZGUoKTtcbiAgfVxuXG4gIC8vIFNtb290aCBzY3JvbGwgZm9yIHRoZSBtZW51IGFuZCBsaW5rcyB3aXRoIC5zY3JvbGx0byBjbGFzc2VzXG4gICQoJy5uYXYtbWVudSBhLCAjbW9iaWxlLW5hdiBhLCAuc2Nyb2xsdG8nKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICBpZiAobG9jYXRpb24ucGF0aG5hbWUucmVwbGFjZSgvXlxcLy8sICcnKSA9PSB0aGlzLnBhdGhuYW1lLnJlcGxhY2UoL15cXC8vLCAnJykgJiYgbG9jYXRpb24uaG9zdG5hbWUgPT0gdGhpcy5ob3N0bmFtZSkge1xuICAgICAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcbiAgICAgIGlmICh0YXJnZXQubGVuZ3RoKSB7XG4gICAgICAgIHZhciB0b3Bfc3BhY2UgPSAwO1xuXG4gICAgICAgIGlmICgkKCcjaGVhZGVyJykubGVuZ3RoKSB7XG4gICAgICAgICAgdG9wX3NwYWNlID0gJCgnI2hlYWRlcicpLm91dGVySGVpZ2h0KCk7XG5cbiAgICAgICAgICBpZiggISAkKCcjaGVhZGVyJykuaGFzQ2xhc3MoJ2hlYWRlci1maXhlZCcpICkge1xuICAgICAgICAgICAgdG9wX3NwYWNlID0gdG9wX3NwYWNlO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgICQoJ2h0bWwsIGJvZHknKS5hbmltYXRlKHtcbiAgICAgICAgICBzY3JvbGxUb3A6IHRhcmdldC5vZmZzZXQoKS50b3AgLSB0b3Bfc3BhY2VcbiAgICAgICAgfSwgMTUwMCwgJ2Vhc2VJbk91dEV4cG8nKTtcblxuICAgICAgICBpZiAoJCh0aGlzKS5wYXJlbnRzKCcubmF2LW1lbnUnKS5sZW5ndGgpIHtcbiAgICAgICAgICAkKCcubmF2LW1lbnUgLm1lbnUtYWN0aXZlJykucmVtb3ZlQ2xhc3MoJ21lbnUtYWN0aXZlJyk7XG4gICAgICAgICAgJCh0aGlzKS5jbG9zZXN0KCdsaScpLmFkZENsYXNzKCdtZW51LWFjdGl2ZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKCQoJ2JvZHknKS5oYXNDbGFzcygnbW9iaWxlLW5hdi1hY3RpdmUnKSkge1xuICAgICAgICAgICQoJ2JvZHknKS5yZW1vdmVDbGFzcygnbW9iaWxlLW5hdi1hY3RpdmUnKTtcbiAgICAgICAgICAkKCcjbW9iaWxlLW5hdi10b2dnbGUgaScpLnRvZ2dsZUNsYXNzKCdsbnItdGltZXMgbG5yLWJhcnMnKTtcbiAgICAgICAgICAkKCcjbW9iaWxlLWJvZHktb3Zlcmx5JykuZmFkZU91dCgpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgIH1cbiAgICB9XG4gIH0pO1xuXG5cbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcblxuICAgICQoJ2h0bWwsIGJvZHknKS5oaWRlKCk7XG5cbiAgICAgICAgaWYgKHdpbmRvdy5sb2NhdGlvbi5oYXNoKSB7XG5cbiAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcblxuICAgICAgICAkKCdodG1sLCBib2R5Jykuc2Nyb2xsVG9wKDApLnNob3coKTtcblxuICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG5cbiAgICAgICAgc2Nyb2xsVG9wOiAkKHdpbmRvdy5sb2NhdGlvbi5oYXNoKS5vZmZzZXQoKS50b3AtNjJcblxuICAgICAgICB9LCAxMDAwKVxuXG4gICAgICAgIH0sIDApO1xuXG4gICAgICAgIH1cblxuICAgICAgICBlbHNlIHtcblxuICAgICAgICAkKCdodG1sLCBib2R5Jykuc2hvdygpO1xuXG4gICAgICAgIH1cblxuICAgIH0pO1xuICBcblxuICAvLyBIZWFkZXIgc2Nyb2xsIGNsYXNzXG4gICQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKSB7XG4gICAgaWYgKCQodGhpcykuc2Nyb2xsVG9wKCkgPiAxMDApIHtcbiAgICAgICQoJyNoZWFkZXInKS5hZGRDbGFzcygnaGVhZGVyLXNjcm9sbGVkJyk7XG4gICAgfSBlbHNlIHtcbiAgICAgICQoJyNoZWFkZXInKS5yZW1vdmVDbGFzcygnaGVhZGVyLXNjcm9sbGVkJyk7XG4gICAgfVxuICB9KVxuXG5cbiAgICAkKCcuYWN0aXZlLW1vZGVsLWNhcnVzZWwnKS5vd2xDYXJvdXNlbCh7XG4gICAgICAgIGl0ZW1zOjEsXG4gICAgICAgIGxvb3A6dHJ1ZSxcbiAgICAgICAgbWFyZ2luOjMwLFxuICAgICAgICBkb3RzOiB0cnVlXG4gICAgfSk7XG5cbiAgICAkKCcuYWN0aXZlLWV4aWJpdGlvbi1jYXJ1c2VsJykub3dsQ2Fyb3VzZWwoe1xuICAgICAgICBpdGVtczozLFxuICAgICAgICBtYXJnaW46MzAsXG4gICAgICAgIGF1dG9wbGF5OnRydWUsXG4gICAgICAgIGxvb3A6dHJ1ZSxcbiAgICAgICAgZG90czogdHJ1ZSwgICAgICAgXG4gICAgICAgICAgICByZXNwb25zaXZlOiB7XG4gICAgICAgICAgICAwOiB7XG4gICAgICAgICAgICAgICAgaXRlbXM6IDFcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICA0ODA6IHtcbiAgICAgICAgICAgICAgICBpdGVtczogMSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICA3Njg6IHtcbiAgICAgICAgICAgICAgICBpdGVtczogMixcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICA5MDA6IHtcbiAgICAgICAgICAgICAgICBpdGVtczogMyxcbiAgICAgICAgICAgIH1cblxuICAgICAgICB9XG4gICAgfSk7XG5cblxuICAgICAgIFxuXG5cbiAgICAvLyAgU3RhcnQgR29vZ2xlIG1hcCBcblxuICAgICAgICAgICAgLy8gV2hlbiB0aGUgd2luZG93IGhhcyBmaW5pc2hlZCBsb2FkaW5nIGNyZWF0ZSBvdXIgZ29vZ2xlIG1hcCBiZWxvd1xuXG4gICAgICAgICAgICBpZihkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcIm1hcFwiKSl7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIGdvb2dsZS5tYXBzLmV2ZW50LmFkZERvbUxpc3RlbmVyKHdpbmRvdywgJ2xvYWQnLCBpbml0KTtcbiAgICAgICAgXG4gICAgICAgICAgICBmdW5jdGlvbiBpbml0KCkge1xuICAgICAgICAgICAgICAgIC8vIEJhc2ljIG9wdGlvbnMgZm9yIGEgc2ltcGxlIEdvb2dsZSBNYXBcbiAgICAgICAgICAgICAgICAvLyBGb3IgbW9yZSBvcHRpb25zIHNlZTogaHR0cHM6Ly9kZXZlbG9wZXJzLmdvb2dsZS5jb20vbWFwcy9kb2N1bWVudGF0aW9uL2phdmFzY3JpcHQvcmVmZXJlbmNlI01hcE9wdGlvbnNcbiAgICAgICAgICAgICAgICB2YXIgbWFwT3B0aW9ucyA9IHtcbiAgICAgICAgICAgICAgICAgICAgLy8gSG93IHpvb21lZCBpbiB5b3Ugd2FudCB0aGUgbWFwIHRvIHN0YXJ0IGF0IChhbHdheXMgcmVxdWlyZWQpXG4gICAgICAgICAgICAgICAgICAgIHpvb206IDExLFxuXG4gICAgICAgICAgICAgICAgICAgIC8vIFRoZSBsYXRpdHVkZSBhbmQgbG9uZ2l0dWRlIHRvIGNlbnRlciB0aGUgbWFwIChhbHdheXMgcmVxdWlyZWQpXG4gICAgICAgICAgICAgICAgICAgIGNlbnRlcjogbmV3IGdvb2dsZS5tYXBzLkxhdExuZyg0MC42NzAwLCAtNzMuOTQwMCksIC8vIE5ldyBZb3JrXG5cbiAgICAgICAgICAgICAgICAgICAgLy8gSG93IHlvdSB3b3VsZCBsaWtlIHRvIHN0eWxlIHRoZSBtYXAuIFxuICAgICAgICAgICAgICAgICAgICAvLyBUaGlzIGlzIHdoZXJlIHlvdSB3b3VsZCBwYXN0ZSBhbnkgc3R5bGUgZm91bmQgb24gU25henp5IE1hcHMuXG4gICAgICAgICAgICAgICAgICAgIHN0eWxlczogW3tcImZlYXR1cmVUeXBlXCI6XCJ3YXRlclwiLFwiZWxlbWVudFR5cGVcIjpcImdlb21ldHJ5XCIsXCJzdHlsZXJzXCI6W3tcImNvbG9yXCI6XCIjZTllOWU5XCJ9LHtcImxpZ2h0bmVzc1wiOjE3fV19LHtcImZlYXR1cmVUeXBlXCI6XCJsYW5kc2NhcGVcIixcImVsZW1lbnRUeXBlXCI6XCJnZW9tZXRyeVwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2Y1ZjVmNVwifSx7XCJsaWdodG5lc3NcIjoyMH1dfSx7XCJmZWF0dXJlVHlwZVwiOlwicm9hZC5oaWdod2F5XCIsXCJlbGVtZW50VHlwZVwiOlwiZ2VvbWV0cnkuZmlsbFwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2ZmZmZmZlwifSx7XCJsaWdodG5lc3NcIjoxN31dfSx7XCJmZWF0dXJlVHlwZVwiOlwicm9hZC5oaWdod2F5XCIsXCJlbGVtZW50VHlwZVwiOlwiZ2VvbWV0cnkuc3Ryb2tlXCIsXCJzdHlsZXJzXCI6W3tcImNvbG9yXCI6XCIjZmZmZmZmXCJ9LHtcImxpZ2h0bmVzc1wiOjI5fSx7XCJ3ZWlnaHRcIjowLjJ9XX0se1wiZmVhdHVyZVR5cGVcIjpcInJvYWQuYXJ0ZXJpYWxcIixcImVsZW1lbnRUeXBlXCI6XCJnZW9tZXRyeVwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2ZmZmZmZlwifSx7XCJsaWdodG5lc3NcIjoxOH1dfSx7XCJmZWF0dXJlVHlwZVwiOlwicm9hZC5sb2NhbFwiLFwiZWxlbWVudFR5cGVcIjpcImdlb21ldHJ5XCIsXCJzdHlsZXJzXCI6W3tcImNvbG9yXCI6XCIjZmZmZmZmXCJ9LHtcImxpZ2h0bmVzc1wiOjE2fV19LHtcImZlYXR1cmVUeXBlXCI6XCJwb2lcIixcImVsZW1lbnRUeXBlXCI6XCJnZW9tZXRyeVwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2Y1ZjVmNVwifSx7XCJsaWdodG5lc3NcIjoyMX1dfSx7XCJmZWF0dXJlVHlwZVwiOlwicG9pLnBhcmtcIixcImVsZW1lbnRUeXBlXCI6XCJnZW9tZXRyeVwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2RlZGVkZVwifSx7XCJsaWdodG5lc3NcIjoyMX1dfSx7XCJlbGVtZW50VHlwZVwiOlwibGFiZWxzLnRleHQuc3Ryb2tlXCIsXCJzdHlsZXJzXCI6W3tcInZpc2liaWxpdHlcIjpcIm9uXCJ9LHtcImNvbG9yXCI6XCIjZmZmZmZmXCJ9LHtcImxpZ2h0bmVzc1wiOjE2fV19LHtcImVsZW1lbnRUeXBlXCI6XCJsYWJlbHMudGV4dC5maWxsXCIsXCJzdHlsZXJzXCI6W3tcInNhdHVyYXRpb25cIjozNn0se1wiY29sb3JcIjpcIiMzMzMzMzNcIn0se1wibGlnaHRuZXNzXCI6NDB9XX0se1wiZWxlbWVudFR5cGVcIjpcImxhYmVscy5pY29uXCIsXCJzdHlsZXJzXCI6W3tcInZpc2liaWxpdHlcIjpcIm9mZlwifV19LHtcImZlYXR1cmVUeXBlXCI6XCJ0cmFuc2l0XCIsXCJlbGVtZW50VHlwZVwiOlwiZ2VvbWV0cnlcIixcInN0eWxlcnNcIjpbe1wiY29sb3JcIjpcIiNmMmYyZjJcIn0se1wibGlnaHRuZXNzXCI6MTl9XX0se1wiZmVhdHVyZVR5cGVcIjpcImFkbWluaXN0cmF0aXZlXCIsXCJlbGVtZW50VHlwZVwiOlwiZ2VvbWV0cnkuZmlsbFwiLFwic3R5bGVyc1wiOlt7XCJjb2xvclwiOlwiI2ZlZmVmZVwifSx7XCJsaWdodG5lc3NcIjoyMH1dfSx7XCJmZWF0dXJlVHlwZVwiOlwiYWRtaW5pc3RyYXRpdmVcIixcImVsZW1lbnRUeXBlXCI6XCJnZW9tZXRyeS5zdHJva2VcIixcInN0eWxlcnNcIjpbe1wiY29sb3JcIjpcIiNmZWZlZmVcIn0se1wibGlnaHRuZXNzXCI6MTd9LHtcIndlaWdodFwiOjEuMn1dfV1cbiAgICAgICAgICAgICAgICB9O1xuXG4gICAgICAgICAgICAgICAgLy8gR2V0IHRoZSBIVE1MIERPTSBlbGVtZW50IHRoYXQgd2lsbCBjb250YWluIHlvdXIgbWFwIFxuICAgICAgICAgICAgICAgIC8vIFdlIGFyZSB1c2luZyBhIGRpdiB3aXRoIGlkPVwibWFwXCIgc2VlbiBiZWxvdyBpbiB0aGUgPGJvZHk+XG4gICAgICAgICAgICAgICAgdmFyIG1hcEVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWFwJyk7XG5cbiAgICAgICAgICAgICAgICAvLyBDcmVhdGUgdGhlIEdvb2dsZSBNYXAgdXNpbmcgb3VyIGVsZW1lbnQgYW5kIG9wdGlvbnMgZGVmaW5lZCBhYm92ZVxuICAgICAgICAgICAgICAgIHZhciBtYXAgPSBuZXcgZ29vZ2xlLm1hcHMuTWFwKG1hcEVsZW1lbnQsIG1hcE9wdGlvbnMpO1xuXG4gICAgICAgICAgICAgICAgLy8gTGV0J3MgYWxzbyBhZGQgYSBtYXJrZXIgd2hpbGUgd2UncmUgYXQgaXRcbiAgICAgICAgICAgICAgICB2YXIgbWFya2VyID0gbmV3IGdvb2dsZS5tYXBzLk1hcmtlcih7XG4gICAgICAgICAgICAgICAgICAgIHBvc2l0aW9uOiBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nKDQwLjY3MDAsIC03My45NDAwKSxcbiAgICAgICAgICAgICAgICAgICAgbWFwOiBtYXAsXG4gICAgICAgICAgICAgICAgICAgIHRpdGxlOiAnU25henp5ISdcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICB9XG5cblxuICAgICAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQoJyNtY19lbWJlZF9zaWdudXAnKS5maW5kKCdmb3JtJykuYWpheENoaW1wKCk7XG4gICAgICAgIH0pOyAgICAgIFxuXG5cblxuXG5cblxuXG5cbiB9KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/vendorTemplate/js/main.js\n");

/***/ }),

/***/ 18:
/*!******************************************************!*\
  !*** multi ./resources/js/vendorTemplate/js/main.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ProvaLPC\resources\js\vendorTemplate\js\main.js */"./resources/js/vendorTemplate/js/main.js");


/***/ })

/******/ });