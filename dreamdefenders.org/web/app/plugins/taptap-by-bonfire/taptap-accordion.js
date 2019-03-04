jQuery(document).ready(function ($) {
'use strict';
	/* add sub-menu arrow */
	$('.taptap-by-bonfire ul li ul').before($('<span class="taptap-sub-arrow"><span class="taptap-sub-arrow-inner"></span></span>'));

	/* accordion */
	$(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").on('click touchend', function(e) {
	e.preventDefault();
		if (false == $(this).next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("taptap-submenu-active");
            $(this).siblings().find("span").removeClass("taptap-submenu-active");
		}
		$(this).next().slideToggle(300);
		$(this).toggleClass("taptap-submenu-active");
	})
	
	/* sub-menu arrow animation */
	$(".taptap-by-bonfire .menu > li > span").on('click touchend', function(e) {
	e.preventDefault();
		if($(".taptap-by-bonfire .sub-menu > li > span").hasClass('taptap-submenu-active'))
			{
				$(".taptap-by-bonfire .sub-menu > li > span").removeClass("taptap-submenu-active");
			}
	})
	
});