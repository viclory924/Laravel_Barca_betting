$(document).ready(() => { 
 
 //Validation Process
    $('#quick-register-form').validate({
			
            focusCleanup: true,
			onfocusout:false,
			onfocusin:false,
			onkeyup:false,
			debug: true,
			focusInvalid: true,
			rules: {
                quick_playerName: {
                    required: true,
                },
                quick_password: {
                    required: true,
                    minlength: 8
                },
                quick_retypePassword: {
					equalTo: "#quick_password"
                },
                quick_email:{
                    required: true,
                    email: true
                },
                jq_quick_date:{
                    required:true
                },
                jq_quick_year:{
                    required : true
                }

                
            },
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
				//alert("yes");
            },
             
            errorPlacement: function(error, element){
			    var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
		
            
 });

 $('#full-register-form-1').validate({
			
    focusCleanup: true,
    onfocusout:false,
    onfocusin:false,
    onkeyup:false,
    debug: true,
    focusInvalid: true,
    rules: {
        full_playerName: {
            required: true,
        },
        full_firstName: {
            required:true
        },
        full_email: {
            required: true
        },
        full_jq_date: {
            required : true,
        },
        full_jq_year: {
            required: true
        }

        
    },
    success: function (label, element) {
        $(element).parents('.field').find('.field-error').remove();
        //alert("yes");
    },
     
    errorPlacement: function(error, element){
        var field_error = '<div class="field-error"><div class="align-m">' +
            '<p>' + error.text() + '</p>' + '</div>' + '</div>';

        if ($(element).hasClass('select')) {
            $(field_error).insertAfter($(element).next('span.select2'));
        } else {
            $(field_error).insertAfter($(element));
        }


    },

    
});

$('#full-register-form-2').validate({
			
    focusCleanup: true,
    onfocusout:false,
    onfocusin:false,
    onkeyup:false,
    debug: true,
    focusInvalid: true,
    rules: {
        full_city: {
            required: true,
        },
        full_address: {
            required:true
        },
        full_zip: {
            required: true
        },
        full_phone: {
            required: true
        },
        full_password : {
            required : true,
            minlength : 8
         },
         full_retypePassword: {
            equalTo: "#full_password"
        }

        
    },
    success: function (label, element) {
        $(element).parents('.field').find('.field-error').remove();
        //alert("yes");
    },
     
    errorPlacement: function(error, element){
        var field_error = '<div class="field-error"><div class="align-m">' +
            '<p>' + error.text() + '</p>' + '</div>' + '</div>';

        if ($(element).hasClass('select')) {
            $(field_error).insertAfter($(element).next('span.select2'));
        } else {
            $(field_error).insertAfter($(element));
        }


    },

    
});


// Login Form 

$('#login-form').validate({
			
    focusCleanup: true,
    onfocusout:false,
    onfocusin:false,
    onkeyup:false,
    debug: true,
    focusInvalid: true,
    rules: {
        login_playerName: {
            required: true,
        },
        login_playerPassword: {
            required:true
        }
	},
	success: function (label, element) {
        $(element).parents('.field').find('.field-error').remove();
        //alert("yes");
    },
     
    errorPlacement: function(error, element){
        var field_error = '<div class="field-error"><div class="align-m">' +
            '<p>' + error.text() + '</p>' + '</div>' + '</div>';

        if ($(element).hasClass('select')) {
            $(field_error).insertAfter($(element).next('span.select2'));
        } else {
            $(field_error).insertAfter($(element));
        }


    }
	

    
});


 /* Conditions and submit for quick registartion form submission */
 
 $('#quick-register-button').click((e) =>{

    e.preventDefault();
    if (!$('#quick-register-form').validate().form()) {
        return false;
    }
    submitQuickRegistartion();
 });

 var submitQuickRegistartion = ()=>{
    
        if( $('#quick_check_terms').is(':checked') == false )
        {
            $('<div class="field-error"><div class="align-m"><p>Please accept Terms & Conditions</p></div></div>').insertAfter('.cust_checkbox_label');
        }
        else
        {

        var registerObj = {
        email : $('input[name="quick_email"]').val(),
		username : $('input[name="quick_playerName"]').val(),
		password : $('input[name="quick_password"]').val(),
        merchant_id : $('#quick_merchant_id').val(),
        country_id : $('input[name="quick_country"]').val(),    
        dob : $('#jq_quick_year').val()+'-'+$('#quick_month').val()+'-'+$('#jq_quick_date').val(),
        currency : $('#quick_currency').val(),
        promocode : $('#quick_bonusCode').val()
        }
      
		console.log(registerObj);
		$.ajax({
		url : $('#quick-register-form').attr('action'),
		type : 'POST',
		data : registerObj,
		success : function(response){
			console.log(response);
			 var resp = $.parseJSON(response);

                        if (typeof resp != 'object') {
                            resp = JSON.parse(resp);
                        }

                        if (resp.status == 0) {
                            alert(resp.message);
                            $('#login-form').find('#login_username').focus();
                            return false;
                        } else {
                            if (resp.result.id > 0) {
								
							 // window.sessionStorage.clicked = null;	
							 // location.reload();
							    //alert("Quick Registration Done");
				    			location.reload();
                            }
						}
			
			
		}	
	});
		
		
	//	console.log(registerObj);
    }
}
    

$('.full-register-next-step-reg').click((e) =>{

    e.preventDefault();
    if (!$('#full-register-form-1').validate().form()) {
        return false;
    }

    $('.full-register-block-1').hide();
    $('.full-register-block-2').show();

});


$('.next-step-reg').click((e) => {

    e.preventDefault();
    if (!$('#full-register-form-2').validate().form()) {
        return false;
    }
    submitFullRegistartion();
});

var submitFullRegistartion = () => {
    
    if( $('#full_check_terms').is(':checked') == false )
    {
        $('<div class="field-error"><div class="align-m"><p>Please accept Terms & Conditions</p></div></div>').insertAfter('.cust_checkbox_label');
    }
    else
    {


         var registerObj = {
        email : $('input[name="full_email"]').val(),
		username : $('input[name="full_playerName"]').val(),
		password : $('input[name="full_password"]').val(),
        merchant_id : $('#full_merchant_id').val(),
        country_id : $('input[name="full_country"]').val(),    
        dob : $('#full_jq_year').val()+'-'+$('#full_b_month').val()+'-'+$('#full_jq_date').val(),
        currency : $('#full_currency').val(),
        promocode : $('#full_bonusCode').val(),
        address : $('input[name="full_address"]').val(),    
        city : $('input[name="full_city"]').val(),
        zip : $('input[name="full_zip"]').val(),
        phone :$('input[name="full_phone"]').val(),
    }
    console.log(registerObj);
    $.post($('#full-register-form-1').attr('action'),registerObj,function(response){
         var resp = $.parseJSON(response);

                        if (typeof resp != 'object') {
                            resp = JSON.parse(resp);
                        }

                        if (resp.status == 0) {
                            alert(resp.message);
                           
                            return false;
                        } else {
                            if (resp.result.id > 0) {
								
							 // window.sessionStorage.clicked = null;	
							  alert("full registration done");
				    			location.reload();	
							   
                            }
						}
    });
}
}

// Selection Parameters
$('.quick-currency-select-js').click(function(){
$('#quick_currency').val( $(this).attr('data-currency') );
});

$('.quick-month-select').click(function(){
$('#quick_month').val( $(this).attr('data-b-month') );
});

$('.quick-country-select').click(function(){
$('#quick_country').val( $(this).attr('data-country-code') );
});

$('.country-select').click(function(){
$('#full_country').val( $(this).attr('data-country-code') ); 
});

$('.b-month-select').click(function(){
$('#full_b_month').val( $(this).attr('data-b-month') );
});



$('.currency-select-js').click(function(){
$('#full_currency').val( $(this).attr('data-currency') );
});

$('.register-modal-back-choce-1').click(function(e){

	e.preventDefault();
	$('.full-register-block-2').hide(); 
	$('.full-register-block-1').show();
    	 
});	

$(document).on('click','#login-button',function(e){
			
	e.preventDefault();
    if (!$('#login-form').validate().form()) {
        return false;
    }
	
	$.ajax({
		url : $('#login-form').attr('action'),
		type : 'POST',
		data : { username : $('#login_playerName').val(), password : $('#login_playerPassword').val() },
		success : function(response){
			
			 var resp = $.parseJSON(response);

                        if (typeof resp != 'object') {
                            resp = JSON.parse(resp);
                        }

                        if (resp.status == 0) {
                            alert(resp.message);
                            $('#login-form').find('#login_username').focus();
                            return false;
                        } else {
                            if (resp.result.id > 0) {
								
							 // window.sessionStorage.clicked = null;	
							  location.reload();
							   
                            }
						}
			
			console.log(response);
		}	
	});
    
		
});

});
 
