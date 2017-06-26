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
		var id = $('#taskId').val();
		if(id){
		    var text = '已编辑';
        }else{
		    var text = '已添加';
        }
		var data = {};
		data.title = title;
		data.description = description;
		data.id = id;
		var request = ajaxRequest('post', 'add', data);
		if(request.status_code == 200){
			alert(text);
			$('#title').val('');
            $('#description').val('');
            $('#taskId').val('');
            location.reload();
		}
	});

	// del task
    $('.del').on('click', function () {
        var id = $(this).attr('data-id'), type = 'del';
        var data = {};
        data.id = id;
        data.type = type;
        var request = ajaxRequest('get', 'del', data);
        if(request.status_code == 200){
            alert('已删除');
            location.reload();
        }else{
            alert('删除失败，请重试');
        }
    });

    // undel task
    $('.unDel').on('click', function () {
        var id = $(this).attr('data-id'), type = 'unDel';
        var data = {};
        data.id = id;
        data.type = type;
        var request = ajaxRequest('get', 'del', data);
        if(request.status_code == 200){
            alert('已取消');
            location.reload();
        }else{
            alert('操作失败，请重试');
        }
    });

    // edit task
    $('.edit').on('click', function () {
        var id = $(this).attr('data-id');
        var data = {};
        data.id = id;

        var request = ajaxRequest('post', 'edit', data);
        if(request.status_code == 200){
            var title = request.data[0]['title'];
            var description = request.data[0]['description'];
            var id = request.data[0]['id'];
            $('#title').val(title);
            $('#description').val(description);
            $('#taskId').val(id);
        }
    })


})();