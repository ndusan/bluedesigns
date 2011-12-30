var App = App || {};
(function($) {
    App.CmsQuotes = {
        init: function() {
        
        },
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
            
            $('body').delegate('input[type="checkbox"]', 'click', function(){
               
               var cVal = $(this).val();
               
               $.ajax({
                  url: $('#url').val(),
                  type: 'GET',
                  data: 'id='+cVal
               });
            });
            
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