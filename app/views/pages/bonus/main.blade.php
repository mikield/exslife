@extends('template')
@section('content')
<script type="text/javascript">
function get(){
	$('#get').attr('onclick',' ');
$.get("/bonus/get", {},
    function(data){
       	if(data.theme == 'success'){
            rateAndMoneyGet(data.more.balanse);
        }
        go('', event, '', '', '/bonus');
        showNotify(data,false);
    }, "json");
}


</script>
<div class="jumbotron">
	<h3>Ежедневный случайный бонус.</h3>
	
	<p>Кликая на кнопку <b>"Получить бонус"</b> вы автоматически делитесь рекламным постом на свою страницу. Это сделано в знак помощи нашему проекту.<br>
		Бонус начисляется вам мгновенно если вы успешно поделились записью. Размеры бонуса случайны, от <b>1</b> монеты до <b>50</b> монет. Все зависит от того сколько система вам выдаст.<br>
		Уважительная просьба <b>не удалять</b> запись, этим вы поможете развиваться проекту.</p>
<?php if(!empty($isDayBonus)){ ?>
		<div class="span8 text-center">
 	<h2 style="color:green;">Вы уже получали сегодня бонус.</b></h2>
 </div>
 <div class="span8 text-center" >
<?php
$links = ['http://exslifeblog1.blogspot.com/','http://exblogtored.blogspot.com/','http://exslifeblog2.blogspot.com/'];
foreach($links as $link){
	 $checkLink = VkRequest('utils.checkLink','url='.$link);
                if($checkLink->response->status == 'not_banned'){
                	$url = $link;
                	break;
                }
}
?>

 Поддержите проект, поделитесь записью в социальные сети.
 <button type="button" onclick="window.open('https://vk.com/share.php?url={{ $url }}&title=exSLife&description=<?=urlencode('Система продвижения во ВКонтакте');?>&image=http://cs409822.vk.me/v409822256/5b86/n9ANG-WLarI.jpg&noparse=true');" class="btn btn-blue btn-block">Опубликовать ВКонтакте</button>
 </div>
<? }else{ ?>

	  	<div class="span8 text-center">
 	<button type="button" id='get' style="margin-top: 40px;"  onclick='get();' class="btn btn-green btn-icon icon-left">
						Получить бонус
						<i class="entypo-check"></i>
					</button>			
 		</div>
 		<? } ?>
</div>

@stop