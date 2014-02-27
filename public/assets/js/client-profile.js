$(document).ready(function(){

	var save_action = false;
	var client_id = $('span#client-id','div.container div.page-header').text();

	modal_form_shared_options = {
		keyboard: true
	};
	

	var modal_form = $('#modal-taglio');
	var modal_delete = $('#modal-delete');

	modal_form.on('hidden.bs.modal', function () {
    	if(save_action) window.location.reload(true);	
	});

	var alert = $(".alert");
	if(alert){
		alert.alert();
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 2000);
	}
		
	var add_button = $('li#add-taglio','nav.navbar');
	var mod_button = $('li#modify-client','nav.navbar');
	var del_button = $('li#delete-client','nav.navbar');

	var save_button = $('button.saveAction','#modal-taglio .modal-footer');

	add_button.click(function(){
		modal_form.find('.modal-title').text('Aggiungi');
		modal_form.modal(modal_form_shared_options);
	});

	mod_button.click(function(){
		window.location.href= '/client/modify/'+client_id;
	});

	del_button.click(function(){
		if(confirm('Vuoi eliminare il cliente ?')){
			window.location.href= '/client/delete/'+client_id;
		}
	});

	save_button.click(function(){
		var form_data = modal_form.find('form').serialize();
		$.ajax({
				url: '/appointment/add/'+client_id,
				data: form_data,
				dataType: 'json',
				type: 'POST',
				cache:false,
				success:function(data){
					save_action = true;
					save_button.removeAttr('disabled','disabled');
					hideSpinner();	
				},
				error:function(jqXHR, textStatus, errorThrown ){},
				beforeSend:function(jqXHR, settings){
					showSpinner();
					save_button.attr('disabled','disabled');	
				},
				complete:function(jqXHR, textStatus){
					modal_form.modal('hide');
				}
			});
	});

	function showSpinner(){
		$(".loading-spinner").fadeTo(500, 1);
	}
	function hideSpinner(){
		$(".loading-spinner").fadeTo(500, 0);
	}

});