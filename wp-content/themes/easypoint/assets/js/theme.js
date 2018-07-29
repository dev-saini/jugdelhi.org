jQuery(document).ready(function(jQuery) {

    "use strict";

    jQuery('#primary-menu').slicknav({
        appendTo        : '.site-branding',
        label           : '',
        allowParentLinks: true
    });

    // For Fixed header & Scroll to top
	jQuery(window).on("scroll resize", function() {
		if (jQuery(window).scrollTop() >= 500) {
            jQuery(".ep-goto-top").css("bottom", "10px");
		}
		if (jQuery(window).scrollTop() < 500) {
            jQuery(".ep-goto-top").css("bottom", "-50px");
		}
	});

    // For Scroll to top
    jQuery(".ep-goto-top").on("click", function() {
		return jQuery("html, body").animate({
			scrollTop: 0
		});
    });

    // Post slider
    var swiper = new Swiper('.ep-post-slider .swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


});
