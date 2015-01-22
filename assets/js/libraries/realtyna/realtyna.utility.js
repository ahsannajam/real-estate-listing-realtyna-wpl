/*
 @preserve Realtyna Utility Plugins
 @Author Steve M. @ Realtyna UI Department
 @Copyright 2015 Realtyna Inc.
 */


(function ($) {

    $.fn.visible = function() {
        return this.css('visibility', 'visible');
    };

    $.fn.invisible = function() {
        return this.css('visibility', 'hidden');
    };

    $.fn.visibilityToggle = function() {
        return this.css('visibility', function(i, visibility) {
            return (visibility == 'visible') ? 'hidden' : 'visible';
        });
    };

})(jQuery);