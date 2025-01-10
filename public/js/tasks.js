var tasks = {

    /* Do a task */

    __do: function(taskID){
  $('#do'+taskID).attr('style','background:lightgreen!important;');
  $.post("/tasks/dotask", { taskID : taskID},
    function(data){
      if(data.theme == 'success'){
        $('#task'+taskID).slideUp('slow');
        rateAndMoneyAdd(data.balanse,1);
      }else if(data.theme == 'information'){
        $('#task'+taskID).slideUp();
      }
       if(data.theme == 'captcha'){
        showNotify(data,true);
      }else{
        $('#do'+taskID).attr('style','');
        if(data.theme =='success'){
        showNotify(data,false,5000);
        var waitTime = setInterval(taskTime, 1000);
        setTimeout('clearInterval('+waitTime+')', 5000); 
        }else{
          showNotify(data,false);
        }
      } 
    }, "json");
     },


     /* Adding a task */


   __add: function(type){

    var url = $("#url").val();
    var count = $('div#count span.ui-label').html();
    var pay = $('div#pay span.ui-label').html();
    var answer = $('#answer').val();
    if(type == 'comments'){
    $('#comments_values').val('');
      $('.comment').each(function() {
       var comment = $(this).val() ? $(this).val()+'|' : '';
       var values = $('#comments_values').val();
       $('#comments_values').val(values+''+comment);
      });
    }

     $.post("/tasks/add", { type : type, url : url, answer : answer, comments : $('#comments_values').val(), count : count, pay : pay},
  function(data){
    if(data.theme == 'success'){
      $('button.btn').attr('onclick','');
      $('#coints').slideUp();
      go('', event,'','','/my')
    }
    showNotify(data,false);
  }, "json");

},

  /* Hiding a task */

__hide: function(taskID){
    $.post("/task/hide", { taskID : taskID},
    function(data){
        $('#task'+taskID).slideUp();
       showNotify(data,false);
  }, "json");
},

 /* Report task */
__reportShow: function(taskID){
    $.post("/task/showReportModal", {taskID:taskID},
    function(data){
       if(data.theme == 'success'){
        Modal('create','taskReport');
        Modal('fill','taskReport',data.more);
        $('#taskReport').modal('show');
       }else{
        showNotify(data,false);
       }
    },'json');
},

__report: function(taskID){
    var reson = $('input:radio[name=reson]:checked').val();
    $.post("/task/report", {taskID:taskID, reson:reson},
    function(data){
       if(data.theme == 'success'){
        Modal('close','taskReport');
       }
        showNotify(data,false);
    },'json');
},
    
  /* Deleting a task */

  __delete: function(taskID){
    $.post("/tasks/delete", { taskID : taskID},
    function(data){
        if(data.theme == 'success'){
            $('#task'+taskID).slideUp();
            rateAndMoneyAdd(data.balanse);
        }
        showNotify(data,false);
  }, "json");

},

captcha: function(){
 
   var text = $('.toast-message #capText').val();
   var taskID = $('.toast-message #taskID').val();
   var sid = $('.toast-message #sid').val();

   $.post("/tasks/dotask", { taskID : taskID, captcha: true, sid: sid, text : text},
    function(data){

      if(data.theme == 'success'){
        $('#task'+taskID).slideUp('slow');
        rateAndMoneyAdd(data.balanse,1);
      }else if(data.theme == 'information'){
        $('#task'+taskID).slideUp();
      }

      if(data.theme == 'captcha'){
        toastr.clear();
        showNotify(data,true);
      }else{
        $('#do'+taskID).attr('style','');
        toastr.clear();
        showNotify(data,false);
      } 

  }, "json");
}, 

  __compCheck: function(taskID){
    var preStart = {'content':'Начинаем проверку'};
    showNotify(preStart,false);

        $.post("/tasks/checkDoneTask", { taskID : taskID},
    function(data){
        showNotify(data,false); 
    }, "json");
  },

  __edit: function(taskID){
    $.post("tasks/edit", {taskID: taskID},
      function(data){
        $('#taskEdit').html(data.content);
        $('#taskEdit').modal('show');
      }, 'json');
  },

  __editForce: function(taskID){
    $.post("tasks/editTaskAction", {taskID: taskID, count: $('#count').val(), pay: $('#pay').val()},
      function(data){
        $('#taskEdit').html('');
        $('#taskEdit').modal('hide');
        showNotify(data,false);
      }, 'json');
  }


  
  
    
}   
    setTimeout(function() {
// счетаем цену при добавлении задания
$( "#pay, #count" ).slider({
  change: function() {
  var count_page = $('div#count span.ui-label').html() * 1;
  var price_page = $('div#pay span.ui-label').html() * 1;
  var tax = count_page * price_page * 0.1;
  var result_points = count_page * price_page + tax;
  var result_points = Math.round(result_points);
  $('#howmuch').css('display','block');
  $('#coints').text(result_points+' монет');
}
});
}, 500);



function taskTime(){
   var t=parseInt($('#time').html());
      var tt = t - 1;
      $('#time').html(tt);
     
}