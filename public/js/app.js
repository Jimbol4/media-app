(function($) {
    // pub sub code snippet
    var o = $({});
    
    $.subscribe = function() {
        o.on.apply(o, arguments);
    };
    
    $.unsubscribe = function() {
        o.off.apply(o, arguments);
    };
    
    $.publish = function() {
        o.trigger.apply(o, arguments);
    };
    
    
}(jQuery));


(function(){
    // procedure to go through when submitting ajax request
    var submitAjaxRequest = function(e){
        
        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        
        $.ajax({
           type: method,
           url: form.prop('action'),
           data: form.serialize(),
           success: function(){
             $.publish('form.submitted', form);  
           }
        });
        
        e.preventDefault();
    };
    
    // call submitAjaxRequest above when a form with the data-remote attribute
    // is submitted.
    $('form[data-remote]').on('submit', submitAjaxRequest);
    $('*[data-click-submits-form]').on('change', function(){
       $(this).closest('form').submit(); 
    });
})();


(function() {
    // display updated notification
    $.subscribe('form.submitted', function() {
        $('.flash').fadeIn(500).delay(1000).fadeOut(500);
    });
    
})();
