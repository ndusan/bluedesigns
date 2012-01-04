var App = App || {};
(function($) {
    App.Studio = {
        init: function() {
            
        }, 
        index: function() {
            
            $("#slides").slides({
                pagination: true,
                effect: 'fade',
                play: 5000
            });
            
            $('#studio').accordion({active:'none', collapsible: true});
        }
    };
})(this.jQuery)