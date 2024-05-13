/*!
 * MQBreakpoints 1.0.0
 * MQBreakpoints is a lightweight, pure JavaScript library for responding to CSS media queries.
 * 
 *
 * Copyright 2022 Denis Lipatov <ldu2601@gmail.com>
 *
 * Released under the BSD License
 *
 * Released on: September 24, 2022
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define("MQBreakpoints", [], factory);
	else if(typeof exports === 'object')
		exports["MQBreakpoints"] = factory();
	else
		root["MQBreakpoints"] = factory();
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};

// EXPORTS
__webpack_require__.d(__webpack_exports__, {
  "default": function() { return /* binding */ MQBreakpoints; }
});

;// CONCATENATED MODULE: ./src/helpers/isNumeric.js
var isNumeric = function isNumeric(num) {
  if (typeof num === 'number') return num - num === 0;
  if (typeof num === 'string' && num.trim() !== '') return Number.isFinite(+num);
  return false;
};

/* harmony default export */ var helpers_isNumeric = (isNumeric);
;// CONCATENATED MODULE: ./src/mq-breakpoints.js
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }



var MQBreakpoints = /*#__PURE__*/function () {
  function MQBreakpoints(media, options) {
    var _this = this;

    _classCallCheck(this, MQBreakpoints);

    this.defaults = {
      grid: {
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1400
      },
      listenerResize: false,
      deferSetup: false
    };
    this.params = Object.assign(this.defaults, options);
    this.media = media;
    this.grid = {};
    Object.keys(this.params.grid).forEach(function (property) {
      if (helpers_isNumeric(_this.params.grid[property])) {
        _this.grid["".concat(property, ":min")] = _this.params.grid[property];
        _this.grid["".concat(property, ":max")] = _this.params.grid[property] - 1;
      } else {
        _this.grid[property] = _this.params.grid[property];
      }
    });
    this.mq = window.matchMedia(this.mediaQueryString());
    this.init();
  }

  _createClass(MQBreakpoints, [{
    key: "mediaQueryString",
    value: function mediaQueryString() {
      var _this2 = this;

      if (this.media.indexOf(':min') === -1 && this.media.indexOf(':max') === -1) {
        return this.media;
      }

      var mqArray = this.media.split(',');
      var mqString = '';

      if (mqArray.length) {
        var i = 1;
        mqArray.forEach(function (el) {
          if (el.trim().indexOf(':min') !== -1) {
            mqString += "(min-width: ".concat(_this2.grid[el.trim()], "px)");
            if (i < mqArray.length) mqString += ' and ';
          } else if (el.trim().indexOf(':max') !== -1) {
            mqString += "(max-width: ".concat(_this2.grid[el.trim()], "px)");
            if (i < mqArray.length) mqString += ' and ';
          }

          i += 1;
        });
      }

      return mqString;
    }
  }, {
    key: "handleMatchMedia",
    value: function handleMatchMedia() {
      if (this.mq.matches) {
        if (this.params.match && typeof this.params.match === 'function') {
          this.params.match();
        }
      } else if (this.params.unmatch && typeof this.params.unmatch === 'function') {
        this.params.unmatch();
      }
    }
  }, {
    key: "setupInit",
    value: function setupInit() {
      if (this.params.setup && typeof this.params.setup === 'function') {
        this.params.setup();
      }
    }
  }, {
    key: "init",
    value: function init() {
      var _this3 = this;

      if (this.params.deferSetup) {
        if (this.mq.matches) {
          this.setupInit();
        }
      } else {
        this.setupInit();
      }

      this.handleMatchMedia();

      if (this.params.listenerResize) {
        window.addEventListener('resize', function () {
          _this3.handleMatchMedia();
        });
      } else {
        this.mq.addEventListener('change', function () {
          _this3.handleMatchMedia();
        });
      }
    }
  }]);

  return MQBreakpoints;
}();


__webpack_exports__ = __webpack_exports__["default"];
/******/ 	return __webpack_exports__;
/******/ })()
;
});