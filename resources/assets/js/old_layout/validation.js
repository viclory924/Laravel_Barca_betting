function initFormValidation(formId, formObj) {

    if (formId == 'registration') {
        $(formObj).validate({
            ignore: [],
            // debug: true,
            focusCleanup: true,
            focusInvalid: true,
            errorPlacement: function(error, element){

                $(element).parents('.field').find('.field-error').remove();

                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if (element.attr('name') == 'registration_currency') {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }
            },

            success: function(label, element) {
                $(element).parents('.field').find('.field-error').remove();
            },
            submitHandler: function(form) {
                var data = $(form).serializeArray();
                var data_formatted = {};

                for (field in data) {
                    data_formatted[data[field].name] = data[field].value;
                }

                var registerObj = {
                    // name: $('#register-player-form #name').val(),
                    email: data_formatted.registration_email,
                    username: data_formatted.registration_login,
                    password: data_formatted.registration_password,
                    dob: $(form).find('[name="calendar1"]').val(),
                    currency: data_formatted.registration_currency,
                    // phone: $('#register-player-form #phone').val(),
                    country_id: data_formatted.registration_country_id,
                    merchant_id: $(form).find('#merchant_id').val(),
                    // city: $('#register-player-form input[name="city"]').val(),
                    // address: $('#register-player-form input[name="address"]').val(),
                    // zip: $('#register-player-form input[name="zip"]').val()
                };

                // console.log(registerObj);
                // return false;

                if(getUrlVars()['btag'] != undefined) {
                    registerObj.btag = getUrlVars()['btag'];
                }

                $.post(
                    $(form).attr('action'),
                    registerObj,
                    function(result){
                        var res = $.parseJSON(result);
                        //console.log(res);return false;
                        if (res.status > 0) {
                            top.location.href='/player/just-registered';
                        } else {
                            alert(res.message);
                        }
                    }

                );

            },



            rules: {
                registration_login: {
                    required: true,
                    minlength: 6
                },
                // registration_currency: {
                //     required: true
                // },
                registration_password: {
                    required: true
                },
                registration_confirm_password: {
                    required: true,
                    equalTo: "#registration_password"
                },
                registration_email: {
                    required: true,
                    email: true
                },
                // registration_country_id: {
                //     required: true
                // },
                // calendar1_[day]: {
                //     required: true
                // }
            },
            // messages: {
                // registration_login: {
                //     required: "Login field is required"
                // }
            // }
        });
    }

    if (formId == 'login_form') {
		
		
        $(formObj).validate({
            focusCleanup: true,
            success: function(label, element){
                $(element).parents('.field').find('.field-error').remove();
            },
            submitHandler: function(form) {
                
				if (typeof(Storage) !== "undefined") 
				{
					
					if( window.sessionStorage.games )
					{
						window.sessionStorage.games = getUserState();
						window.sessionStorage.after_login = 1;
						window.sessionStorage.game_type = $('.js-filter-games.active').attr('data-game-type');
						window.sessionStorage.keyword = $('input[name="games-search-box"]').val();
						window.sessionStorage.vendor = $(".choose-list li.active a").attr("data-vendor-id");
						
					}
					else
					{
						window.sessionStorage.setItem("games", getUserState());
						window.sessionStorage.setItem("after_login",1);
						window.sessionStorage.setItem("game_type",$('.js-filter-games.active').attr('data-game-type'));
						window.sessionStorage.setItem("keyword",$('input[name="games-search-box"]').val());
						window.sessionStorage.setItem("vendor",$(".choose-list li.active a").attr("data-vendor-id"));
					
					}
				} 
				
				
				$.post(
                    $(form).attr('action'),
                    {
                        username: $(form).find('#login_username').val(),
                        password: $(form).find('#login_password').val(),
                    },
                    function(response) {
                        var resp = $.parseJSON(response);

                        if (typeof resp != 'object') {
                            resp = JSON.parse(resp);
                        }

                        if (resp.status == 0) {
                            alert(resp.message);
                            $(form).find('#login_username').focus();
                            return false;
                        } else {
                            if (resp.result.id > 0) {
								
							 // window.sessionStorage.clicked = null;	
							  location.reload();
							   
                            }
                        }
                    }
                );
            },
            errorPlacement: function(error, element){
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                $(field_error).insertBefore($(element));
            },
            rules: {
                login_username: {
                    required: true
                },
                login_password: {
                    required: true
                }
            }
        });
    }

    if (formId == 'recover_password') {
        $(formObj).validate({
            focusCleanup: true,
            success: function(label, element){
                $(element).parents('.field').find('.field-error').remove();
            },
            submitHandler: function(form) {
                $.post(
                    $(form).attr('action'),
                    {
                        email: $(form).find('#email').val(),
                        _token: $(form).find('input[name="_token"]').val()
                    },
                    function(response) {
                        resp = response;

                        if (resp.status == 0) {
                            $('<div class="field-error"><div class="align-m"><p>' + resp.message + '</p></div></div>').insertAfter($(formObj).find('#email'))
                            // $(form).find('.field-error .align-m p').html(resp.message);
                            $(form).find('#email').focus();
                            return false;
                        } else {

                            if (resp.result.id > 0) {
                                $(formObj).parents('.max-w').hide();
                                $(formObj).parents('.recover-password').find('.submit-ok-box').show();
                                return true;
                            }
                        }
                    },
                    'json'
                );
            },
            errorPlacement: function(error, element){
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                $(field_error).insertAfter($(element));
            },
            rules: {
                email: {
                    required: true,
                    email: true,
                },

            }
        });
    }

    if (formId == 'change_password') {
        $(formObj).validate({
            focusCleanup: true,
            focusInvalid: true,
            submitHandler: function(form) {

                $.ajax($(form).attr('action'), {
                    data: {
                        _token: $(form).find('input[name="_token"]').val(),
                        new_password: $(form).find('input[name="password"]').val()
                    },
                    dataType: 'json',
                    method: 'post',
                    success: function(data, status, xhr) {
                        //top.location.reload();
                        alert("Password changed successfully");	
						return false;
                    }
                });

                // return false;
            },
            success: function(label, element){
                $(element).parents('.field').find('.field-error').remove();
            },
            errorPlacement: function(error, element){
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                $(field_error).insertBefore($(element));
            },
            rules: {
                password: {
                    required: true,
                    equalTo: '#confirm_password'
                },
                confirm_password: {
                    required: true
                    // equalTo: '#password'
                }

            }
        });
    }

    if (formId == 'full-registration-step1') {
        $(formObj).validate({
            focusCleanup: true,
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
            },
            // submitHandler: function(form) {
            //     console.log('fullRegistrationSubmitHandler');
            //     return false;
            // },
            errorPlacement: function(error, element){

                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }


            },
            rules: {
                login: {
                    required: true,
                    minlength: 4,
                },
                player_firstname: {
                    required: true,
                    minlength: 2
                },
                player_lastname: {
                    required: true,
                    minlength: 2
                },
                gender: {
                    required: true
                },
                currency: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },

            }
        });
    }

    if (formId == 'full-registration-step2') {
        $(formObj).validate({
            focusCleanup: true,
            success: function (label, element) {
                $(element).parents('.field').find('.field-error').remove();
            },
            // submitHandler: function(form) {
            //     console.log('fullRegistrationSubmitHandler');
            //     return false;
            // },
            errorPlacement: function(error, element){

                console.log($(element));
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                if ($(element).hasClass('select')) {
                    $(field_error).insertAfter($(element).next('span.select2'));
                } else {
                    $(field_error).insertAfter($(element));
                }

                return false;

            },
            rules: {
                country: {
                    required: true,
                },
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#full_registration_password"
                },

            }
        });
    }

    if (formId == 'personal_data') {
        $(formObj).validate({
            focusCleanup: true,
            submitHandler: function(form) {

                $.ajax($(form).attr('action'), {
                    data: {
                        // email: $(form).find('#email').val(),
                        _token: $(form).find('input[name="_token"]').val(),
                        name: $(form).find('input[name="name"]').val(),
                        dob: $(form).find('input[name="dob"]').val(),
                        // gender: $(form).find('select[name="sel-gender2"]').val(),
                        city: $(form).find('input[name="city"]').val(),
                        address: $(form).find('input[name="address"]').val(),
                        zip: $(form).find('input[name="zip"]').val(),
                        phone: $(form).find('input[name="phone"]').val()
                    },
                    dataType: 'json',
                    method: 'post',
                    success: function(data, status, xhr) {
                       // console.log(data);
						alert("Profile updated successfully");	
						//top.location.reload();
                        return false;
                    }
                });

                return false;


            },
            success: function(label, element){
                $(element).parents('.field').find('.field-error').remove();
		    },
            errorPlacement: function(error, element){
                var field_error = '<div class="field-error"><div class="align-m">' +
                    '<p>' + error.text() + '</p>' + '</div>' + '</div>';

                $(field_error).insertBefore($(element));
            },
            rules: {
                name: {
                    required: true
                },
                dob: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                zip: {
                    required: true
                },
                phone: {
                    required: true
                }
            }
        });
    }

    return false;
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function clearErrors(form)
{
    $(form).find('.field-error').remove();
}

function helpSectionsText()
{
    var url_string = window.location.href;
    var url = new URL(url_string);
    var section = url.searchParams.get("section");

    if($('#' + section).length > 0) {
        $('#' + section + ' .title').trigger('click');
    }
}

var getUserState = function()
{
				
				var sessionData = [];
				
				$('.games-list:not(.hidden)').each(function(){
					
					 var sessionObject = { type : null, game_id : new Array(), set_type : null };
					 sessionObject.type = $('.type',this).text();
					 var $this = $(this);
					 
					 $(".game-item a",this).each(function(){
						sessionObject.game_id.push($(this).attr('data-game-id'));
						
					 });
					 
					 sessionObject.set_type = $(".game-item a",this).data('type');
					 sessionObject.game_id.reverse();	
					 sessionData.push(sessionObject);	
					 
					
				});
				
				//console.log(sessionData);
				return JSON.stringify(sessionData);
}


var createTicket = function(){
console.log('create-ticket'+$('#supportEmail').val()+'-->'+$('#supportMessage').val()+'-0--->'+$('#supportSubject').val());	
	//alert("we will shortly open this section.");
	$.post('/live-chat/create-ticket',{ recipient : $('#supportEmail').val(), departmentid : 'default', useridentifier : 'leprecon@yayagaming.com', message : $('#supportMessage').val(), subject : $('#supportSubject').val() },function(result){

		console.log(result);
	
	});
	
	
	
}

$(document).ready(function(){
	
	
	
});
