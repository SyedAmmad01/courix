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

/***/ "./resources/metronic/js/pages/custom/login/login-4.js":
/*!*************************************************************!*\
  !*** ./resources/metronic/js/pages/custom/login/login-4.js ***!
  \*************************************************************/
/***/ (() => {

eval("\n\n// Class Definition\nvar KTLogin = function () {\n  var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';\n  var _handleFormSignin = function _handleFormSignin() {\n    var form = KTUtil.getById('kt_login_singin_form');\n    var formSubmitUrl = KTUtil.attr(form, 'action');\n    var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');\n    if (!form) {\n      return;\n    }\n    FormValidation.formValidation(form, {\n      fields: {\n        username: {\n          validators: {\n            notEmpty: {\n              message: 'Username is required'\n            }\n          }\n        },\n        password: {\n          validators: {\n            notEmpty: {\n              message: 'Password is required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        submitButton: new FormValidation.plugins.SubmitButton(),\n        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation\n        bootstrap: new FormValidation.plugins.Bootstrap({\n          //\teleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons\n          //\teleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons\n        })\n      }\n    }).on('core.form.valid', function () {\n      // Show loading state on button\n      KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, \"Please wait\");\n\n      // Simulate Ajax request\n      setTimeout(function () {\n        KTUtil.btnRelease(formSubmitButton);\n      }, 2000);\n\n      // Form Validation & Ajax Submission: https://formvalidation.io/guide/examples/using-ajax-to-submit-the-form\n      /**\r\n            FormValidation.utils.fetch(formSubmitUrl, {\r\n                method: 'POST',\r\n      \tdataType: 'json',\r\n                params: {\r\n                    name: form.querySelector('[name=\"username\"]').value,\r\n                    email: form.querySelector('[name=\"password\"]').value,\r\n                },\r\n            }).then(function(response) { // Return valid JSON\r\n      \t// Release button\r\n      \tKTUtil.btnRelease(formSubmitButton);\r\n      \t\t\tif (response && typeof response === 'object' && response.status && response.status == 'success') {\r\n      \t\tSwal.fire({\r\n                     text: \"All is cool! Now you submit this form\",\r\n                     icon: \"success\",\r\n                     buttonsStyling: false,\r\n      \t\t\tconfirmButtonText: \"Ok, got it!\",\r\n      \t\t\tcustomClass: {\r\n      \t\t\t\tconfirmButton: \"btn font-weight-bold btn-light-primary\"\r\n      \t\t\t}\r\n                 }).then(function() {\r\n      \t\t\tKTUtil.scrollTop();\r\n      \t\t});\r\n      \t} else {\r\n      \t\tSwal.fire({\r\n                     text: \"Sorry, something went wrong, please try again.\",\r\n                     icon: \"error\",\r\n                     buttonsStyling: false,\r\n      \t\t\tconfirmButtonText: \"Ok, got it!\",\r\n      \t\t\tcustomClass: {\r\n      \t\t\t\tconfirmButton: \"btn font-weight-bold btn-light-primary\"\r\n      \t\t\t}\r\n                 }).then(function() {\r\n      \t\t\tKTUtil.scrollTop();\r\n      \t\t});\r\n      \t}\r\n            });\r\n      **/\n    }).on('core.form.invalid', function () {\n      Swal.fire({\n        text: \"Sorry, looks like there are some errors detected, please try again.\",\n        icon: \"error\",\n        buttonsStyling: false,\n        confirmButtonText: \"Ok, got it!\",\n        customClass: {\n          confirmButton: \"btn font-weight-bold btn-light-primary\"\n        }\n      }).then(function () {\n        KTUtil.scrollTop();\n      });\n    });\n  };\n  var _handleFormForgot = function _handleFormForgot() {\n    var form = KTUtil.getById('kt_login_forgot_form');\n    var formSubmitUrl = KTUtil.attr(form, 'action');\n    var formSubmitButton = KTUtil.getById('kt_login_forgot_form_submit_button');\n    if (!form) {\n      return;\n    }\n    FormValidation.formValidation(form, {\n      fields: {\n        email: {\n          validators: {\n            notEmpty: {\n              message: 'Email is required'\n            },\n            emailAddress: {\n              message: 'The value is not a valid email address'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        submitButton: new FormValidation.plugins.SubmitButton(),\n        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation\n        bootstrap: new FormValidation.plugins.Bootstrap({\n          //\teleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons\n          //\teleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons\n        })\n      }\n    }).on('core.form.valid', function () {\n      // Show loading state on button\n      KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, \"Please wait\");\n\n      // Simulate Ajax request\n      setTimeout(function () {\n        KTUtil.btnRelease(formSubmitButton);\n      }, 2000);\n    }).on('core.form.invalid', function () {\n      Swal.fire({\n        text: \"Sorry, looks like there are some errors detected, please try again.\",\n        icon: \"error\",\n        buttonsStyling: false,\n        confirmButtonText: \"Ok, got it!\",\n        customClass: {\n          confirmButton: \"btn font-weight-bold btn-light-primary\"\n        }\n      }).then(function () {\n        KTUtil.scrollTop();\n      });\n    });\n  };\n  var _handleFormSignup = function _handleFormSignup() {\n    // Base elements\n    var wizardEl = KTUtil.getById('kt_login');\n    var form = KTUtil.getById('kt_login_signup_form');\n    var wizardObj;\n    var validations = [];\n    if (!form) {\n      return;\n    }\n\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    // Step 1\n    validations.push(FormValidation.formValidation(form, {\n      fields: {\n        fname: {\n          validators: {\n            notEmpty: {\n              message: 'First name is required'\n            }\n          }\n        },\n        lname: {\n          validators: {\n            notEmpty: {\n              message: 'Last Name is required'\n            }\n          }\n        },\n        phone: {\n          validators: {\n            notEmpty: {\n              message: 'Phone is required'\n            }\n          }\n        },\n        email: {\n          validators: {\n            notEmpty: {\n              message: 'Email is required'\n            },\n            emailAddress: {\n              message: 'The value is not a valid email address'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        // Bootstrap Framework Integration\n        bootstrap: new FormValidation.plugins.Bootstrap({\n          //eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    }));\n\n    // Step 2\n    validations.push(FormValidation.formValidation(form, {\n      fields: {\n        address1: {\n          validators: {\n            notEmpty: {\n              message: 'Address is required'\n            }\n          }\n        },\n        postcode: {\n          validators: {\n            notEmpty: {\n              message: 'Postcode is required'\n            }\n          }\n        },\n        city: {\n          validators: {\n            notEmpty: {\n              message: 'City is required'\n            }\n          }\n        },\n        state: {\n          validators: {\n            notEmpty: {\n              message: 'State is required'\n            }\n          }\n        },\n        country: {\n          validators: {\n            notEmpty: {\n              message: 'Country is required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        // Bootstrap Framework Integration\n        bootstrap: new FormValidation.plugins.Bootstrap({\n          //eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    }));\n\n    // Initialize form wizard\n    wizardObj = new KTWizard(wizardEl, {\n      startStep: 1,\n      // initial active step number\n      clickableSteps: false // allow step clicking\n    });\n\n    // Validation before going to next page\n    wizardObj.on('change', function (wizard) {\n      if (wizard.getStep() > wizard.getNewStep()) {\n        return; // Skip if stepped back\n      }\n\n      // Validate form before change wizard step\n      var validator = validations[wizard.getStep() - 1]; // get validator for currnt step\n\n      if (validator) {\n        validator.validate().then(function (status) {\n          if (status == 'Valid') {\n            wizard.goTo(wizard.getNewStep());\n            KTUtil.scrollTop();\n          } else {\n            Swal.fire({\n              text: \"Sorry, looks like there are some errors detected, please try again.\",\n              icon: \"error\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn font-weight-bold btn-light\"\n              }\n            }).then(function () {\n              KTUtil.scrollTop();\n            });\n          }\n        });\n      }\n      return false; // Do not change wizard step, further action will be handled by he validator\n    });\n\n    // Change event\n    wizardObj.on('changed', function (wizard) {\n      KTUtil.scrollTop();\n    });\n\n    // Submit event\n    wizardObj.on('submit', function (wizard) {\n      Swal.fire({\n        text: \"All is good! Please confirm the form submission.\",\n        icon: \"success\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, submit!\",\n        cancelButtonText: \"No, cancel\",\n        customClass: {\n          confirmButton: \"btn font-weight-bold btn-primary\",\n          cancelButton: \"btn font-weight-bold btn-default\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          form.submit(); // Submit form\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Your form has not been submitted!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  };\n\n  // Public Functions\n  return {\n    init: function init() {\n      _handleFormSignin();\n      _handleFormForgot();\n      _handleFormSignup();\n    }\n  };\n}();\n\n// Class Initialization\njQuery(document).ready(function () {\n  KTLogin.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvbWV0cm9uaWMvanMvcGFnZXMvY3VzdG9tL2xvZ2luL2xvZ2luLTQuanMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxPQUFPLEdBQUcsWUFBVztFQUN4QixJQUFJQyxxQkFBcUIsR0FBRywyQ0FBMkM7RUFFdkUsSUFBSUMsaUJBQWlCLEdBQUcsU0FBcEJBLGlCQUFpQkEsQ0FBQSxFQUFjO0lBQ2xDLElBQUlDLElBQUksR0FBR0MsTUFBTSxDQUFDQyxPQUFPLENBQUMsc0JBQXNCLENBQUM7SUFDakQsSUFBSUMsYUFBYSxHQUFHRixNQUFNLENBQUNHLElBQUksQ0FBQ0osSUFBSSxFQUFFLFFBQVEsQ0FBQztJQUMvQyxJQUFJSyxnQkFBZ0IsR0FBR0osTUFBTSxDQUFDQyxPQUFPLENBQUMsb0NBQW9DLENBQUM7SUFFM0UsSUFBSSxDQUFDRixJQUFJLEVBQUU7TUFDVjtJQUNEO0lBRUFNLGNBQWMsQ0FDVEMsY0FBYyxDQUNYUCxJQUFJLEVBQ0o7TUFDSVEsTUFBTSxFQUFFO1FBQ2hCQyxRQUFRLEVBQUU7VUFDVEMsVUFBVSxFQUFFO1lBQ1hDLFFBQVEsRUFBRTtjQUNUQyxPQUFPLEVBQUU7WUFDVjtVQUNEO1FBQ0QsQ0FBQztRQUNEQyxRQUFRLEVBQUU7VUFDVEgsVUFBVSxFQUFFO1lBQ1hDLFFBQVEsRUFBRTtjQUNUQyxPQUFPLEVBQUU7WUFDVjtVQUNEO1FBQ0Q7TUFDUSxDQUFDO01BQ0RFLE9BQU8sRUFBRTtRQUNqQkMsT0FBTyxFQUFFLElBQUlULGNBQWMsQ0FBQ1EsT0FBTyxDQUFDRSxPQUFPLENBQUMsQ0FBQztRQUM3Q0MsWUFBWSxFQUFFLElBQUlYLGNBQWMsQ0FBQ1EsT0FBTyxDQUFDSSxZQUFZLENBQUMsQ0FBQztRQUM5QztRQUNUQyxTQUFTLEVBQUUsSUFBSWIsY0FBYyxDQUFDUSxPQUFPLENBQUNNLFNBQVMsQ0FBQztVQUNoRDtVQUNBO1FBQUEsQ0FDQztNQUNPO0lBQ0osQ0FDSixDQUFDLENBQ0FDLEVBQUUs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SixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQWdDLE1BQU0sQ0FBQ0MsUUFBUSxDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFXO0VBQzlCM0UsT0FBTyxDQUFDd0UsSUFBSSxDQUFDLENBQUM7QUFDbEIsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL21ldHJvbmljL2pzL3BhZ2VzL2N1c3RvbS9sb2dpbi9sb2dpbi00LmpzP2JjMjciXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBEZWZpbml0aW9uXHJcbnZhciBLVExvZ2luID0gZnVuY3Rpb24oKSB7XHJcblx0dmFyIF9idXR0b25TcGlubmVyQ2xhc3NlcyA9ICdzcGlubmVyIHNwaW5uZXItcmlnaHQgc3Bpbm5lci13aGl0ZSBwci0xNSc7XHJcblxyXG5cdHZhciBfaGFuZGxlRm9ybVNpZ25pbiA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0dmFyIGZvcm0gPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fc2luZ2luX2Zvcm0nKTtcclxuXHRcdHZhciBmb3JtU3VibWl0VXJsID0gS1RVdGlsLmF0dHIoZm9ybSwgJ2FjdGlvbicpO1xyXG5cdFx0dmFyIGZvcm1TdWJtaXRCdXR0b24gPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fc2luZ2luX2Zvcm1fc3VibWl0X2J1dHRvbicpO1xyXG5cclxuXHRcdGlmICghZm9ybSkge1xyXG5cdFx0XHRyZXR1cm47XHJcblx0XHR9XHJcblxyXG5cdFx0Rm9ybVZhbGlkYXRpb25cclxuXHRcdCAgICAuZm9ybVZhbGlkYXRpb24oXHJcblx0XHQgICAgICAgIGZvcm0sXHJcblx0XHQgICAgICAgIHtcclxuXHRcdCAgICAgICAgICAgIGZpZWxkczoge1xyXG5cdFx0XHRcdFx0XHR1c2VybmFtZToge1xyXG5cdFx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdVc2VybmFtZSBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRcdHBhc3N3b3JkOiB7XHJcblx0XHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xyXG5cdFx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1Bhc3N3b3JkIGlzIHJlcXVpcmVkJ1xyXG5cdFx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0ICAgICAgICAgICAgfSxcclxuXHRcdCAgICAgICAgICAgIHBsdWdpbnM6IHtcclxuXHRcdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG5cdFx0XHRcdFx0XHRzdWJtaXRCdXR0b246IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLlN1Ym1pdEJ1dHRvbigpLFxyXG5cdCAgICAgICAgICAgIFx0XHQvL2RlZmF1bHRTdWJtaXQ6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLkRlZmF1bHRTdWJtaXQoKSwgLy8gVW5jb21tZW50IHRoaXMgbGluZSB0byBlbmFibGUgbm9ybWFsIGJ1dHRvbiBzdWJtaXQgYWZ0ZXIgZm9ybSB2YWxpZGF0aW9uXHJcblx0XHRcdFx0XHRcdGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwKHtcclxuXHRcdFx0XHRcdFx0Ly9cdGVsZUludmFsaWRDbGFzczogJycsIC8vIFJlcGFjZSB3aXRoIHVuY29tbWVudCB0byBoaWRlIGJvb3RzdHJhcCB2YWxpZGF0aW9uIGljb25zXHJcblx0XHRcdFx0XHRcdC8vXHRlbGVWYWxpZENsYXNzOiAnJywgICAvLyBSZXBhY2Ugd2l0aCB1bmNvbW1lbnQgdG8gaGlkZSBib290c3RyYXAgdmFsaWRhdGlvbiBpY29uc1xyXG5cdFx0XHRcdFx0XHR9KVxyXG5cdFx0ICAgICAgICAgICAgfVxyXG5cdFx0ICAgICAgICB9XHJcblx0XHQgICAgKVxyXG5cdFx0ICAgIC5vbignY29yZS5mb3JtLnZhbGlkJywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0Ly8gU2hvdyBsb2FkaW5nIHN0YXRlIG9uIGJ1dHRvblxyXG5cdFx0XHRcdEtUVXRpbC5idG5XYWl0KGZvcm1TdWJtaXRCdXR0b24sIF9idXR0b25TcGlubmVyQ2xhc3NlcywgXCJQbGVhc2Ugd2FpdFwiKTtcclxuXHJcblx0XHRcdFx0Ly8gU2ltdWxhdGUgQWpheCByZXF1ZXN0XHJcblx0XHRcdFx0c2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdEtUVXRpbC5idG5SZWxlYXNlKGZvcm1TdWJtaXRCdXR0b24pO1xyXG5cdFx0XHRcdH0sIDIwMDApO1xyXG5cclxuXHRcdFx0XHQvLyBGb3JtIFZhbGlkYXRpb24gJiBBamF4IFN1Ym1pc3Npb246IGh0dHBzOi8vZm9ybXZhbGlkYXRpb24uaW8vZ3VpZGUvZXhhbXBsZXMvdXNpbmctYWpheC10by1zdWJtaXQtdGhlLWZvcm1cclxuXHRcdFx0XHQvKipcclxuXHRcdCAgICAgICAgRm9ybVZhbGlkYXRpb24udXRpbHMuZmV0Y2goZm9ybVN1Ym1pdFVybCwge1xyXG5cdFx0ICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcblx0XHRcdFx0XHRkYXRhVHlwZTogJ2pzb24nLFxyXG5cdFx0ICAgICAgICAgICAgcGFyYW1zOiB7XHJcblx0XHQgICAgICAgICAgICAgICAgbmFtZTogZm9ybS5xdWVyeVNlbGVjdG9yKCdbbmFtZT1cInVzZXJuYW1lXCJdJykudmFsdWUsXHJcblx0XHQgICAgICAgICAgICAgICAgZW1haWw6IGZvcm0ucXVlcnlTZWxlY3RvcignW25hbWU9XCJwYXNzd29yZFwiXScpLnZhbHVlLFxyXG5cdFx0ICAgICAgICAgICAgfSxcclxuXHRcdCAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXNwb25zZSkgeyAvLyBSZXR1cm4gdmFsaWQgSlNPTlxyXG5cdFx0XHRcdFx0Ly8gUmVsZWFzZSBidXR0b25cclxuXHRcdFx0XHRcdEtUVXRpbC5idG5SZWxlYXNlKGZvcm1TdWJtaXRCdXR0b24pO1xyXG5cclxuXHRcdFx0XHRcdGlmIChyZXNwb25zZSAmJiB0eXBlb2YgcmVzcG9uc2UgPT09ICdvYmplY3QnICYmIHJlc3BvbnNlLnN0YXR1cyAmJiByZXNwb25zZS5zdGF0dXMgPT0gJ3N1Y2Nlc3MnKSB7XHJcblx0XHRcdFx0XHRcdFN3YWwuZmlyZSh7XHJcblx0XHRcdCAgICAgICAgICAgICAgICB0ZXh0OiBcIkFsbCBpcyBjb29sISBOb3cgeW91IHN1Ym1pdCB0aGlzIGZvcm1cIixcclxuXHRcdFx0ICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG5cdFx0XHQgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcblx0XHRcdFx0XHRcdFx0Y3VzdG9tQ2xhc3M6IHtcclxuXHRcdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0ICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdFx0U3dhbC5maXJlKHtcclxuXHRcdFx0ICAgICAgICAgICAgICAgIHRleHQ6IFwiU29ycnksIHNvbWV0aGluZyB3ZW50IHdyb25nLCBwbGVhc2UgdHJ5IGFnYWluLlwiLFxyXG5cdFx0XHQgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxyXG5cdFx0XHQgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcblx0XHRcdFx0XHRcdFx0Y3VzdG9tQ2xhc3M6IHtcclxuXHRcdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0ICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdFx0fVxyXG5cdFx0ICAgICAgICB9KTtcclxuXHRcdFx0XHQqKi9cclxuXHRcdCAgICB9KVxyXG5cdFx0XHQub24oJ2NvcmUuZm9ybS5pbnZhbGlkJywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0U3dhbC5maXJlKHtcclxuXHRcdFx0XHRcdHRleHQ6IFwiU29ycnksIGxvb2tzIGxpa2UgdGhlcmUgYXJlIHNvbWUgZXJyb3JzIGRldGVjdGVkLCBwbGVhc2UgdHJ5IGFnYWluLlwiLFxyXG5cdFx0XHRcdFx0aWNvbjogXCJlcnJvclwiLFxyXG5cdFx0XHRcdFx0YnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0XHRcdFx0Y29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuXHRcdFx0XHRcdGN1c3RvbUNsYXNzOiB7XHJcblx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG5cdFx0XHRcdFx0fVxyXG5cdFx0XHRcdH0pLnRoZW4oZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0fSk7XHJcblx0XHQgICAgfSk7XHJcbiAgICB9XHJcblxyXG5cdHZhciBfaGFuZGxlRm9ybUZvcmdvdCA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0dmFyIGZvcm0gPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fZm9yZ290X2Zvcm0nKTtcclxuXHRcdHZhciBmb3JtU3VibWl0VXJsID0gS1RVdGlsLmF0dHIoZm9ybSwgJ2FjdGlvbicpO1xyXG5cdFx0dmFyIGZvcm1TdWJtaXRCdXR0b24gPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fZm9yZ290X2Zvcm1fc3VibWl0X2J1dHRvbicpO1xyXG5cclxuXHRcdGlmICghZm9ybSkge1xyXG5cdFx0XHRyZXR1cm47XHJcblx0XHR9XHJcblxyXG5cdFx0Rm9ybVZhbGlkYXRpb25cclxuXHRcdCAgICAuZm9ybVZhbGlkYXRpb24oXHJcblx0XHQgICAgICAgIGZvcm0sXHJcblx0XHQgICAgICAgIHtcclxuXHRcdCAgICAgICAgICAgIGZpZWxkczoge1xyXG5cdFx0XHRcdFx0XHRlbWFpbDoge1xyXG5cdFx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdFbWFpbCBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRcdFx0XHRlbWFpbEFkZHJlc3M6IHtcclxuXHRcdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1RoZSB2YWx1ZSBpcyBub3QgYSB2YWxpZCBlbWFpbCBhZGRyZXNzJ1xyXG5cdFx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0ICAgICAgICAgICAgfSxcclxuXHRcdCAgICAgICAgICAgIHBsdWdpbnM6IHtcclxuXHRcdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG5cdFx0XHRcdFx0XHRzdWJtaXRCdXR0b246IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLlN1Ym1pdEJ1dHRvbigpLFxyXG5cdCAgICAgICAgICAgIFx0XHQvL2RlZmF1bHRTdWJtaXQ6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLkRlZmF1bHRTdWJtaXQoKSwgLy8gVW5jb21tZW50IHRoaXMgbGluZSB0byBlbmFibGUgbm9ybWFsIGJ1dHRvbiBzdWJtaXQgYWZ0ZXIgZm9ybSB2YWxpZGF0aW9uXHJcblx0XHRcdFx0XHRcdGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwKHtcclxuXHRcdFx0XHRcdFx0Ly9cdGVsZUludmFsaWRDbGFzczogJycsIC8vIFJlcGFjZSB3aXRoIHVuY29tbWVudCB0byBoaWRlIGJvb3RzdHJhcCB2YWxpZGF0aW9uIGljb25zXHJcblx0XHRcdFx0XHRcdC8vXHRlbGVWYWxpZENsYXNzOiAnJywgICAvLyBSZXBhY2Ugd2l0aCB1bmNvbW1lbnQgdG8gaGlkZSBib290c3RyYXAgdmFsaWRhdGlvbiBpY29uc1xyXG5cdFx0XHRcdFx0XHR9KVxyXG5cdFx0ICAgICAgICAgICAgfVxyXG5cdFx0ICAgICAgICB9XHJcblx0XHQgICAgKVxyXG5cdFx0ICAgIC5vbignY29yZS5mb3JtLnZhbGlkJywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0Ly8gU2hvdyBsb2FkaW5nIHN0YXRlIG9uIGJ1dHRvblxyXG5cdFx0XHRcdEtUVXRpbC5idG5XYWl0KGZvcm1TdWJtaXRCdXR0b24sIF9idXR0b25TcGlubmVyQ2xhc3NlcywgXCJQbGVhc2Ugd2FpdFwiKTtcclxuXHJcblx0XHRcdFx0Ly8gU2ltdWxhdGUgQWpheCByZXF1ZXN0XHJcblx0XHRcdFx0c2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdEtUVXRpbC5idG5SZWxlYXNlKGZvcm1TdWJtaXRCdXR0b24pO1xyXG5cdFx0XHRcdH0sIDIwMDApO1xyXG5cdFx0ICAgIH0pXHJcblx0XHRcdC5vbignY29yZS5mb3JtLmludmFsaWQnLCBmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRTd2FsLmZpcmUoe1xyXG5cdFx0XHRcdFx0dGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXHJcblx0XHRcdFx0XHRpY29uOiBcImVycm9yXCIsXHJcblx0XHRcdFx0XHRidXR0b25zU3R5bGluZzogZmFsc2UsXHJcblx0XHRcdFx0XHRjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG5cdFx0XHRcdFx0Y3VzdG9tQ2xhc3M6IHtcclxuXHRcdFx0XHRcdFx0Y29uZmlybUJ1dHRvbjogXCJidG4gZm9udC13ZWlnaHQtYm9sZCBidG4tbGlnaHQtcHJpbWFyeVwiXHJcblx0XHRcdFx0XHR9XHJcblx0XHRcdFx0fSkudGhlbihmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdEtUVXRpbC5zY3JvbGxUb3AoKTtcclxuXHRcdFx0XHR9KTtcclxuXHRcdCAgICB9KTtcclxuICAgIH1cclxuXHJcblx0dmFyIF9oYW5kbGVGb3JtU2lnbnVwID0gZnVuY3Rpb24oKSB7XHJcblx0XHQvLyBCYXNlIGVsZW1lbnRzXHJcblx0XHR2YXIgd2l6YXJkRWwgPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW4nKTtcclxuXHRcdHZhciBmb3JtID0gS1RVdGlsLmdldEJ5SWQoJ2t0X2xvZ2luX3NpZ251cF9mb3JtJyk7XHJcblx0XHR2YXIgd2l6YXJkT2JqO1xyXG5cdFx0dmFyIHZhbGlkYXRpb25zID0gW107XHJcblxyXG5cdFx0aWYgKCFmb3JtKSB7XHJcblx0XHRcdHJldHVybjtcclxuXHRcdH1cclxuXHJcblx0XHQvLyBJbml0IGZvcm0gdmFsaWRhdGlvbiBydWxlcy4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgRm9ybVZhbGlkYXRpb24gcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjpodHRwczovL2Zvcm12YWxpZGF0aW9uLmlvL1xyXG5cdFx0Ly8gU3RlcCAxXHJcblx0XHR2YWxpZGF0aW9ucy5wdXNoKEZvcm1WYWxpZGF0aW9uLmZvcm1WYWxpZGF0aW9uKFxyXG5cdFx0XHRmb3JtLFxyXG5cdFx0XHR7XHJcblx0XHRcdFx0ZmllbGRzOiB7XHJcblx0XHRcdFx0XHRmbmFtZToge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdGaXJzdCBuYW1lIGlzIHJlcXVpcmVkJ1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fSxcclxuXHRcdFx0XHRcdGxuYW1lOiB7XHJcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ0xhc3QgTmFtZSBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRwaG9uZToge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdQaG9uZSBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRlbWFpbDoge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdFbWFpbCBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHR9LFxyXG5cdFx0XHRcdFx0XHRcdGVtYWlsQWRkcmVzczoge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1RoZSB2YWx1ZSBpcyBub3QgYSB2YWxpZCBlbWFpbCBhZGRyZXNzJ1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fVxyXG5cdFx0XHRcdH0sXHJcblx0XHRcdFx0cGx1Z2luczoge1xyXG5cdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG5cdFx0XHRcdFx0Ly8gQm9vdHN0cmFwIEZyYW1ld29yayBJbnRlZ3JhdGlvblxyXG5cdFx0XHRcdFx0Ym9vdHN0cmFwOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5Cb290c3RyYXAoe1xyXG5cdFx0XHRcdFx0XHQvL2VsZUludmFsaWRDbGFzczogJycsXHJcblx0XHRcdFx0XHRcdGVsZVZhbGlkQ2xhc3M6ICcnLFxyXG5cdFx0XHRcdFx0fSlcclxuXHRcdFx0XHR9XHJcblx0XHRcdH1cclxuXHRcdCkpO1xyXG5cclxuXHRcdC8vIFN0ZXAgMlxyXG5cdFx0dmFsaWRhdGlvbnMucHVzaChGb3JtVmFsaWRhdGlvbi5mb3JtVmFsaWRhdGlvbihcclxuXHRcdFx0Zm9ybSxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGZpZWxkczoge1xyXG5cdFx0XHRcdFx0YWRkcmVzczE6IHtcclxuXHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xyXG5cdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnQWRkcmVzcyBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRwb3N0Y29kZToge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdQb3N0Y29kZSBpcyByZXF1aXJlZCdcclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH0sXHJcblx0XHRcdFx0XHRjaXR5OiB7XHJcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ0NpdHkgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHR9LFxyXG5cdFx0XHRcdFx0c3RhdGU6IHtcclxuXHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xyXG5cdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnU3RhdGUgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHR9LFxyXG5cdFx0XHRcdFx0Y291bnRyeToge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdDb3VudHJ5IGlzIHJlcXVpcmVkJ1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fVxyXG5cdFx0XHRcdH0sXHJcblx0XHRcdFx0cGx1Z2luczoge1xyXG5cdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG5cdFx0XHRcdFx0Ly8gQm9vdHN0cmFwIEZyYW1ld29yayBJbnRlZ3JhdGlvblxyXG5cdFx0XHRcdFx0Ym9vdHN0cmFwOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5Cb290c3RyYXAoe1xyXG5cdFx0XHRcdFx0XHQvL2VsZUludmFsaWRDbGFzczogJycsXHJcblx0XHRcdFx0XHRcdGVsZVZhbGlkQ2xhc3M6ICcnLFxyXG5cdFx0XHRcdFx0fSlcclxuXHRcdFx0XHR9XHJcblx0XHRcdH1cclxuXHRcdCkpO1xyXG5cclxuXHRcdC8vIEluaXRpYWxpemUgZm9ybSB3aXphcmRcclxuXHRcdHdpemFyZE9iaiA9IG5ldyBLVFdpemFyZCh3aXphcmRFbCwge1xyXG5cdFx0XHRzdGFydFN0ZXA6IDEsIC8vIGluaXRpYWwgYWN0aXZlIHN0ZXAgbnVtYmVyXHJcblx0XHRcdGNsaWNrYWJsZVN0ZXBzOiBmYWxzZSAgLy8gYWxsb3cgc3RlcCBjbGlja2luZ1xyXG5cdFx0fSk7XHJcblxyXG5cdFx0Ly8gVmFsaWRhdGlvbiBiZWZvcmUgZ29pbmcgdG8gbmV4dCBwYWdlXHJcblx0XHR3aXphcmRPYmoub24oJ2NoYW5nZScsIGZ1bmN0aW9uICh3aXphcmQpIHtcclxuXHRcdFx0aWYgKHdpemFyZC5nZXRTdGVwKCkgPiB3aXphcmQuZ2V0TmV3U3RlcCgpKSB7XHJcblx0XHRcdFx0cmV0dXJuOyAvLyBTa2lwIGlmIHN0ZXBwZWQgYmFja1xyXG5cdFx0XHR9XHJcblxyXG5cdFx0XHQvLyBWYWxpZGF0ZSBmb3JtIGJlZm9yZSBjaGFuZ2Ugd2l6YXJkIHN0ZXBcclxuXHRcdFx0dmFyIHZhbGlkYXRvciA9IHZhbGlkYXRpb25zW3dpemFyZC5nZXRTdGVwKCkgLSAxXTsgLy8gZ2V0IHZhbGlkYXRvciBmb3IgY3Vycm50IHN0ZXBcclxuXHJcblx0XHRcdGlmICh2YWxpZGF0b3IpIHtcclxuXHRcdFx0XHR2YWxpZGF0b3IudmFsaWRhdGUoKS50aGVuKGZ1bmN0aW9uIChzdGF0dXMpIHtcclxuXHRcdFx0XHRcdGlmIChzdGF0dXMgPT0gJ1ZhbGlkJykge1xyXG5cdFx0XHRcdFx0XHR3aXphcmQuZ29Ubyh3aXphcmQuZ2V0TmV3U3RlcCgpKTtcclxuXHJcblx0XHRcdFx0XHRcdEtUVXRpbC5zY3JvbGxUb3AoKTtcclxuXHRcdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRcdFN3YWwuZmlyZSh7XHJcblx0XHRcdFx0XHRcdFx0dGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXHJcblx0XHRcdFx0XHRcdFx0aWNvbjogXCJlcnJvclwiLFxyXG5cdFx0XHRcdFx0XHRcdGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuXHRcdFx0XHRcdFx0XHRjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG5cdFx0XHRcdFx0XHRcdGN1c3RvbUNsYXNzOiB7XHJcblx0XHRcdFx0XHRcdFx0XHRjb25maXJtQnV0dG9uOiBcImJ0biBmb250LXdlaWdodC1ib2xkIGJ0bi1saWdodFwiXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9KS50aGVuKGZ1bmN0aW9uICgpIHtcclxuXHRcdFx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdFx0fVxyXG5cdFx0XHRcdH0pO1xyXG5cdFx0XHR9XHJcblxyXG5cdFx0XHRyZXR1cm4gZmFsc2U7ICAvLyBEbyBub3QgY2hhbmdlIHdpemFyZCBzdGVwLCBmdXJ0aGVyIGFjdGlvbiB3aWxsIGJlIGhhbmRsZWQgYnkgaGUgdmFsaWRhdG9yXHJcblx0XHR9KTtcclxuXHJcblx0XHQvLyBDaGFuZ2UgZXZlbnRcclxuXHRcdHdpemFyZE9iai5vbignY2hhbmdlZCcsIGZ1bmN0aW9uICh3aXphcmQpIHtcclxuXHRcdFx0S1RVdGlsLnNjcm9sbFRvcCgpO1xyXG5cdFx0fSk7XHJcblxyXG5cdFx0Ly8gU3VibWl0IGV2ZW50XHJcblx0XHR3aXphcmRPYmoub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uICh3aXphcmQpIHtcclxuXHRcdFx0U3dhbC5maXJlKHtcclxuXHRcdFx0XHR0ZXh0OiBcIkFsbCBpcyBnb29kISBQbGVhc2UgY29uZmlybSB0aGUgZm9ybSBzdWJtaXNzaW9uLlwiLFxyXG5cdFx0XHRcdGljb246IFwic3VjY2Vzc1wiLFxyXG5cdFx0XHRcdHNob3dDYW5jZWxCdXR0b246IHRydWUsXHJcblx0XHRcdFx0YnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0XHRcdGNvbmZpcm1CdXR0b25UZXh0OiBcIlllcywgc3VibWl0IVwiLFxyXG5cdFx0XHRcdGNhbmNlbEJ1dHRvblRleHQ6IFwiTm8sIGNhbmNlbFwiLFxyXG5cdFx0XHRcdGN1c3RvbUNsYXNzOiB7XHJcblx0XHRcdFx0XHRjb25maXJtQnV0dG9uOiBcImJ0biBmb250LXdlaWdodC1ib2xkIGJ0bi1wcmltYXJ5XCIsXHJcblx0XHRcdFx0XHRjYW5jZWxCdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWRlZmF1bHRcIlxyXG5cdFx0XHRcdH1cclxuXHRcdFx0fSkudGhlbihmdW5jdGlvbiAocmVzdWx0KSB7XHJcblx0XHRcdFx0aWYgKHJlc3VsdC52YWx1ZSkge1xyXG5cdFx0XHRcdFx0Zm9ybS5zdWJtaXQoKTsgLy8gU3VibWl0IGZvcm1cclxuXHRcdFx0XHR9IGVsc2UgaWYgKHJlc3VsdC5kaXNtaXNzID09PSAnY2FuY2VsJykge1xyXG5cdFx0XHRcdFx0U3dhbC5maXJlKHtcclxuXHRcdFx0XHRcdFx0dGV4dDogXCJZb3VyIGZvcm0gaGFzIG5vdCBiZWVuIHN1Ym1pdHRlZCEuXCIsXHJcblx0XHRcdFx0XHRcdGljb246IFwiZXJyb3JcIixcclxuXHRcdFx0XHRcdFx0YnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0XHRcdFx0XHRjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG5cdFx0XHRcdFx0XHRjdXN0b21DbGFzczoge1xyXG5cdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLXByaW1hcnlcIixcclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fSk7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9KTtcclxuXHRcdH0pO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIF9oYW5kbGVGb3JtU2lnbmluKCk7XHJcblx0XHRcdF9oYW5kbGVGb3JtRm9yZ290KCk7XHJcblx0XHRcdF9oYW5kbGVGb3JtU2lnbnVwKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gQ2xhc3MgSW5pdGlhbGl6YXRpb25cclxualF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgIEtUTG9naW4uaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUTG9naW4iLCJfYnV0dG9uU3Bpbm5lckNsYXNzZXMiLCJfaGFuZGxlRm9ybVNpZ25pbiIsImZvcm0iLCJLVFV0aWwiLCJnZXRCeUlkIiwiZm9ybVN1Ym1pdFVybCIsImF0dHIiLCJmb3JtU3VibWl0QnV0dG9uIiwiRm9ybVZhbGlkYXRpb24iLCJmb3JtVmFsaWRhdGlvbiIsImZpZWxkcyIsInVzZXJuYW1lIiwidmFsaWRhdG9ycyIsIm5vdEVtcHR5IiwibWVzc2FnZSIsInBhc3N3b3JkIiwicGx1Z2lucyIsInRyaWdnZXIiLCJUcmlnZ2VyIiwic3VibWl0QnV0dG9uIiwiU3VibWl0QnV0dG9uIiwiYm9vdHN0cmFwIiwiQm9vdHN0cmFwIiwib24iLCJidG5XYWl0Iiwic2V0VGltZW91dCIsImJ0blJlbGVhc2UiLCJTd2FsIiwiZmlyZSIsInRleHQiLCJpY29uIiwiYnV0dG9uc1N0eWxpbmciLCJjb25maXJtQnV0dG9uVGV4dCIsImN1c3RvbUNsYXNzIiwiY29uZmlybUJ1dHRvbiIsInRoZW4iLCJzY3JvbGxUb3AiLCJfaGFuZGxlRm9ybUZvcmdvdCIsImVtYWlsIiwiZW1haWxBZGRyZXNzIiwiX2hhbmRsZUZvcm1TaWdudXAiLCJ3aXphcmRFbCIsIndpemFyZE9iaiIsInZhbGlkYXRpb25zIiwicHVzaCIsImZuYW1lIiwibG5hbWUiLCJwaG9uZSIsImVsZVZhbGlkQ2xhc3MiLCJhZGRyZXNzMSIsInBvc3Rjb2RlIiwiY2l0eSIsInN0YXRlIiwiY291bnRyeSIsIktUV2l6YXJkIiwic3RhcnRTdGVwIiwiY2xpY2thYmxlU3RlcHMiLCJ3aXphcmQiLCJnZXRTdGVwIiwiZ2V0TmV3U3RlcCIsInZhbGlkYXRvciIsInZhbGlkYXRlIiwic3RhdHVzIiwiZ29UbyIsInNob3dDYW5jZWxCdXR0b24iLCJjYW5jZWxCdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uIiwicmVzdWx0IiwidmFsdWUiLCJzdWJtaXQiLCJkaXNtaXNzIiwiaW5pdCIsImpRdWVyeSIsImRvY3VtZW50IiwicmVhZHkiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/custom/login/login-4.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/metronic/js/pages/custom/login/login-4.js"]();
/******/ 	
/******/ })()
;