var core = {
_jGrowl: function(data){
        $.jGrowl(data.content, {
        life:3000,
        header:data.header,
        theme:data.theme,
    });     
},
}

//Событие закрытия окна
$(document).on('hidden.bs.modal', function (event) {
$(event.target).remove();
});

function Modal(action,modalID,data){
    if(action == 'create'){
        $('.page-container').append("\
        <div class='modal fade custom-width' id='"+modalID+"'>\
            <div class='modal-dialog' style='width: 60%;'>\
                <div class='modal-content'>\
                <div class='modal-header'>\
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>\
                <h4 class='modal-title'></h4>\
                </div>\
                <div class='modal-body'>\
                </div>\
			<div class='modal-footer'>\
			</div>\
		</div>\
	   </div>\
    </div>\
    ");
    
    }
    if(action == 'fill'){
        $('#'+modalID+' .modal-title').html(data.modalTitle);
        $('#'+modalID+' .modal-body').html(data.modalBody);
        $('#'+modalID+' .modal-footer').html(data.modalFooter);
    }
    if(action == 'show'){
        $('#'+modalID).modal('show');
    }
    if(action == 'close'){
        $('#'+modalID).modal('hide');
    }
}



 function login(){
  var email = $('#email').val();
  var pass = $('#pass').val();
    $.post("/login", { email:email, pass:pass},
       function(data){
        if(data.theme == 'success'){
             location.href = '/news';
        }else{
          $('#loginForm').slideDown();
           $(".login-page").removeClass('logging-in');
           $('#processProc').html('0%');
           $('#process').css('width','0%');
            showNotify(data,false);
        }   
       },'json'); 
 }
 
 function selectAccount(accountID){
  $('#loginForm').slideUp();
   var email = $('#accEmail'+accountID).val();
   $('.emailField').val(email);

   $('.btn-login').attr('onclick','lockLogin("'+accountID+'");');
   $('.btn-login').attr('onsubmit','lockLogin("'+accountID+'");');
   $('#loginForm').slideDown();
 }



 function showNotify(data,isCaptcha,life,bot){
  if(!life){
    var timeout = '1000';
    var showDuration = '500';
  }else{
    var timeout = '5000';
    var showDuration = '500';
  
  }
  if(isCaptcha){
 var opts = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-top-full-width",
  "onclick": null,
  "showDuration": "0",
  "hideDuration": "0",
  "timeOut": "0",
  "extendedTimeOut": "0",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
  }else{
  var opts = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-top-full-width",
  "onclick": null,
  "showDuration": showDuration,
  "hideDuration": "1000",
  "timeOut": life,
  "extendedTimeOut": timeout,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
}
if (data.theme == 'success'){
  toastr.success(data.content,data.title, opts);
}else if (data.theme = 'error'){
  toastr.error(data.content,data.title, opts);
}else{
  toastr.info(data.content,data.title, opts);
  }


 }
 
 function rateAndMoneyAdd(balanse,rate){

  if(rate > 0){
      var r=parseInt($('#rate').html());
      var rr = r + 1;
      $('#rate').html(rr);
  }
  if(balanse > 0){
      var b=parseInt($('#money').html());
      var bb =  b + parseInt(balanse);
      $('#money').html(bb);
  }

 }


 function rateAndMoneyGet(balanse,rate){

  if(rate > 0){
      var r=parseInt($('#rate').html());
      var rr = r - 1;
      $('#rate').html(rr);
  }
  if(balanse > 0){
      var b=parseInt($('#money').html());
      var bb =  b - parseInt(balanse);
      $('#money').html(bb);
  }

 }

function go(link, event, mode, type, url)
{
  show_loading_bar({
  pct: 99, // number from 0-100,
  delay: 6, // seconds to fully load the percentage (seconds unit)
});
  if(url){
    var to = url;
  }else{
    var to = link.href;
  }
  event.preventDefault();
   $.get(to, {},
       function(msg){
         console.log(msg.html);
      $("#content").html(msg.html.content);
       $('#loadingStyle').css('display','none');
       var nameLink = "exSLife / "+msg['newTitle'];
       ga('send', 'pageview', to);
       if(mode != 'back'){
         document.title = nameLink; 
         history.pushState({title:nameLink, href:to}, null, to);
       }
       if(mode == 'menu'){
        $('.active').removeClass('active');
        $('#'+type).addClass('active');
       }else{
        $('.active').removeClass('active');
       }
       hide_loading_bar();
       },'json');
}

window.addEventListener("popstate", function(e) {
  if(e){
    go('', event, 'back','',e.state.href);                   
    }
}, false );



