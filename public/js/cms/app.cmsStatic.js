var App = App || {};
(function($) {
    App.CmsStatic = {
        init: function() {
            App.Common.tabs(); 
            App.Common.jtooltip();
        },
        aboutUs: function() {
            App.Common.mce();
            App.Common.jtooltip();
        }
    };
})(this.jQuery);