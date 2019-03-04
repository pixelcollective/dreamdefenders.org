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

	/* accordion */
	$(".taptap-by-bonfire .menu > li.menu-item-has-children > a, .taptap-by-bonfire .sub-menu > li.menu-item-has-children > a").on('click touchend', function(e) {
	e.preventDefault();
		if (false == $(this).next().next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("taptap-submenu-active");
            $(this).siblings().find("span").removeClass("taptap-submenu-active");
		}
		$(this).next().next().slideToggle(300);
		$(this).next().toggleClass("taptap-submenu-active");
	})

	/* hover */
	$(".taptap-by-bonfire .menu > li.menu-item-has-children > a, .taptap-by-bonfire .sub-menu > li.menu-item-has-children > a").hover(
		function() {
			$(this).parent().addClass("full-item-arrow-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-arrow-hover");
	});
	$(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").hover(
		function() {
			$(this).parent().addClass("full-item-arrow-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-arrow-hover");
	});
	
	/* sub-menu arrow animation */
	$(".taptap-by-bonfire .menu > li.menu-item-has-children > a").on('click touchend', function(e) {
	e.preventDefault();
		if($(".taptap-by-bonfire .sub-menu > li > span").hasClass('taptap-submenu-active'))
			{
				$(".taptap-by-bonfire .sub-menu > li > span").removeClass("taptap-submenu-active");
			}
	})
	
	/* close sub-menus when menu button clicked */
	$(".taptap-main-menu-button-wrapper, .taptap-main-menu-activator, .taptap-background-overlay").on('click touchend', function(e) {
		if($(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").hasClass('taptap-submenu-active'))
			{
				$(".taptap-by-bonfire .menu > li").find(".sub-menu").slideUp(300);
				$(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").removeClass("taptap-submenu-active");
			}
	})
	
});