function postViaAjax(url, method, data){
	let result = '';
	$.ajax({
		type: method,
		url: url,		
		crossDomain: true,
        contentType:'application/json',
		data: data,
		success: function(success){
			result = success;
			console.log(typeof success + 'data');
		},
		dataType: 'json'		
	  });

	  return result;
}
