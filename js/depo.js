var mobile = $('html').hasClass('touchevents');
function modalWindowOpen(){
	$('body, html').css('overflow', 'hidden');
	$('.modal-account.account').css('display', 'none');
	$('.modal-deposite-frame-wrapper').css('display', 'none');
	$('.modal-providers-popup').css('display','none');
	$('.modal-notification').css('display','none');
	$('.modal-dialog').removeAttr('style');
	$('.modal-content').removeAttr('style');
	$('.modal-content > div').css('display', 'none');
	$('.modal-window').css('display', 'block');
	$('.modal-window').animate({opacity: 1}, 300);
	//$('.body-container').attr('style', 'filter: blur(5px);');
	// $('.modal-dialog').css('width', '535px');
}


function getBankAccount(){
	$.post('/get-bank-account',function(response){
		var response = JSON.parse(response);
		console.log(response);
		if( response['status'] == 1 )
		{
			if(response['result'] == null)
			{
				$('.bank-account-details-holder').hide();
				$('#amount').hide();
				$('#amountLabel').hide();
				$('.add_bank_account_btn').show();
				$('.withdraw-step-form-holder').show();
			}
			else
			{
				var string = '<tr>'+
				'<td>'+response["result"]["receiving_bank_name"]+'</td>'+
				'<td>'+response["result"]["receiving_person_name"]+'</td>'+
				'<td>'+response["result"]["bic_code"]+'</td>'+
				'<td>'+response["result"]["iban"]+'</td>'+
				'</tr>'+
				'<tr><th colspan="4">Address</th></tr>'+
				'<tr>'+
				'<td colspan="4">'+response["result"]["receiving_bank_address"]+'</td>'+	
				'</tr>';
				$('.bank-account-details-holder tbody#bank-details-table').html(string);	
				$('.bank-account-details-holder tbody#bank-details-table td').css('text-align','left');
				$('.add_bank_account_btn').hide();
				$('.withdraw-step-form-holder').hide();
				$('.bank-account-details-holder').show();
				$('#amount').show();
				$('#amountLabel').show();
			}
		}
			
	});
}

var getPendingTransactions = function(){
		$.post('/player/get-pending-withdrawals',null,function(data){
		var data = JSON.parse(data)['result'];
		if(data.length > 0)
		{
			var string = '';
			var monthNames = [ "January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December" ];
			console.log(data);
			for(i=0;i<data.length;i++)
			{
				if (data[i]["deleted"] == 0)
				{
					
					if(data[i]["method"] == 'RAVEDIRECTFP')
					{
						var method = "Bank Transfer";
					}
					else
					{
						var method = data[i]["method"];
					}
					var d = new Date(data[i]["updated_at"]);
					var formattedDate = d.getDate()+' '+monthNames[d.getMonth()] + ' ' + d.getFullYear();	
					string = string + '<tr>'+
					'<td>'+(i+1)+'</td>'+
					'<td>'+formattedDate+'</td>'+
					'<td>'+data[i]["amount"]+' '+$('input[name="currency"]').val()+'</td>'+
					'<td>'+method+'</td>'+
					'<td style="text-align:center"><button title="Remove Withdraw Request" style="font-size:8px;width:22px;height:22px;border-radius:11px;text-align:center;padding:0px" data-id="'+data[i]["id"]+'" class="btn btn-small btn-sm btn-danger cancelTransaction"><i class="icon-cancel-music" style="color:white" aria-hidden="true"></i></button></td>'+
					'</tr>';
				}
			}
			$('#pending_transaction_table').html(string);
			
			//console.log(string);
		}	
		else
		{
			$('#pending_transaction_table').html("<tr><td colspan='5' style='text-align:center'>No Transactions Found</td></tr>");
		}
	});
}

$(document).on('click','.cancelTransaction',function(e){
	
	var a = confirm("Are you sure ?");
	if( a == false )
	{
		e.preventDefault();
	}
	else
	{
			
			var id = $(this).attr('data-id');
	
			
			$.post('/player/cancel-pending-withdraw',{ request_id: id },function(flag){
				//console.log(flag);
				getPendingTransactions();
			
			});
			
	}
	
	
});


$(document).on('click','#submit-withdraw-step',function(event){
event.preventDefault();
if( $('#modal-swift').val() == '' || $('#modal-bank-name').val() == '' || $('#modal-bank-address').val() == '' || $('#modal-user-name').val() == '' || $('#modal-iban').val() == '' )
{
		alert("Field cannot be empty");
}
else
{		
		$.post('/add-bank-account',{ bic_code : $('#modal-swift').val(), receiving_bank_name : $('#modal-bank-name').val(), receiving_bank_address : $('#modal-bank-address').val(), receiving_person_name : $('#modal-user-name').val(), iban : $('#modal-iban').val() },function(response){
			var response = JSON.parse(response);
			//console.log(response);
			if( response['status'] == 1 || response['status'] == '1')
			{
				alert("bank Account added successfully..! You can proceed with withdraw now.");
				location.reload();
			}
			else
			{
				alert(response["result"]);
			}
		});
}
});


var getDepoFormFields = function(){
    var data = {
        _token: $('input[name="_token"]').val(),
        account_type: $('input[name="account_type"]').val(),
        first_name: $('input[name="first_name"]').val(),
        last_name: $('input[name="last_name"]').val(),
        email: $('#edit_email').val(),
        phone: $('input[name="edit_phone"]').val(),
        address: $('input[name="address"]').val(),
        city: $('input[name="city"]').val(),
        state: $('input[name="state"]').val(),
        country: $('input[name="country"]').val(),
        country_three: $('input[name="country_three"]').val(),
        zip: $('input[name="zip"]').val(),
        amount: $('input[name="amount"]').val(),
        currency: $('input[name="currency"]').val(),
        player_id: $('input[name="player_id"]').val(),
		cardtype: $('input[name="cardtype"]').val()
        
    };

    if ($('.deposit-form').find('select[name="bonus_id"]').length > 0) {
        $.extend(data, {bonus_id: $('.deposit-form').find('select[name="bonus_id"]').val()});
    } else {
        $.extend(data, {bonus_id: $('.deposit-form').find('input[name="bonus_id"]').val()});
    }

    return data;
}


$('.deposit-form').submit(function(e){
	e.preventDefault();
			
			if( $('input[name="edit_name"]').val() == '' || $('input[name="edit_email"]').val() == '' || $('input[name="edit_address"]').val() == '' || $('input[name="edit_city"]').val() == '' ||  $('input[name="edit_county"]').val() == '' || $('input[name="edit_zip"]').val() == '' || $('input[name="edit_phone"]').val() == '')
			{
					alert('You need to complete profile information for deposite and withdrawal');
					e.preventDefault();
					modalWindowOpen();
					accountEnter();
			}
			else
			{
						
			var data = getDepoFormFields();
			var url = $('.deposit-form').find('input[name="depo_url"]').val() + $('.deposit-form').find('input[name="amount"]').val() + '/';

            if ($('.deposit-form').find('select[name="bonus_id"]').length > 0) {
                url += $('.deposit-form').find('select[name="bonus_id"]').val();
            } else {
                url += $('.deposit-form').find('input[name="bonus_id"]').val();
            }

            url += '/' + '1/' + $('.deposit-form').find('input[name="payment_method"]').val()+'/2';

            if ($('.deposit-form').find('input[name="payment_method"]:checked').val() == 'IDEAL') {
                url += '/' + $('.deposit-form').find('select[name="bank"]').val();
            }
            console.log(url);
		    modalWindowOpen();
			if(!mobile)
			{	
					
				$('.modal-deposite-frame-wrapper iframe').attr('src',url);
				$('.modal-deposite-frame-wrapper').css('display', 'block');
			}
			else{
				window.open(url, '_blank');
			}
			
			
			}
});

$(document).on('change','#select_withdraw_method',function(){
	if( $(this).val() == 'RAVEDIRECTFP' )
	{
		getBankAccount();
	}
	else
	{
		$('#amount').show();
		$('#amountLabel').show();
		$('.add_bank_account_btn').hide();
	}
	$('input[name="payment_method"]').val($(this).val());
});

$('#withdrawForm').submit(function(e){
	e.preventDefault();
	//alert('prevented');
	$.ajax({
			url : '/withdraw',
			type : 'POST',
			data : $('#withdrawForm').serialize(),
			success : function(res){
			var res = JSON.parse(res);
			console.log(res);
			window.location.href = res['result'];
			}
		});
	

});

$(document).on('click','.add_bank_account_btn',function(e){
	e.preventDefault();
	$('.jq_get_bank_details').click();
});

$(document).ready(function(){
	if(logged)
	{
	getBankAccount();
	getPendingTransactions();
	}
});
