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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/vendorTemplate/js/mail-script.js":
/*!*******************************************************!*\
  !*** ./resources/js/vendorTemplate/js/mail-script.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// -------   Mail Send ajax\n$(document).ready(function () {\n  var form = $('#myForm'); // contact form\n\n  var submit = $('.submit-btn'); // submit button\n\n  var alert = $('.alert-msg'); // alert div for show alert message\n  // form submit event\n\n  form.on('submit', function (e) {\n    e.preventDefault(); // prevent default form submit\n\n    $.ajax({\n      url: 'mail.php',\n      // form action url\n      type: 'POST',\n      // form submit method get/post\n      dataType: 'html',\n      // request type html/json/xml\n      data: form.serialize(),\n      // serialize form data\n      beforeSend: function beforeSend() {\n        alert.fadeOut();\n        submit.html('Sending....'); // change submit button text\n      },\n      success: function success(data) {\n        alert.html(data).fadeIn(); // fade in response data\n\n        form.trigger('reset'); // reset form\n\n        submit.attr(\"style\", \"display: none !important\");\n        ; // reset submit button text\n      },\n      error: function error(e) {\n        console.log(e);\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdmVuZG9yVGVtcGxhdGUvanMvbWFpbC1zY3JpcHQuanM/NjgyYyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImZvcm0iLCJzdWJtaXQiLCJhbGVydCIsIm9uIiwiZSIsInByZXZlbnREZWZhdWx0IiwiYWpheCIsInVybCIsInR5cGUiLCJkYXRhVHlwZSIsImRhdGEiLCJzZXJpYWxpemUiLCJiZWZvcmVTZW5kIiwiZmFkZU91dCIsImh0bWwiLCJzdWNjZXNzIiwiZmFkZUluIiwidHJpZ2dlciIsImF0dHIiLCJlcnJvciIsImNvbnNvbGUiLCJsb2ciXSwibWFwcGluZ3MiOiJBQUFJO0FBRUNBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUMxQixNQUFJQyxJQUFJLEdBQUdILENBQUMsQ0FBQyxTQUFELENBQVosQ0FEMEIsQ0FDRDs7QUFDekIsTUFBSUksTUFBTSxHQUFHSixDQUFDLENBQUMsYUFBRCxDQUFkLENBRjBCLENBRUs7O0FBQy9CLE1BQUlLLEtBQUssR0FBR0wsQ0FBQyxDQUFDLFlBQUQsQ0FBYixDQUgwQixDQUdHO0FBRTdCOztBQUNBRyxNQUFJLENBQUNHLEVBQUwsQ0FBUSxRQUFSLEVBQWtCLFVBQVNDLENBQVQsRUFBWTtBQUMxQkEsS0FBQyxDQUFDQyxjQUFGLEdBRDBCLENBQ047O0FBRXBCUixLQUFDLENBQUNTLElBQUYsQ0FBTztBQUNIQyxTQUFHLEVBQUUsVUFERjtBQUNjO0FBQ2pCQyxVQUFJLEVBQUUsTUFGSDtBQUVXO0FBQ2RDLGNBQVEsRUFBRSxNQUhQO0FBR2U7QUFDbEJDLFVBQUksRUFBRVYsSUFBSSxDQUFDVyxTQUFMLEVBSkg7QUFJcUI7QUFDeEJDLGdCQUFVLEVBQUUsc0JBQVc7QUFDbkJWLGFBQUssQ0FBQ1csT0FBTjtBQUNBWixjQUFNLENBQUNhLElBQVAsQ0FBWSxhQUFaLEVBRm1CLENBRVM7QUFDL0IsT0FSRTtBQVNIQyxhQUFPLEVBQUUsaUJBQVNMLElBQVQsRUFBZTtBQUNwQlIsYUFBSyxDQUFDWSxJQUFOLENBQVdKLElBQVgsRUFBaUJNLE1BQWpCLEdBRG9CLENBQ087O0FBQzNCaEIsWUFBSSxDQUFDaUIsT0FBTCxDQUFhLE9BQWIsRUFGb0IsQ0FFRzs7QUFDdkJoQixjQUFNLENBQUNpQixJQUFQLENBQVksT0FBWixFQUFxQiwwQkFBckI7QUFBaUQsU0FIN0IsQ0FHK0I7QUFDdEQsT0FiRTtBQWNIQyxXQUFLLEVBQUUsZUFBU2YsQ0FBVCxFQUFZO0FBQ2ZnQixlQUFPLENBQUNDLEdBQVIsQ0FBWWpCLENBQVo7QUFDSDtBQWhCRSxLQUFQO0FBa0JILEdBckJEO0FBc0JILENBNUJBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3ZlbmRvclRlbXBsYXRlL2pzL21haWwtc2NyaXB0LmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiICAgIC8vIC0tLS0tLS0gICBNYWlsIFNlbmQgYWpheFxuXG4gICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAgICB2YXIgZm9ybSA9ICQoJyNteUZvcm0nKTsgLy8gY29udGFjdCBmb3JtXG4gICAgICAgIHZhciBzdWJtaXQgPSAkKCcuc3VibWl0LWJ0bicpOyAvLyBzdWJtaXQgYnV0dG9uXG4gICAgICAgIHZhciBhbGVydCA9ICQoJy5hbGVydC1tc2cnKTsgLy8gYWxlcnQgZGl2IGZvciBzaG93IGFsZXJ0IG1lc3NhZ2VcblxuICAgICAgICAvLyBmb3JtIHN1Ym1pdCBldmVudFxuICAgICAgICBmb3JtLm9uKCdzdWJtaXQnLCBmdW5jdGlvbihlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7IC8vIHByZXZlbnQgZGVmYXVsdCBmb3JtIHN1Ym1pdFxuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHVybDogJ21haWwucGhwJywgLy8gZm9ybSBhY3Rpb24gdXJsXG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLCAvLyBmb3JtIHN1Ym1pdCBtZXRob2QgZ2V0L3Bvc3RcbiAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ2h0bWwnLCAvLyByZXF1ZXN0IHR5cGUgaHRtbC9qc29uL3htbFxuICAgICAgICAgICAgICAgIGRhdGE6IGZvcm0uc2VyaWFsaXplKCksIC8vIHNlcmlhbGl6ZSBmb3JtIGRhdGFcbiAgICAgICAgICAgICAgICBiZWZvcmVTZW5kOiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgYWxlcnQuZmFkZU91dCgpO1xuICAgICAgICAgICAgICAgICAgICBzdWJtaXQuaHRtbCgnU2VuZGluZy4uLi4nKTsgLy8gY2hhbmdlIHN1Ym1pdCBidXR0b24gdGV4dFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICBhbGVydC5odG1sKGRhdGEpLmZhZGVJbigpOyAvLyBmYWRlIGluIHJlc3BvbnNlIGRhdGFcbiAgICAgICAgICAgICAgICAgICAgZm9ybS50cmlnZ2VyKCdyZXNldCcpOyAvLyByZXNldCBmb3JtXG4gICAgICAgICAgICAgICAgICAgIHN1Ym1pdC5hdHRyKFwic3R5bGVcIiwgXCJkaXNwbGF5OiBub25lICFpbXBvcnRhbnRcIik7OyAvLyByZXNldCBzdWJtaXQgYnV0dG9uIHRleHRcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbihlKSB7XG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGUpXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/vendorTemplate/js/mail-script.js\n");

/***/ }),

/***/ 11:
/*!*************************************************************!*\
  !*** multi ./resources/js/vendorTemplate/js/mail-script.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ProvaLPC\resources\js\vendorTemplate\js\mail-script.js */"./resources/js/vendorTemplate/js/mail-script.js");


/***/ })

/******/ });