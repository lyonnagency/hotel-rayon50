/**handles:ajax-login-register-script**/
var $document=jQuery(document),zMAjaxLoginRegister={reload:function(e){var e;e&&(location.href=e)},confirm_password:function(e){var a=jQuery(e),r=a.val().trim();if(r.length){var t=a.parents("form"),o=jQuery(".user_password",t).val();return r==o?msg={cssClass:"noon",description:null,code:"success"}:msg={cssClass:"error-container",description:_zm_alr_settings.match_error,code:"show_notice"},msg}},open_login:function(){jQuery("#ajax-login-register-login-dialog").dialog("open")},load_login:function(){if(jQuery("body.logged-in").length)jQuery("#ajax-login-register-login-target").stop().fadeIn().html(_zm_alr_settings.logged_in_text);else{var e={action:"load_template",referer:"login_form",template:"login-form",security:jQuery("#ajax-login-register-login-dialog").attr("data-security")};jQuery.ajax({global:!1,type:"POST",url:_zm_alr_settings.ajaxurl,data:e,success:function(e){jQuery("#ajax-login-register-login-target").stop().fadeIn().html(e.data)}})}},open_register:function(){jQuery("#ajax-login-register-dialog").dialog("open")},load_register:function(){if(jQuery("body.logged-in").length)jQuery("#ajax-login-register-target").stop().fadeIn().html(_zm_alr_settings.registered_text);else{var e={action:"load_register_template",template:"register-form",referer_register:"register_form",security_register:jQuery("#ajax-login-register-dialog").attr("data-security")};jQuery.ajax({global:!1,data:e,type:"POST",url:_zm_alr_settings.ajaxurl,success:function(e){jQuery("#ajax-login-register-target").stop().fadeIn().html(e.data)}})}},recaptcha_check_login:function(e){if("function"==typeof grecaptcha){var a="",r=jQuery(e),t=r.parents("#ajax-login-register-login-dialog");return t.length?response=grecaptcha.getResponse(zm_alr_pro_google_recaptcha_login_dialog):response=grecaptcha.getResponse(zm_alr_pro_google_recaptcha_login),response&&(a="g-recaptcha-response="+response),a}},recaptcha_check_register:function(e){if("function"==typeof grecaptcha){var a=jQuery(e),r=a.parents("#ajax-login-register-dialog"),t="";return r.length?response=grecaptcha.getResponse(zm_alr_pro_google_recaptcha_register_dialog):response=grecaptcha.getResponse(zm_alr_pro_google_recaptcha_register),response&&(t="g-recaptcha-response="+response),t}}};$document.ready(function(e){window.ajax_login_register_show_message=function(e,a){"success_login"===a.code||"success_registration"===a.code?jQuery(".ajax-login-register-msg-target",e).addClass(a.cssClass).stop().fadeIn().html(a.description):("show_notice"===a.code?jQuery(".ajax-login-register-status-container").show():jQuery(".ajax-login-register-status-container").hide(),jQuery(".ajax-login-register-msg-target",e).addClass(a.cssClass).stop().fadeIn().html(a.description))},window.ajax_login_register_validate_email=function(a){var r=a,t=e.trim(r.val());t.length&&($form=r.parents("form"),e.ajax({global:!1,data:{action:"validate_email",zm_alr_register_email:t},dataType:"json",type:"POST",url:_zm_alr_settings.ajaxurl,success:function(e){ajax_login_register_show_message($form,e)}}))},$document.on("blur",".ajax-login-register-validate-email",function(){ajax_login_register_validate_email(e(this))}),$document.on("blur",".user_login",function(){e.trim(e(this).val())&&($form=e(this).parents("form"),e.ajax({global:!1,data:{action:"validate_username",zm_alr_register_user_name:e(this).val()},dataType:"json",type:"POST",url:_zm_alr_settings.ajaxurl,success:function(e){ajax_login_register_show_message($form,e)}}))}),e(".ajax-login-register-container").dialog({autoOpen:!1,width:_zm_alr_settings.dialog_width,height:_zm_alr_settings.dialog_height,resizable:!1,draggable:!1,modal:!0,closeText:_zm_alr_settings.close_text}),e("#ajax-login-register-dialog, #ajax-login-register-login-dialog").dialog("option","position",{my:_zm_alr_settings.dialog_position.my,at:_zm_alr_settings.dialog_position.at,of:_zm_alr_settings.dialog_position.of}),"zm_alr_misc_pre_load_yes"===_zm_alr_settings.pre_load_forms&&(zMAjaxLoginRegister.load_login(),zMAjaxLoginRegister.load_register()),$document.on("click",".ui-widget-overlay",function(){e(".ajax-login-register-container").dialog("close")})});