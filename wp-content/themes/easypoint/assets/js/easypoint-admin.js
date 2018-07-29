jQuery(document).ready(function(jQuery) {

    "use strict";

    jQuery(document).on( 'click', '.easypoint-intro-notice .notice-dismiss', function() {
        jQuery.ajax({
            url: ajaxurl,
            data: {
                action: 'easypoint-intro-dismissed'
            }
        });
    });

});
