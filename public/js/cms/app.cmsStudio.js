var App = App || {};
(function($) {
    App.CmsStudio = {
        init: function() {
        
        },
        index: function() {
            
            //Set datatable
            $('.dataTable').dataTable();
            $('.dataTableSortable').dataTable({
                "bSort": false
            });
            
            $(".dataTableSortable tbody").sortable({
                cursor: "move",
                start:function(event, ui){
                    startPosition = ui.item.prevAll().length+1;
                    sId = $('.jpos-'+startPosition).attr('id');
                    sId = sId.substr(2, sId.length);
                },
                update: function(event, ui) {
                    endPosition = ui.item.prevAll().length + 1;
                    eId = $('.jpos-'+endPosition).attr('id');
                    eId = eId.substr(2, eId.length);
                    
                    $.ajax({
                          url: '/cms/studio',
                          type: 'GET',
                          dataType: 'json',
                          data: {start : $('.jpos-'+startPosition).val(), 
                                 end : $('.jpos-'+endPosition).val(),
                                 start_id : sId,
                                 end_id : eId
                          },
                          success: function(data){
                            if(data.response){
                                var d = new Date();
                                window.location.href = '/cms/studio?cache='+d.getTime(); 
                            }
                          }
                          
                    });
                 }
            });
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
       },
       about: function(){
           App.Common.tabs();
           App.Common.jtooltip();
           App.Common.mce();
       }
    };
})(this.jQuery);