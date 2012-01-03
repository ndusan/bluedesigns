var App = App || {};
(function($) {
    App.CmsWork = {
        init: function() {
            
        },
        add: function() {
          App.Common.tabs(); 
          App.Common.jtooltip();
          App.Common.mce();
          
          App.CmsHome.addBrowse();
          App.CmsHome.removeBrowse();
        },
        edit: function() {
          App.Common.tabs();
          App.Common.jtooltip();
          App.Common.mce();
          
          App.CmsHome.addBrowse();
          App.CmsHome.removeBrowse();
        },
        index: function() {
            
            //Set datatable
            //$('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);