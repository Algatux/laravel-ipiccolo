$(document).ready(function(){

	var typingTimer;                //timer identifier
	var doneTypingInterval = 500;  //time in ms, 5 second for example

	var client_list = $('div.client-list','div.container');
	var template = $('div.client.template','div.container .client-list');

	var search_box = $('input#clients-filter','div.container .search-filter-box');
	var clear_search = $('span.clear-search','div.container .search-filter-box');
	var actual_list = client_list.children();

	search_box.focus(function(){
		$(this).val('');
		client_list.fadeOut('fast',function(){
			$(this).empty();
			client_list.show();
		});
	}).keyup(function(){
		var value_entered = $(this).val();
		if((value_entered.length>=3 || !value_entered.length) && !typingTimer)
			typingTimer = setTimeout(doneTyping, doneTypingInterval);
	}).keydown(function(){
		if(typingTimer){
			clearTimeout(typingTimer);
			typingTimer = false;
		}
	}).blur(function(){
		var value_entered = $(this).val();
		if(!value_entered.length){
			client_list.empty().append(actual_list);
		}
	});

	clear_search.click(function(){
		//search_box.val('').trigger('blur');
		window.location.reload(true);
	});

	function createClientRow(client){
		var newLine = template.clone();
		newLine.removeClass('template');
		newLine.attr('id',client.id);
		newLine.append(client.surname+' '+client.name);
		if(client.nikname)
			newLine.append(' <i>{'+client.nikname+'}</i>');
		newLine.click(function(){
			window.location.href='/client/profile/'+client.id;
		});
		client_list.append(newLine);
	}

	function doneTyping () {
		var search_key = search_box.val();
		$.ajax({
				url: '/client/search', // /'+encodeURIComponent(value_entered),
				data: {key:search_key},
				dataType: 'json',
				type: 'POST',
				cache:false,
				success:function(data){
					if(data.length){
						client_list.children().remove();
						$.each(data,function(index,client){
							createClientRow(client);
						});
					}
				},
				error:function(jqXHR, textStatus, errorThrown ){},
				beforeSend:function(jqXHR, settings){
					client_list.empty();
				},
				complete:function(jqXHR, textStatus){
					clearTimeout(typingTimer);
					typingTimer = false;
				}
			});
	}

});