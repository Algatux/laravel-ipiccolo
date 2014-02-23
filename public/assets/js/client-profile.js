$(document).ready(function(){

	modal_form_shared_options = {
		keyboard: true
	};

	var modal_form = $('#modal-taglio');
	var modal_delete = $('#modal-delete');

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
		//modal_form.find('.modal-title').text('Modifica');
		//modal_form.modal(modal_form_shared_options);
	});

	del_button.click(function(){
		window.alert('elimina');
	});

	save_button.click(function(){
		window.alert('insert or update');
	});

});