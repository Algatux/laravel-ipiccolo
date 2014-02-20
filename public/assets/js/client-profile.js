$(document).ready(function(){

	var mod_button = $('li#modify-client','nav.navbar');
	var del_button = $('li#delete-client','nav.navbar');

	mod_button.click(function(){
		alert('modifica');
	});

	del_button.click(function(){
		alert('elimina');
	});

});