var App = App || {};
(function($) {
    App.CmsQuotes = {
        init: function() {
        
        },
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
       },
       add: function() {
           App.Common.tabs();
           App.Common.jtooltip();
           App.Common.mce();
       },
       edit: function() {
           App.Common.tabs();
           App.Common.jtooltip();
           App.Common.mce();
       }
    };
})(this.jQuery);