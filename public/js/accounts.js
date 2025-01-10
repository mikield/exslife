var accounts = {
    
    
    __add: function(){
        var url = $('#url').val();
        var nUrl = url.replace('https://','');
        if(~nUrl.indexOf('http://')){
        var nUrl = url.replace('http://','');
        }
        $.post("/accounts/addAccount", { accountID: nUrl},
       function(data){
        if(data.theme == 'success'){
            $('#url').val('');
        }
           core._jGrowl(data);   
       },'json'); 
    }
    
    
    
    
}