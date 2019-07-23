!function(e,t){if("function"==typeof define&&define.amd)define(["exports","jquery","px/util","px-libs/jquery.sparkline"],t);else if("undefined"!=typeof exports)t(exports,require("jquery"),require("px/util"),require("px-libs/jquery.sparkline"));else{var n={exports:{}};t(n.exports,e.jquery,e.util,e.jquery),e.pxSparkline=n.exports}}(this,function(e,t,n){"use strict";function r(e){return e&&e.__esModule?e:{default:e}}function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(e,"__esModule",{value:!0});var u=r(t),a=r(n),s=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),l=function(e){if(!e.fn.sparkline)throw new Error("jquery.sparkline.js required.");var t="pxSparkline",n="px.sparkline",r="."+n,u=e.fn[t],l={RESIZE:"resize"+r},o="2px",f=function(){function u(t,n,r){i(this,u),this.uniqueId=a.default.generateUniqueId(),this.element=t,this.$parent=e(t.parentNode);var s=document.createElement("div");s.appendChild(this.element.cloneNode(!0)),this._initialHTML=s.innerHTML,this.update(n,r),this._setListeners()}return s(u,[{key:"update",value:function(t,n){null!==t&&(this._values=t),null!==n&&("100%"!==n.width||"bar"!==n.type&&"tristate"!==n.type||"undefined"!=typeof n.barSpacing||(n.barSpacing=o),this.config=n);var r=e.extend(!0,{},this.config);"100%"===r.width&&("bar"===r.type||"tristate"===r.type?r.barWidth=this._getBarWidth(this.$parent,this._values.length,r.barSpacing):r.width=this.$parent.width()),e(this.element).sparkline(this._values,r)}},{key:"destroy",value:function(){this._unsetListeners(),e(this.element).removeData(n),e(this._initialHTML).insertAfter(this.element),e(this.element).remove()}},{key:"_getBarWidth",value:function(e,t,n){var r=e.width(),i=parseInt(n,10)*(t-1);return Math.floor((r-i)/t)}},{key:"_setListeners",value:function(){var t=this;e(window).on(this.constructor.Event.RESIZE+"."+this.uniqueId,function(){if("100%"===t.config.width){var n=e.extend(!0,{},t.config);"bar"===n.type||"tristate"===n.type?n.barWidth=t._getBarWidth(t.$parent,t._values.length,n.barSpacing):n.width=t.$parent.width(),e(t.element).sparkline(t._values,n)}})}},{key:"_unsetListeners",value:function(){e(window).off(this.constructor.Event.RESIZE+"."+this.uniqueId)}}],[{key:"_parseArgs",value:function(t,n){var r=void 0,i=void 0;return"[object Array]"===Object.prototype.toString.call(n[0])||"html"===n[0]||null===n[0]?(r=n[0],i=n[1]||null):i=n[0]||null,"html"!==r&&void 0!==r||null===r||(r=t.getAttribute("values"),void 0!==r&&null!==r||(r=e(t).html()),r=r.replace(/(^\s*<!--)|(-->\s*$)|\s+/g,"").split(",")),r&&"[object Array]"===Object.prototype.toString.call(r)&&0!==r.length||(r=null),{values:r,config:i}}},{key:"_jQueryInterface",value:function(){for(var t=arguments.length,r=Array(t),i=0;i<t;i++)r[i]=arguments[i];return this.each(function(){var t=e(this).data(n),i="update"===r[0]||"destroy"===r[0]?r[0]:null,a=u._parseArgs(this,i?r.slice(1):r),s=a.values,l=a.config;t||(t=new u(this,s||[],l||{}),e(this).data(n,t)),"update"===i?t.update(s,l):"destroy"===i&&t.destroy()})}},{key:"NAME",get:function(){return t}},{key:"DATA_KEY",get:function(){return n}},{key:"Event",get:function(){return l}},{key:"EVENT_KEY",get:function(){return r}}]),u}();return e.fn[t]=f._jQueryInterface,e.fn[t].Constructor=f,e.fn[t].noConflict=function(){return e.fn[t]=u,f._jQueryInterface},f}(u.default);e.default=l});