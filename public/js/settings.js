var settings = {
    
    __changePassword: function(){
      var _old = $('#oldPassword').val();
      var _new = $('#newPassword').val();
      $.post('/settings/changePassword', {_old:_old,_new: _new}, function(data){
        if(data.theme == 'success'){
            $('#newPassword').val('');
            $('#oldPassword').val('');
        }
            core._jGrowl(data);
        
        
      },'json');  
    },
    
    
}