(function(){

    // dofinish task
	$('.finish').on('click', function(){
		var id = $(this).attr('data-id'), type = 'finish';
		var data = {};
		data.id = id;
		data.type = type;

		var request = ajaxRequest('post', 'doFinish', data);
		if(request.status_code == 200){
			alert('已完成');
			location.reload();
		}
	});

	// cancle finish
    $('.unFinish').on('click', function(){
        var id = $(this).attr('data-id'), type = 'unfinish';
        var data = {};
        data.id = id;
        data.type = type;

        var request = ajaxRequest('post', 'doFinish', data);
        if(request.status_code == 200){
            alert('已取消');
            location.reload();
        }
    });

	// add task
	$('#submit').on('click', function() {
		var title = $('#title').val();
		var description = $('#description').val();
		var data = {};
		data.title = title;
		data.description = description;
		var request = ajaxRequest('post', 'add', data);
		if(request.status_code == 200){
			alert('已添加');
			$('#title').val('');
            $('#description').val('');
            location.reload();
		}
	});

	// del task
    $('.del').on('click', function () {
        var id = $(this).attr('data-id');
        var data = {};
        data.id = id;
        var request = ajaxRequest('get', 'del', data);
        if(request.status_code == 200){
            alert('已删除');
            location.reload();
        }else{
            alert('删除失败，请重试');
        }
    });


})();