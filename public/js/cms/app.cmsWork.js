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
          
          App.Work.sortableTable();
        },
        edit: function() {
          App.Common.tabs();
          App.Common.jtooltip();
          App.Common.mce();
          
          App.CmsHome.addBrowse();
          App.CmsHome.removeBrowse();
          
          App.CmsWork.sortableTable();
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
                          url: '/cms/work',
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
                                window.location.href = '/cms/work?cache='+d.getTime(); 
                            }
                          }
                          
                    });
                 }
            });
            
            App.Common.thead();
        },
        sortableTable: function(){
            //Set datatable
            
            $('.dataTable').dataTable();
            $('.dataTableSortable').dataTable({
                "bSort": false
            });
        }
        
    };
})(this.jQuery);