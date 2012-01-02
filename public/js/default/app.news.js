var App = App || {};
(function($) {
    App.News = {
        init: function() {
            
        }, 
        index: function() {
            
            $("#slides").slides({
                pagination: true,
                effect: 'fade',
                play: 5000
            });
        }
    };
})(this.jQuery)