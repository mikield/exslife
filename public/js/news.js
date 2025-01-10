var news = {

	commentBegin: function(){
    $('.user-comment-content > textarea').focus();
	},

	commentSend: function(postID){

		var message = $('.user-comment-content > textarea').val();
		$('.user-comment-content > textarea').val('');
		var _token = $("input[name='_token']").val();
		$.post("/newsCommentCreate", { postID: postID, message: message, _token: _token },
	       function(data){
	       		go('', event, '', '', '/news/'+postID);
	       		showNotify(data,false);
	    },'json'); 
	},

	like: function(postID){
		$.post("/newsLike", { postID: postID},
       function(data){
       		go('', event, '', '', '/news/'+postID);
       },'json'); 
	},
    
    likeComment: function(commentID, postID){
		$.post("/newsLikeComment", { commentID: commentID},
       function(data){
       		go('', event, '', '', '/news/'+postID);
       },'json'); 
	},

	commentDelete: function(commentID, postID){
		$.post("/newsCommentDelete", { commentID: commentID},
	       function(data){
	       		go('', event, '', '', '/news/'+postID);
	       		showNotify(data,false);
	    },'json');
	},
    
    answerTo: function(userID){
        $.post("/comments/answerTo", { userID: userID},
	       function(data){
	           var userComment = $('.user-comment-content > textarea').val();
	       	$('.user-comment-content > textarea').val(userComment + data.msg);	
	    },'json');
    }
    
}