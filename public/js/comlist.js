var com = {

	__recheck: function(taskID){
	$.post("tasks/reCheckDoneTask", { taskID : taskID},
    function(data){
    	if(data.theme == 'success'){
    		rateAndMoneyAdd(data.balanse);
    		$('#com'+taskID).slideUp();
    	}
        showNotify(data,false); 
    }, "json");
	},

	__pay: function(taskID){
		$.post("tasks/payForComp", { taskID : taskID},
    function(data){
    	if(data.theme == 'success'){
    		rateAndMoneyAdd(data.balanse);
    		$('#com'+taskID).slideUp();
    	}
        showNotify(data,false); 
    }, "json");
		
	}
}