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

/***/ "./resources/metronic/js/pages/features/miscellaneous/session-timeout.js":
/*!*******************************************************************************!*\
  !*** ./resources/metronic/js/pages/features/miscellaneous/session-timeout.js ***!
  \*******************************************************************************/
/***/ (() => {

eval("\n\nvar KTSessionTimeoutDemo = function () {\n  var initDemo = function initDemo() {\n    $.sessionTimeout({\n      title: 'Session Timeout Notification',\n      message: 'Your session is about to expire.',\n      keepAliveUrl: HOST_URL + '/api//session-timeout/keepalive.php',\n      redirUrl: '?p=page_user_lock_1',\n      logoutUrl: '?p=page_user_login_1',\n      warnAfter: 5000,\n      //warn after 5 seconds\n      redirAfter: 15000,\n      //redirect after 15 secons,\n      ignoreUserActivity: true,\n      countdownMessage: 'Redirecting in {timer} seconds.',\n      countdownBar: true\n    });\n  };\n  return {\n    //main function to initiate the module\n    init: function init() {\n      initDemo();\n    }\n  };\n}();\njQuery(document).ready(function () {\n  KTSessionTimeoutDemo.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvbWV0cm9uaWMvanMvcGFnZXMvZmVhdHVyZXMvbWlzY2VsbGFuZW91cy9zZXNzaW9uLXRpbWVvdXQuanMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWIsSUFBSUEsb0JBQW9CLEdBQUcsWUFBWTtFQUNuQyxJQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBUUEsQ0FBQSxFQUFlO0lBQ3ZCQyxDQUFDLENBQUNDLGNBQWMsQ0FBQztNQUNiQyxLQUFLLEVBQUUsOEJBQThCO01BQ3JDQyxPQUFPLEVBQUUsa0NBQWtDO01BQzNDQyxZQUFZLEVBQUVDLFFBQVEsR0FBRyxxQ0FBcUM7TUFDOURDLFFBQVEsRUFBRSxxQkFBcUI7TUFDL0JDLFNBQVMsRUFBRSxzQkFBc0I7TUFDakNDLFNBQVMsRUFBRSxJQUFJO01BQUU7TUFDakJDLFVBQVUsRUFBRSxLQUFLO01BQUU7TUFDbkJDLGtCQUFrQixFQUFFLElBQUk7TUFDeEJDLGdCQUFnQixFQUFFLGlDQUFpQztNQUNuREMsWUFBWSxFQUFFO0lBQ2xCLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRCxPQUFPO0lBQ0g7SUFDQUMsSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBWTtNQUNkZCxRQUFRLENBQUMsQ0FBQztJQUNkO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDO0FBRUhlLE1BQU0sQ0FBQ0MsUUFBUSxDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFXO0VBQzlCbEIsb0JBQW9CLENBQUNlLElBQUksQ0FBQyxDQUFDO0FBQy9CLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9tZXRyb25pYy9qcy9wYWdlcy9mZWF0dXJlcy9taXNjZWxsYW5lb3VzL3Nlc3Npb24tdGltZW91dC5qcz9jZGUxIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxudmFyIEtUU2Vzc2lvblRpbWVvdXREZW1vID0gZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGluaXREZW1vID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICQuc2Vzc2lvblRpbWVvdXQoe1xyXG4gICAgICAgICAgICB0aXRsZTogJ1Nlc3Npb24gVGltZW91dCBOb3RpZmljYXRpb24nLFxyXG4gICAgICAgICAgICBtZXNzYWdlOiAnWW91ciBzZXNzaW9uIGlzIGFib3V0IHRvIGV4cGlyZS4nLFxyXG4gICAgICAgICAgICBrZWVwQWxpdmVVcmw6IEhPU1RfVVJMICsgJy9hcGkvL3Nlc3Npb24tdGltZW91dC9rZWVwYWxpdmUucGhwJyxcclxuICAgICAgICAgICAgcmVkaXJVcmw6ICc/cD1wYWdlX3VzZXJfbG9ja18xJyxcclxuICAgICAgICAgICAgbG9nb3V0VXJsOiAnP3A9cGFnZV91c2VyX2xvZ2luXzEnLFxyXG4gICAgICAgICAgICB3YXJuQWZ0ZXI6IDUwMDAsIC8vd2FybiBhZnRlciA1IHNlY29uZHNcclxuICAgICAgICAgICAgcmVkaXJBZnRlcjogMTUwMDAsIC8vcmVkaXJlY3QgYWZ0ZXIgMTUgc2Vjb25zLFxyXG4gICAgICAgICAgICBpZ25vcmVVc2VyQWN0aXZpdHk6IHRydWUsXHJcbiAgICAgICAgICAgIGNvdW50ZG93bk1lc3NhZ2U6ICdSZWRpcmVjdGluZyBpbiB7dGltZXJ9IHNlY29uZHMuJyxcclxuICAgICAgICAgICAgY291bnRkb3duQmFyOiB0cnVlXHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvL21haW4gZnVuY3Rpb24gdG8gaW5pdGlhdGUgdGhlIG1vZHVsZVxyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaW5pdERlbW8oKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG5qUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gICAgS1RTZXNzaW9uVGltZW91dERlbW8uaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUU2Vzc2lvblRpbWVvdXREZW1vIiwiaW5pdERlbW8iLCIkIiwic2Vzc2lvblRpbWVvdXQiLCJ0aXRsZSIsIm1lc3NhZ2UiLCJrZWVwQWxpdmVVcmwiLCJIT1NUX1VSTCIsInJlZGlyVXJsIiwibG9nb3V0VXJsIiwid2FybkFmdGVyIiwicmVkaXJBZnRlciIsImlnbm9yZVVzZXJBY3Rpdml0eSIsImNvdW50ZG93bk1lc3NhZ2UiLCJjb3VudGRvd25CYXIiLCJpbml0IiwialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/features/miscellaneous/session-timeout.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/metronic/js/pages/features/miscellaneous/session-timeout.js"]();
/******/ 	
/******/ })()
;