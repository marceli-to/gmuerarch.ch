!function(t){var e={};function n(o){if(e[o])return e[o].exports;var r=e[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,o){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:o})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(o,r,function(e){return t[e]}.bind(null,r));return o},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="/",n(n.s=0)}({0:function(t,e,n){n("45k2"),n("g+Ct"),t.exports=n("zFtn")},"45k2":function(t,e,n){n("ZtfY"),n("bkGK"),n("OMhh"),n("ytKA"),n("uOe+")},OMhh:function(t,e,n){"use strict";n.r(e);var o=n("cYEy");n.n(o)()()},RoWv:function(t,e,n){var o,r;function i(t){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}!function(c,a){"object"==i(e)&&void 0!==t?t.exports=a():void 0===(r="function"==typeof(o=a)?o.call(e,n,e,t):o)||(t.exports=r)}(0,(function(){"use strict";function t(){return(t=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}var e="undefined"!=typeof window,n=e&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),o=e&&"IntersectionObserver"in window,r=e&&"classList"in document.createElement("p"),i=e&&window.devicePixelRatio>1,c={elements_selector:".lazy",container:n||e?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",class_entered:"entered",class_exited:"exited",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!0,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},a=function(e){return t({},c,e)},u=function(t,e){var n,o="LazyLoad::Initialized",r=new t(e);try{n=new CustomEvent(o,{detail:{instance:r}})}catch(t){(n=document.createEvent("CustomEvent")).initCustomEvent(o,!1,!1,{instance:r})}window.dispatchEvent(n)},s="src",l="srcset",f="sizes",d="poster",v="llOriginalAttrs",m="loading",p="loaded",b="applied",h="error",g="native",y=function(t,e){return t.getAttribute("data-"+e)},_=function(t){return y(t,"ll-status")},E=function(t,e){return function(t,e,n){var o="data-ll-status";null!==n?t.setAttribute(o,n):t.removeAttribute(o)}(t,0,e)},w=function(t){return E(t,null)},O=function(t){return null===_(t)},L=function(t){return _(t)===g},A=[m,p,b,h],j=function(t,e,n,o){t&&(void 0===o?void 0===n?t(e):t(e,n):t(e,n,o))},S=function(t,e){r?t.classList.add(e):t.className+=(t.className?" ":"")+e},I=function(t,e){r?t.classList.remove(e):t.className=t.className.replace(new RegExp("(^|\\s+)"+e+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},k=function(t){return t.llTempImage},x=function(t,e){if(e){var n=e._observer;n&&n.unobserve(t)}},N=function(t,e){t&&(t.loadingCount+=e)},M=function(t,e){t&&(t.toLoadCount=e)},C=function(t){for(var e,n=[],o=0;e=t.children[o];o+=1)"SOURCE"===e.tagName&&n.push(e);return n},V=function(t,e){var n=t.parentNode;n&&"PICTURE"===n.tagName&&C(n).forEach(e)},q=function(t,e){C(t).forEach(e)},z=[s],T=[s,d],P=[s,l,f],R=function(t){return!!t[v]},U=function(t){return t[v]},D=function(t){return delete t[v]},G=function(t,e){if(!R(t)){var n={};e.forEach((function(e){n[e]=t.getAttribute(e)})),t[v]=n}},F=function(t,e){if(R(t)){var n=U(t);e.forEach((function(e){!function(t,e,n){n?t.setAttribute(e,n):t.removeAttribute(e)}(t,e,n[e])}))}},H=function(t,e,n){S(t,e.class_loading),E(t,m),n&&(N(n,1),j(e.callback_loading,t,n))},K=function(t,e,n){n&&t.setAttribute(e,n)},Y=function(t,e){K(t,f,y(t,e.data_sizes)),K(t,l,y(t,e.data_srcset)),K(t,s,y(t,e.data_src))},$={IMG:function(t,e){V(t,(function(t){G(t,P),Y(t,e)})),G(t,P),Y(t,e)},IFRAME:function(t,e){G(t,z),K(t,s,y(t,e.data_src))},VIDEO:function(t,e){q(t,(function(t){G(t,z),K(t,s,y(t,e.data_src))})),G(t,T),K(t,d,y(t,e.data_poster)),K(t,s,y(t,e.data_src)),t.load()}},W=["IMG","IFRAME","VIDEO"],Z=function(t,e){!e||function(t){return t.loadingCount>0}(e)||function(t){return t.toLoadCount>0}(e)||j(t.callback_finish,e)},B=function(t,e,n){t.addEventListener(e,n),t.llEvLisnrs[e]=n},J=function(t,e,n){t.removeEventListener(e,n)},Q=function(t){return!!t.llEvLisnrs},X=function(t){if(Q(t)){var e=t.llEvLisnrs;for(var n in e){var o=e[n];J(t,n,o)}delete t.llEvLisnrs}},tt=function(t,e,n){!function(t){delete t.llTempImage}(t),N(n,-1),function(t){t&&(t.toLoadCount-=1)}(n),I(t,e.class_loading),e.unobserve_completed&&x(t,n)},et=function(t,e,n){var o=k(t)||t;Q(o)||function(t,e,n){Q(t)||(t.llEvLisnrs={});var o="VIDEO"===t.tagName?"loadeddata":"load";B(t,o,e),B(t,"error",n)}(o,(function(r){!function(t,e,n,o){var r=L(e);tt(e,n,o),S(e,n.class_loaded),E(e,p),j(n.callback_loaded,e,o),r||Z(n,o)}(0,t,e,n),X(o)}),(function(r){!function(t,e,n,o){var r=L(e);tt(e,n,o),S(e,n.class_error),E(e,h),j(n.callback_error,e,o),r||Z(n,o)}(0,t,e,n),X(o)}))},nt=function(t,e,n){!function(t){return W.indexOf(t.tagName)>-1}(t)?function(t,e,n){!function(t){t.llTempImage=document.createElement("IMG")}(t),et(t,e,n),function(t){R(t)||(t[v]={backgroundImage:t.style.backgroundImage})}(t),function(t,e,n){var o=y(t,e.data_bg),r=y(t,e.data_bg_hidpi),c=i&&r?r:o;c&&(t.style.backgroundImage='url("'.concat(c,'")'),k(t).setAttribute(s,c),H(t,e,n))}(t,e,n),function(t,e,n){var o=y(t,e.data_bg_multi),r=y(t,e.data_bg_multi_hidpi),c=i&&r?r:o;c&&(t.style.backgroundImage=c,function(t,e,n){S(t,e.class_applied),E(t,b),n&&(e.unobserve_completed&&x(t,e),j(e.callback_applied,t,n))}(t,e,n))}(t,e,n)}(t,e,n):function(t,e,n){et(t,e,n),function(t,e,n){var o=$[t.tagName];o&&(o(t,e),H(t,e,n))}(t,e,n)}(t,e,n)},ot=function(t){t.removeAttribute(s),t.removeAttribute(l),t.removeAttribute(f)},rt=function(t){V(t,(function(t){F(t,P)})),F(t,P)},it={IMG:rt,IFRAME:function(t){F(t,z)},VIDEO:function(t){q(t,(function(t){F(t,z)})),F(t,T),t.load()}},ct=["IMG","IFRAME","VIDEO"],at=function(t){return t.use_native&&"loading"in HTMLImageElement.prototype},ut=function(t){return Array.prototype.slice.call(t)},st=function(t){return t.container.querySelectorAll(t.elements_selector)},lt=function(t){return function(t){return _(t)===h}(t)},ft=function(t,e){return function(t){return ut(t).filter(O)}(t||st(e))},dt=function(t,n){var r=a(t);this._settings=r,this.loadingCount=0,function(t,e){o&&!at(t)&&(e._observer=new IntersectionObserver((function(n){!function(t,e,n){t.forEach((function(t){return function(t){return t.isIntersecting||t.intersectionRatio>0}(t)?function(t,e,n,o){var r=function(t){return A.indexOf(_(t))>=0}(t);E(t,"entered"),S(t,n.class_entered),I(t,n.class_exited),function(t,e,n){e.unobserve_entered&&x(t,n)}(t,n,o),j(n.callback_enter,t,e,o),r||nt(t,n,o)}(t.target,t,e,n):function(t,e,n,o){O(t)||(S(t,n.class_exited),function(t,e,n,o){n.cancel_on_exit&&function(t){return _(t)===m}(t)&&"IMG"===t.tagName&&(X(t),function(t){V(t,(function(t){ot(t)})),ot(t)}(t),rt(t),I(t,n.class_loading),N(o,-1),w(t),j(n.callback_cancel,t,e,o))}(t,e,n,o),j(n.callback_exit,t,e,o))}(t.target,t,e,n)}))}(n,t,e)}),function(t){return{root:t.container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}}(t)))}(r,this),function(t,n){e&&window.addEventListener("online",(function(){!function(t,e){var n;(n=st(t),ut(n).filter(lt)).forEach((function(e){I(e,t.class_error),w(e)})),e.update()}(t,n)}))}(r,this),this.update(n)};return dt.prototype={update:function(t){var e,r,i=this._settings,c=ft(t,i);M(this,c.length),!n&&o?at(i)?function(t,e,n){t.forEach((function(t){-1!==ct.indexOf(t.tagName)&&function(t,e,n){t.setAttribute("loading","lazy"),et(t,e,n),function(t,e){var n=$[t.tagName];n&&n(t,e)}(t,e),E(t,g)}(t,e,n)})),M(n,0)}(c,i,this):(r=c,function(t){t.disconnect()}(e=this._observer),function(t,e){e.forEach((function(e){t.observe(e)}))}(e,r)):this.loadAll(c)},destroy:function(){this._observer&&this._observer.disconnect(),st(this._settings).forEach((function(t){D(t)})),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var e=this,n=this._settings;ft(t,n).forEach((function(t){x(t,e),nt(t,n,e)}))},restoreAll:function(){var t=this._settings;st(t).forEach((function(e){!function(t,e){(function(t){var e=it[t.tagName];e?e(t):function(t){if(R(t)){var e=U(t);t.style.backgroundImage=e.backgroundImage}}(t)})(t),function(t,e){O(t)||L(t)||(I(t,e.class_entered),I(t,e.class_exited),I(t,e.class_applied),I(t,e.class_loading),I(t,e.class_loaded),I(t,e.class_error))}(t,e),w(t),D(t)}(e,t)}))}},dt.load=function(t,e){var n=a(e);nt(t,n)},dt.resetStatus=function(t){w(t)},e&&function(t,e){if(e)if(e.length)for(var n,o=0;n=e[o];o+=1)u(t,n);else u(t,e)}(dt,window.lazyLoadOptions),dt}))},ZtfY:function(t,e){var n,o,r,i,c,a;o="is-visible",r="is-active",i=".js-menu",c=".js-menu-btn",a=function(){document.querySelector(i).classList.toggle(o),document.querySelector(c).classList.toggle(r)},(n=document.querySelector(c))&&n.addEventListener("click",a,!1)},bkGK:function(t,e,n){"use strict";n.r(e);var o=n("RoWv"),r=n.n(o);document.addEventListener("DOMContentLoaded",(function(){new r.a}))},cYEy:function(t,e,n){var o,r;function i(t){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}!function(c,a){"object"==i(e)&&void 0!==t?t.exports=a():void 0===(r="function"==typeof(o=a)?o.call(e,n,e,t):o)||(t.exports=r)}(0,(function(){"use strict";var t=function(){return(t=Object.assign||function(t){for(var e,n=1,o=arguments.length;n<o;n++)for(var r in e=arguments[n])Object.prototype.hasOwnProperty.call(e,r)&&(t[r]=e[r]);return t}).apply(this,arguments)};function e(){var t,e,n=((t=document.createElement("div")).style.cssText="position: fixed; top: 0; height: 100vh; pointer-events: none;",document.documentElement.insertBefore(t,document.documentElement.firstChild),t),o=window.innerHeight,r=n.offsetHeight,i=r-o;return e=n,document.documentElement.removeChild(e),{vh:r,windowHeight:o,offset:i,isNeeded:0!==i,value:0}}function n(){}function o(){var t=e();return t.value=t.offset,t}var r=Object.freeze({noop:n,computeDifference:o,redefineVhUnit:function(){var t=e();return t.value=.01*t.windowHeight,t}});function c(t){return"string"==typeof t&&0<t.length}var a=Object.freeze({cssVarName:"vh-offset",redefineVh:!1,method:o,force:!1,bind:!0,updateOnTouch:!1,onUpdate:n}),u=!1,s=[];try{var l=Object.defineProperty({},"passive",{get:function(){u=!0}});window.addEventListener("test",l,l),window.removeEventListener("test",l,l)}catch(o){u=!1}function f(t,e){s.push({eventName:t,callback:e}),window.addEventListener(t,e,!!u&&{passive:!0})}function d(){s.forEach((function(t){window.removeEventListener(t.eventName,t.callback)})),s=[]}function v(t,e){document.documentElement.style.setProperty("--"+t,e.value+"px")}function m(e,n){return t({},e,{unbind:d,recompute:n.method})}return function(e){var o=Object.freeze(function(e){if(c(e))return t({},a,{cssVarName:e});if("object"!=i(e))return a;var o,u={force:!0===e.force,bind:!1!==e.bind,updateOnTouch:!0===e.updateOnTouch,onUpdate:(o=e.onUpdate,"function"==typeof o?e.onUpdate:n)},s=!0===e.redefineVh;return u.method=r[s?"redefineVhUnit":"computeDifference"],u.cssVarName=c(e.cssVarName)?e.cssVarName:s?"vh":a.cssVarName,u}(e)),u=m(o.method(),o);if(!u.isNeeded&&!o.force)return u;if(v(o.cssVarName,u),o.onUpdate(u),!o.bind)return u;function s(){window.requestAnimationFrame((function(){var t=o.method();v(o.cssVarName,t),o.onUpdate(m(t,o))}))}return u.unbind(),f("orientationchange",s),o.updateOnTouch&&f("touchmove",s),u}}))},"g+Ct":function(t,e){},"uOe+":function(t,e){var n,o,r,i,c,a,u;n="is-visible",o="li.is-visible a[data-project]",r="li.is-visible a.is-active[data-project]",i="picture[data-project]",c=".js-btn-project-info",a=".js-project-info",u=function(){document.querySelector(a).classList.toggle(n)},function(){var t=document.querySelectorAll(o),e=[].slice.call(t),n=document.querySelectorAll(i),a=[].slice.call(n);"ontouchstart"in document.documentElement==0&&e.forEach((function(t){t.addEventListener("mouseover",(function(){var e=t.dataset.project;a.forEach((function(t){t.classList.add("is-hidden")})),document.querySelector('picture[data-project="'+e+'"]').classList.remove("is-hidden")})),t.addEventListener("mouseleave",(function(){a.forEach((function(t){t.classList.add("is-hidden")}));var t=document.querySelector(r).dataset.project;document.querySelector('picture[data-project="'+t+'"]').classList.remove("is-hidden")}))}));var s=document.querySelector(c);s&&s.addEventListener("click",u,!1)}()},ytKA:function(t,e){function n(t){return function(t){if(Array.isArray(t))return o(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return o(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return o(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function o(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,o=new Array(e);n<e;n++)o[n]=t[n];return o}var r,i,c,a,u,s,l;u="is-touched",s=".js-menu li a",l="[data-touch]",r=document.querySelectorAll(s),i=[].slice.call(r),c=document.querySelectorAll(l),a=[].slice.call(c),[].concat(n(i),n(a)).forEach((function(t){t.addEventListener("touchstart",(function(){this.classList.add(u)}),!1),t.addEventListener("touchend",(function(){this.classList.remove(u)}),!1)}))},zFtn:function(t,e){}});