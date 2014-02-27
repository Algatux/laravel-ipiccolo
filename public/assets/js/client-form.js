$(document).ready(function(){
	
	$("#client-form").validate({
        rules: {
            name: {
                minlength: 3,
                maxlength: 32,
                required: true
            },
            surname: {
                minlength: 3,
                maxlength: 32,
                required: true
            },
            nikname:{
            	minlength: 3,
                maxlength: 32,
                required: false
            },
            phone:{
            	maxlength: 128,
                required: false
            },
            mobilephone:{
            	maxlength: 128,
                required: false
            }
        },
        highlight: function(element) {
            $(element).closest('.input-group').addClass('has-error');
            $(element).parent().find('span.back').html('&#10008;'); // &#10004; => V
        },
        unhighlight: function(element) {
            $(element).closest('.input-group').removeClass('has-error');
            $(element).parent().find('span.back').html('');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

});