var shop = {

	__begin: function(){
		$.post("shop/beginPay", {ajax:true},
    function(data){
    	$('#taskEdit').html(data.content);
        $('#taskEdit').modal('show');
    }, "json");
	},

	__webmoney: function(){
		var count = $('#count').val();
		$.post("shop/webmoneyPay", {count:count},
    function(data){
    	$('#taskEdit').html('');
    	$('#taskEdit').html(data.content);
        $('#taskEdit').modal('show');
    }, "json");
	},

	__webmoneyCheck: function(){
		var code = $('#code').val();
		$.post("shop/webmoneyCheckPay", {code:code},
    function(data){
    	if(data.theme == 'success'){
    	$('#taskEdit').html('');
    	$('#taskEdit').modal('hide');
    	rateAndMoneyAdd(data.balanse);
    	}
        showNotify(data,false);
    }, "json");
	},

	__qiwi: function(){
		var count = $('#count').val();
		$.post("shop/qiwiPay", {count:count},
    function(data){
    	$('#taskEdit').html('');
    	$('#taskEdit').html(data.content);
        $('#taskEdit').modal('show');
    }, "json");
	},

	__qiwiCheck: function(){
		var code = $('#code').val();
		$.post("shop/qiwiCheckPay", {code:code},
    function(data){
    	if(data.theme == 'success'){
    	$('#taskEdit').html('');
    	$('#taskEdit').modal('hide');
    	rateAndMoneyAdd(data.balanse);
    	}
        showNotify(data,false);
    }, "json");
	},


    __yandex: function(){
        var count = $('#count').val();
        $.post("shop/yandexPay", {count:count},
    function(data){
        $('#taskEdit').html('');
        $('#taskEdit').html(data.content);
        $('#taskEdit').modal('show');
    }, "json");
    },


    __yandexCheck: function(){
        var number = $('#number').val();
        var code = $('#code').val();
        $.post("shop/yandexCheckPay", {number:number,code:code},
    function(data){
        if(data.theme == 'success'){
        $('#taskEdit').html('');
        $('#taskEdit').modal('hide');
        rateAndMoneyAdd(data.balanse);
        }
        showNotify(data,false);
    }, "json");
    },


}