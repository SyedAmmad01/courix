/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/metronic/js/pages/crud/forms/editors/tinymce.js":
/*!*******************************************************************!*\
  !*** ./resources/metronic/js/pages/crud/forms/editors/tinymce.js ***!
  \*******************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTTinymce = function () {\n  // Private functions\n  var demos = function demos() {\n    tinymce.init({\n      selector: '#kt-tinymce-1',\n      toolbar: false,\n      statusbar: false\n    });\n    tinymce.init({\n      selector: '#kt-tinymce-2'\n    });\n    tinymce.init({\n      selector: '#kt-tinymce-3',\n      toolbar: 'advlist | autolink | link image | lists charmap | print preview',\n      plugins: 'advlist autolink link image lists charmap print preview'\n    });\n    tinymce.init({\n      selector: '#kt-tinymce-4',\n      menubar: false,\n      toolbar: ['styleselect fontselect fontsizeselect', 'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify', 'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],\n      plugins: 'advlist autolink link image lists charmap print preview code'\n    });\n  };\n  return {\n    // public functions\n    init: function init() {\n      demos();\n    }\n  };\n}();\n\n// Initialization\njQuery(document).ready(function () {\n  KTTinymce.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvbWV0cm9uaWMvanMvcGFnZXMvY3J1ZC9mb3Jtcy9lZGl0b3JzL3RpbnltY2UuanMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBQ2I7QUFFQSxJQUFJQSxTQUFTLEdBQUcsWUFBWTtFQUN4QjtFQUNBLElBQUlDLEtBQUssR0FBRyxTQUFSQSxLQUFLQSxDQUFBLEVBQWU7SUFFcEJDLE9BQU8sQ0FBQ0MsSUFBSSxDQUFDO01BQ2xCQyxRQUFRLEVBQUUsZUFBZTtNQUNoQkMsT0FBTyxFQUFFLEtBQUs7TUFDZEMsU0FBUyxFQUFFO0lBQ3JCLENBQUMsQ0FBQztJQUVGSixPQUFPLENBQUNDLElBQUksQ0FBQztNQUNaQyxRQUFRLEVBQUU7SUFDTCxDQUFDLENBQUM7SUFFRkYsT0FBTyxDQUFDQyxJQUFJLENBQUM7TUFDVEMsUUFBUSxFQUFFLGVBQWU7TUFDekJDLE9BQU8sRUFBRSxpRUFBaUU7TUFDMUVFLE9BQU8sRUFBRztJQUNkLENBQUMsQ0FBQztJQUVGTCxPQUFPLENBQUNDLElBQUksQ0FBQztNQUNUQyxRQUFRLEVBQUUsZUFBZTtNQUN6QkksT0FBTyxFQUFFLEtBQUs7TUFDZEgsT0FBTyxFQUFFLENBQUMsdUNBQXVDLEVBQzdDLHVHQUF1RyxFQUN2RyxrSUFBa0ksQ0FBQztNQUN2SUUsT0FBTyxFQUFHO0lBQ2QsQ0FBQyxDQUFDO0VBQ04sQ0FBQztFQUVELE9BQU87SUFDSDtJQUNBSixJQUFJLEVBQUUsU0FBQUEsS0FBQSxFQUFXO01BQ2JGLEtBQUssQ0FBQyxDQUFDO0lBQ1g7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQVEsTUFBTSxDQUFDQyxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVc7RUFDOUJYLFNBQVMsQ0FBQ0csSUFBSSxDQUFDLENBQUM7QUFDcEIsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL21ldHJvbmljL2pzL3BhZ2VzL2NydWQvZm9ybXMvZWRpdG9ycy90aW55bWNlLmpzPzY0ODYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxuXHJcbnZhciBLVFRpbnltY2UgPSBmdW5jdGlvbiAoKSB7ICAgIFxyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBkZW1vcyA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBcclxuICAgICAgICB0aW55bWNlLmluaXQoe1xyXG5cdFx0XHRzZWxlY3RvcjogJyNrdC10aW55bWNlLTEnLFxyXG4gICAgICAgICAgICB0b29sYmFyOiBmYWxzZSxcclxuICAgICAgICAgICAgc3RhdHVzYmFyOiBmYWxzZVxyXG5cdFx0fSk7XHJcblxyXG5cdFx0dGlueW1jZS5pbml0KHtcclxuXHRcdFx0c2VsZWN0b3I6ICcja3QtdGlueW1jZS0yJ1xyXG4gICAgICAgIH0pO1xyXG4gICAgICAgIFxyXG4gICAgICAgIHRpbnltY2UuaW5pdCh7XHJcbiAgICAgICAgICAgIHNlbGVjdG9yOiAnI2t0LXRpbnltY2UtMycsXHJcbiAgICAgICAgICAgIHRvb2xiYXI6ICdhZHZsaXN0IHwgYXV0b2xpbmsgfCBsaW5rIGltYWdlIHwgbGlzdHMgY2hhcm1hcCB8IHByaW50IHByZXZpZXcnLCBcclxuICAgICAgICAgICAgcGx1Z2lucyA6ICdhZHZsaXN0IGF1dG9saW5rIGxpbmsgaW1hZ2UgbGlzdHMgY2hhcm1hcCBwcmludCBwcmV2aWV3J1xyXG4gICAgICAgIH0pO1xyXG4gICAgICAgIFxyXG4gICAgICAgIHRpbnltY2UuaW5pdCh7XHJcbiAgICAgICAgICAgIHNlbGVjdG9yOiAnI2t0LXRpbnltY2UtNCcsXHJcbiAgICAgICAgICAgIG1lbnViYXI6IGZhbHNlLFxyXG4gICAgICAgICAgICB0b29sYmFyOiBbJ3N0eWxlc2VsZWN0IGZvbnRzZWxlY3QgZm9udHNpemVzZWxlY3QnLFxyXG4gICAgICAgICAgICAgICAgJ3VuZG8gcmVkbyB8IGN1dCBjb3B5IHBhc3RlIHwgYm9sZCBpdGFsaWMgfCBsaW5rIGltYWdlIHwgYWxpZ25sZWZ0IGFsaWduY2VudGVyIGFsaWducmlnaHQgYWxpZ25qdXN0aWZ5JyxcclxuICAgICAgICAgICAgICAgICdidWxsaXN0IG51bWxpc3QgfCBvdXRkZW50IGluZGVudCB8IGJsb2NrcXVvdGUgc3Vic2NyaXB0IHN1cGVyc2NyaXB0IHwgYWR2bGlzdCB8IGF1dG9saW5rIHwgbGlzdHMgY2hhcm1hcCB8IHByaW50IHByZXZpZXcgfCAgY29kZSddLCBcclxuICAgICAgICAgICAgcGx1Z2lucyA6ICdhZHZsaXN0IGF1dG9saW5rIGxpbmsgaW1hZ2UgbGlzdHMgY2hhcm1hcCBwcmludCBwcmV2aWV3IGNvZGUnXHJcbiAgICAgICAgfSk7ICAgICAgIFxyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gcHVibGljIGZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBkZW1vcygpOyBcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBJbml0aWFsaXphdGlvblxyXG5qUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gICAgS1RUaW55bWNlLmluaXQoKTtcclxufSk7Il0sIm5hbWVzIjpbIktUVGlueW1jZSIsImRlbW9zIiwidGlueW1jZSIsImluaXQiLCJzZWxlY3RvciIsInRvb2xiYXIiLCJzdGF0dXNiYXIiLCJwbHVnaW5zIiwibWVudWJhciIsImpRdWVyeSIsImRvY3VtZW50IiwicmVhZHkiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/crud/forms/editors/tinymce.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/metronic/js/pages/crud/forms/editors/tinymce.js"]();
/******/ 	
/******/ })()
;