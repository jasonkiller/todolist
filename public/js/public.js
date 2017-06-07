var ajaxRequest = function(type, url, object){

    var request = {};

    $.ajax({
        type:type,
        url:url,
        data:object,
        timeout: 10000,
        dataType:'json',
        async:false,
        headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
        success:function(res){
            request = res;
        },
        error:function(){
            request = '';
        }
    });

    return request;
};