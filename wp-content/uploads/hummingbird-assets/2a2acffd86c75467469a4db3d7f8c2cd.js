/**handles:hoteller-custom-script**/
jQuery(document).ready(function(){"use strict";jQuery(document).setNav();var e=!1;"thumbnail"==jQuery("#tg_lightbox_thumbnails").val()&&(e=!0);var r=jQuery("#tg_lightbox_timer").val(),a="";a=new ModuloBox({mediaSelector:".tg_gallery_lightbox, .woocommerce-product-gallery__image a",scrollToZoom:!0,controls:["zoom","play","fullScreen","share","close"],shareButtons:["facebook","googleplus","twitter","pinterest","linkedin"],slideShowInterval:parseInt(r),countTimer:!0,thumbnails:e,videoAutoPlay:!0,thumbnailSizes:{1920:{width:110,height:80,gutter:10},1280:{width:90,height:65,gutter:10},680:{width:70,height:50,gutter:8},480:{width:60,height:44,gutter:5}}}),a.init(),jQuery(window).resize(function(){if(jQuery(document).setNav(),jQuery(this).width()<768?jQuery("#page_content_wrapper .sidebar_wrapper").trigger("sticky_kit:detach"):("menu"==jQuery("#tg_header_content").val()?jQuery("#wrapper").css("paddingTop",parseInt(jQuery(".header_style_wrapper").height())+"px"):jQuery("#wrapper").css("paddingTop",parseInt(jQuery("#elementor_header").height())+"px"),jQuery("#menu_wrapper div .nav > li > a").attr("style",""),jQuery("#menu_wrapper div .nav > li > a").attr("style","")),jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper").length>0){var e=jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper").height(),r=jQuery(".top_bar").height();if(jQuery(".above_top_bar").length>0&&(r+=jQuery(".above_top_bar").height()),jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper.fullscreen-container").length>0)var r=55;jQuery(".ppb_wrapper").css("marginTop",e-r+"px"),jQuery("#page_content_wrapper").css("marginTop",e-r+"px")}}),jQuery("#menu_expand_wrapper a").on("click",function(){jQuery("#menu_wrapper").fadeIn(),jQuery("#custom_logo").animate({left:"15px",opacity:1},400),jQuery("#menu_close").animate({left:"-10px",opacity:1},400),jQuery(this).animate({left:"-60px",opacity:0},400),jQuery("#menu_border_wrapper select").animate({left:"0",opacity:1},400).fadeIn()}),jQuery("#menu_close").on("click",function(){jQuery("#custom_logo").animate({left:"-200px",opacity:0},400),jQuery(this).stop().animate({left:"-200px",opacity:0},400),jQuery("#menu_expand_wrapper a").animate({left:"20px",opacity:1},400),jQuery("#menu_border_wrapper select").animate({left:"-200px",opacity:0},400).fadeOut(),jQuery("#menu_wrapper").fadeOut()}),jQuery(window).scroll(function(){var e=jQuery(window).width();jQuery(this).scrollTop()>200?jQuery("#toTop").stop().css({opacity:1,visibility:"visible"}).animate({visibility:"visible"},{duration:1e3,easing:"easeOutExpo"}):0==jQuery(this).scrollTop()&&jQuery("#toTop").stop().css({opacity:0,visibility:"hidden"}).animate({visibility:"hidden"},{duration:1500,easing:"easeOutExpo"})}),jQuery("#toTop, .hr_totop").on("click",function(){jQuery("body,html,#page_content_wrapper.split").animate({scrollTop:0},800)});var t=jQuery("#pp_enable_dragging").val();if(""!=t&&jQuery("img").mousedown(function(){return!1}),0==jQuery("#pp_topbar").val())var o=jQuery(".header_style_wrapper").height();else var o=parseInt(jQuery(".header_style_wrapper").height()-jQuery(".header_style_wrapper .above_top_bar").height());var s=jQuery("#custom_logo img").height(),l=jQuery("#custom_logo_transparent img").height(),i=parseInt(jQuery("#custom_logo").css("marginTop")),n=parseInt(jQuery("#custom_logo_transparent").css("marginTop")),u=parseInt(jQuery("#menu_wrapper div .nav li > a").css("paddingTop")),p=parseInt(jQuery("#menu_wrapper div .nav li > a").css("paddingBottom")),y=parseInt(jQuery(".top_bar #searchform button").css("paddingTop")),_=jQuery("#pp_menu_layout").val();if(("leftmenu"!=_||jQuery(window).width()<=768)&&("menu"==jQuery("#tg_header_content").val()?jQuery("#wrapper").css("paddingTop",parseInt(jQuery(".header_style_wrapper").height())+"px"):(jQuery("#wrapper").css("paddingTop",parseInt(jQuery("#elementor_header").height())+"px"),setTimeout(function(){jQuery("#wrapper").css("paddingTop",parseInt(jQuery("#elementor_header").height())+"px")},200),setTimeout(function(){jQuery("#wrapper").css("paddingTop",parseInt(jQuery("#elementor_header").height())+"px")},1e3))),("leftmenu"!=_||jQuery(window).width()<=960)&&(jQuery("#page_content_wrapper.split, .page_content_wrapper.split").css("top",parseInt(o+jQuery(".header_style_wrapper .above_top_bar").height())+"px"),jQuery("#page_content_wrapper.split, .page_content_wrapper.split").css("paddingBottom",parseInt(o+jQuery(".header_style_wrapper .above_top_bar").height())+"px"),jQuery(window).scroll(function(){1==jQuery("#pp_fixed_menu").val()&&"fullscreen"!=jQuery("html").data("style")&&"fullscreen_white"!=jQuery("html").data("style")?jQuery(this).scrollTop()>=200?(jQuery(".extend_top_contact_info").hide(),jQuery(".header_style_wrapper").addClass("scroll"),jQuery(".top_bar").addClass("scroll"),jQuery(".top_bar").hasClass("hasbg")&&(jQuery(".top_bar").removeClass("hasbg"),jQuery(".top_bar").data("hasbg",1),jQuery("#custom_logo").removeClass("hidden"),jQuery("#custom_logo_transparent").addClass("hidden"))):jQuery(this).scrollTop()<200&&(jQuery(".extend_top_contact_info").show(),jQuery("#custom_logo img").removeClass("zoom"),jQuery("#custom_logo img").css("maxHeight",""),jQuery("#custom_logo_transparent img").removeClass("zoom"),jQuery("#custom_logo").css("marginTop",parseInt(i)+"px"),jQuery("#custom_logo_transparent").css("marginTop",parseInt(n)+"px"),jQuery("#menu_wrapper div .nav > li > a").css("paddingTop",u+"px"),jQuery("#menu_wrapper div .nav > li > a").css("paddingBottom",p+"px"),1==jQuery(".top_bar").data("hasbg")&&(jQuery(".top_bar").addClass("hasbg"),jQuery("#custom_logo").addClass("hidden"),jQuery("#custom_logo_transparent").removeClass("hidden")),jQuery(".header_style_wrapper").removeClass("scroll"),jQuery(".top_bar").removeClass("scroll")):jQuery(this).scrollTop()>=200?jQuery(".header_style_wrapper").addClass("nofixed"):jQuery(".header_style_wrapper").removeClass("nofixed")}),1==jQuery("#tg_smart_fixed_menu").val()&&"fullscreen"!=jQuery("html").data("style")&&"fullscreen_white"!=jQuery("html").data("style")))if(is_touch_device()){var d;jQuery(document).bind("touchmove",function(e){var r=e.originalEvent.touches[0].clientY;r>200?(jQuery(".top_bar").addClass("scroll_up"),jQuery(".header_style_wrapper").addClass("scroll_up"),jQuery(".header_style_wrapper").removeClass("scroll_down")):(jQuery(".top_bar").removeClass("scroll_up"),jQuery(".header_style_wrapper").removeClass("scroll_up"),jQuery(".header_style_wrapper").addClass("scroll_down")),jQuery(".header_style_wrapper").attr("data-pos",r)})}else{var c=0;jQuery(window).scroll(function(e){var r=jQuery(this).scrollTop();r>c&&r>0?(jQuery(".top_bar").removeClass("scroll_up"),jQuery(".header_style_wrapper").removeClass("scroll_up"),jQuery(".header_style_wrapper").addClass("scroll_down")):(jQuery(".top_bar").addClass("scroll_up"),jQuery(".header_style_wrapper").addClass("scroll_up"),jQuery(".header_style_wrapper").removeClass("scroll_down")),c=r,jQuery(".header_style_wrapper").attr("data-st",r),jQuery(".header_style_wrapper").attr("data-lastscrolltop",c)})}if(jQuery(window).scroll(function(){1==jQuery("#pp_fixed_menu").val()&&(jQuery(this).scrollTop()>=100?(jQuery("#elementor_header").removeClass("visible"),jQuery("#elementor_sticky_header").addClass("visible")):jQuery(this).scrollTop()<100&&(jQuery("#elementor_header").addClass("visible"),jQuery("#elementor_sticky_header").removeClass("visible")))}),jQuery(document).mouseenter(function(){jQuery("body").addClass("hover")}),jQuery(document).mouseleave(function(){jQuery("body").removeClass("hover")}),jQuery("#post_more_close").on("click",function(){return jQuery("#post_more_wrapper").animate({right:"-380px"},300),!1}),jQuery("#mobile_nav_icon, #elementor_mobile_nav, .elementor_mobile_nav").on("click",function(){jQuery("body").toggleClass("js_nav"),jQuery("body").toggleClass("modalview"),jQuery("#close_mobile_menu").addClass("open"),is_touch_device()&&jQuery("body.js_nav").css("overflow","auto")}),jQuery("#close_mobile_menu").on("click",function(){jQuery("body").removeClass("js_nav"),setTimeout(function(){jQuery("body").toggleClass("modalview")},400),jQuery(this).removeClass("open")}),jQuery(".mobile_menu_close a, #mobile_menu_close").on("click",function(){jQuery("body").removeClass("js_nav"),setTimeout(function(){jQuery("body").toggleClass("modalview")},400),jQuery("#close_mobile_menu").removeClass("open")}),jQuery(".post_share").on("click",function(){var e=jQuery(this).attr("data-share"),r=jQuery(this).attr("data-parent");return jQuery(this).toggleClass("visible"),jQuery("#"+e).toggleClass("slideUp"),jQuery("#"+r).toggleClass("sharing"),!1}),jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper").length>0){var j=jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper").height(),o=jQuery(".top_bar").height();if(jQuery(".above_top_bar").length>0&&(o+=jQuery(".above_top_bar").height()),jQuery(".page_slider.menu_transparent").find(".rev_slider_wrapper.fullscreen-container").length>0)var o=55;jQuery(".ppb_wrapper").css("marginTop",j-o+"px"),jQuery("#page_content_wrapper").css("marginTop",j-o+"px")}jQuery("#demo_apply").on("click",function(){jQuery("#ajax_loading").addClass("visible"),jQuery("body").addClass("loading"),jQuery("form#form_option").submit()}),jQuery("#option_wrapper").mouseenter(function(){jQuery("body").addClass("overflow_hidden")}),jQuery("#option_wrapper").mouseleave(function(){jQuery("body").removeClass("overflow_hidden")});var Q=jQuery(window).height()-108,h=800;jQuery("#overlay_background").on("click",function(){jQuery("body").hasClass("js_nav")||(jQuery("#overlay_background").removeClass("visible"),jQuery("#overlay_background").removeClass("share_open"),jQuery("#fullscreen_share_wrapper").css("visibility","hidden"))});var _=jQuery("#pp_menu_layout").val();jQuery(".rev_slider_wrapper.fullscreen-container").each(function(){jQuery(this).append('<div class="icon-scroll"></div>')}),jQuery(".one.fullwidth.slideronly").length>0&&jQuery("body").addClass("overflow_hidden"),jQuery("#post_share_text").on("click",function(){jQuery("body").addClass("overflow_hidden"),jQuery("body").addClass("blur"),jQuery("#side_menu_wrapper").addClass("visible"),jQuery("#side_menu_wrapper").addClass("share_open"),jQuery("#fullscreen_share_wrapper").css("visibility","visible")}),jQuery("#close_share").on("click",function(){jQuery("body").removeClass("overflow_hidden"),jQuery("body").removeClass("blur"),jQuery("#side_menu_wrapper").removeClass("visible"),jQuery("#side_menu_wrapper").removeClass("share_open"),jQuery("#fullscreen_share_wrapper").css("visibility","hidden")}),jQuery('iframe[src*="youtube.com"]').each(function(){jQuery(this).wrap('<div class="video-container"></div>')}),jQuery('iframe[src*="vimeo.com"]').each(function(){jQuery(this).wrap('<div class="video-container"></div>')}),jQuery(".blog-tilt").tilt({perspective:5e3}),jQuery(".input_wrapper input").focusout(function(){""!=jQuery(this).val()?$(this).addClass("has-content"):jQuery(this).removeClass("has-content")}),jQuery(window).scroll(function(){var e;e=jQuery(window).scrollTop()/300,e>1&&(e=1),e=parseFloat(1-e),jQuery("#page_caption.hasbg .page_title_wrapper .page_title_inner").css("opacity",e);var r=-(.005*jQuery(window).scrollTop());jQuery("#page_caption.hasbg .page_title_wrapper .page_title_inner").css({transform:"translate(0px,"+r+"px)"})}),jQuery("#page_title_nav li a").on("click",function(e){var r=jQuery(document).scrollTop(),a=jQuery(this).attr("href"),t=jQuery(this).attr("href").substr(1);if("#"!=a.slice(0,1)||""==t)return!0;e.preventDefault();var o=jQuery(".top_bar").height(),s=parseInt(jQuery("#"+t).offset().top-o);jQuery("body,html").animate({scrollTop:s},1200)}),jQuery("#singleroom_book").on("click",function(e){var r=jQuery(this).attr("data-formid");jQuery("#singleroom_book_form"+r).toggleClass("visible")}),is_touch_device()||(jQuery(".stellar").each(function(){jQuery(this).attr("data-stellar-ratio","1.15")}),jQuery(window).stellar({positionProperty:"transform",responsive:!0,parallaxBackgrounds:!1,horizontalScrolling:!1,hideDistantElements:!1})),setTimeout(function(){jQuery("#elementor_header").addClass("visible")},200)}),jQuery(window).on("resize load",adjustIframes);