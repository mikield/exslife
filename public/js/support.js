var support = {


	__getConversation: function(questionID){
			$.post('/support/getConversation', {questionID: questionID},
	      function(data){
	      	if(data.theme == 'success'){
	    		$('.conversation-body').html(data.content);
	    		  $(".conversation-body").animate({
    					scrollTop: $('.conversation-body').get(0).scrollHeight
					}, 2000);
	    		$('.conversation-body').attr('id',questionID);
	    	}else{
	    		showNotify(data,false);
	    	}
	    }, "json");	
	},

	__answer: function(){
	var answer = $(".form-control").val();
	var questionID = $('.conversation-body').attr('id');
			$.post('support/supportAnswer', {answer: answer, questionID: questionID},
	      function(data){
	      	if(data.theme == 'success'){
	    		$(".form-control").val(' ');
	    		support.__getConversation(questionID);
	    	}else{
	    		showNotify(data,false);
	    	}
	    }, "json");
	},
    
    
    __askQuestion: function(){
       var question = $('div.chat-asking textarea').val();
       $.post('support/askQuestion', {question:question},
	      function(data){
	      	if(data.theme == 'success'){
	    		$(".form-control").val(' ');
	    		support.__getConversation(data.balanse);
                showNotify(data,false);
	    	}else{
	    		showNotify(data,false);
	    	}
	    }, "json");
        
    }




}