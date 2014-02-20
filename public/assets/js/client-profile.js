$(document).ready(function(){

	var alert = $(".alert");
	if(alert){
		alert.alert();
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 2000);
	}
		

	var mod_button = $('li#modify-client','nav.navbar');
	var del_button = $('li#delete-client','nav.navbar');

	mod_button.click(function(){
		alert('modifica');
	});

	del_button.click(function(){
		alert('elimina');
	});

});