var fphoto_snap_lite_ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".sitenav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	});
	jQuery(".togglemenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".sitenav").slideToggle('fast');
	});
	fphoto_snap_lite_adjustMenu();
});

jQuery(window).bind('resize orientationchange', function() {
	fphoto_snap_lite_ww = jQuery(window).width();
	fphoto_snap_lite_adjustMenu();
});

var fphoto_snap_lite_adjustMenu = function() {
	if (fphoto_snap_lite_ww < 992) {
		jQuery(".togglemenu").css("display", "block");
		if (!jQuery(".togglemenu").hasClass("active")) {
			jQuery(".sitenav").hide();
		} else {
			jQuery(".sitenav").show();
		}
		jQuery(".sitenav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".togglemenu").css("display", "none");
		jQuery(".sitenav").show();
		jQuery(".sitenav li").removeClass("hover");
		jQuery(".sitenav li a").unbind('click');
		jQuery(".sitenav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
};