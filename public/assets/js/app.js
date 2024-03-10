(function ($) {
	"use strict";

    // Page loading animation
    $(window).on('load', function() {
        $('#js-preloader').addClass('loaded');
    });

})(window.jQuery);

function redirect(link) {
    open(link, "_blank")
}
