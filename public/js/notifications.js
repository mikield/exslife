var notification = {

	__view: function(notifID){
		$.post("/fortuna/viewNotif", {  notifID: notifID},
    function(data){
      if(data.theme == 'success'){
      	$('#notification'+notifID).removeClass('unread').addClass('read');
        $('#notification'+notifID+'> a').attr('onmouseover','');
      }
    }, "json");
	},

	__delete: function(notifID){
		
		$.post("/fortuna/deleteNotif", {  notifID: notifID},
    function(data){
      if(data.theme == 'success'){
      	$('#notification'+notifID).slideUp();
      }
    }, "json");
	}




}