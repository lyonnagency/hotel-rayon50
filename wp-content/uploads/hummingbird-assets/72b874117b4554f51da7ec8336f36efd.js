/**handles:ajax-login-register-register-script**/
$document.ready(function(e){$document.on("click",".ajax-login-register-container .cancel",function(){e(this).closest(".ajax-login-register-container").dialog("close")}),_zm_alr_settings.register_handle.length&&$document.on("click",_zm_alr_settings.register_handle,function(e){e.preventDefault(),zMAjaxLoginRegister.open_register(),"zm_alr_misc_pre_load_no"==_zm_alr_settings.pre_load_forms&&zMAjaxLoginRegister.load_register()}),$document.on("keyup change",".user_confirm_password",function(){var t=e(this).parents("form"),r=e(".register_button",t);e(this).val()?r.removeAttr("disabled").stop().animate({opacity:1}):r.attr("disabled",!0).stop().animate({opacity:.5})}),$document.on("submit",".register_form",function(t){t.preventDefault();var r=e(this),a=r.serialize(),i='input[type="password"], input[type="text"], input[type="email"]',s=zMAjaxLoginRegister.recaptcha_check_register();return r.find(i).attr("disabled","disabled"),e(".user_confirm_password").length&&(passwords_match=zMAjaxLoginRegister.confirm_password(".user_confirm_password"),"show_notice"==passwords_match.code)?(ajax_login_register_show_message(r,msg),r.find(i).removeAttr("disabled"),zMAjaxLoginRegister.reload(msg.redirect_url),!1):void e.ajax({global:!1,data:"action=setup_new_user&"+a+"&security="+r.data("zm_alr_register_security")+"&"+s,dataType:"json",type:"POST",url:_zm_alr_settings.ajaxurl,success:function(e){ajax_login_register_show_message(r,e),r.find(i).removeAttr("disabled"),zMAjaxLoginRegister.reload(e.redirect_url)}})}),$document.on("click",".already-registered-handle",function(t){t.preventDefault(),e("#ajax-login-register-dialog").dialog("close"),zMAjaxLoginRegister.open_login(),"zm_alr_misc_pre_load_no"==_zm_alr_settings.pre_load_forms&&zMAjaxLoginRegister.load_login()})});