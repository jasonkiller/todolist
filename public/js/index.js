(function(){

	$('#finish').on('click', function(){

		var id = $('#finish').attr('data-id');
		var data = {};
		data.id = id;
		console.log(id);
		var request = ajaxRequest('post', 'doFinish', data);
		if(request.status_code == 200){
			alert('已完成');
		}
	});

	$('#submit').on('click', function() {
		
		var title = $('#title').val();
		var description = $('#description').val();

		var data = {};
		data.title = title;
		data.description = description;

		var request = ajaxRequest('post', 'add', data);
		if(request.status_code == 200){
			alert('已添加');
		}

	});

})();