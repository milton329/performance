!function(e,r){if("function"==typeof define&&define.amd)define(["jquery","px-libs/jquery.knob"],r);else if("undefined"!=typeof exports)r(require("jquery"),require("px-libs/jquery.knob"));else{var n={exports:{}};r(e.jquery,e.jquery),e.jqueryKnob=n.exports}}(this,function(e){"use strict";function r(e){return e&&e.__esModule?e:{default:e}}var n=r(e);!function(e){if(!e.fn.knob)throw new Error("jquery.knob.js required.");var r=e.fn.knob;e.fn.knob=function(n){var i=r.call(this,n),t="rtl"===e("html").attr("dir");return t?i.each(function(){var r=e(this).find("input");r.css({"margin-left":0,"margin-right":r.css("margin-left")})}):i}}(n.default)});