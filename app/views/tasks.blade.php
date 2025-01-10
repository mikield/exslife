@extends('template')
@section('content')
<link rel="stylesheet" href="./assets/js/vertical-timeline/css/component.css" id="style-resource-1">
<h2>Добро пожаловать на exSLife, мы скоро будем.</h2>


<ul class="cbp_tmtimeline">
<li>
		<time class="cbp_tmtime"><span>21.10</span> <span>27.07.2914</span></time>
		
		<div class="cbp_tmicon bg-info">
			<i class="entypo-user-add"></i>
		</div>
		
		<div class="cbp_tmlabel">
		<h2><a href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a> <span>обновления №11</span></h2>
			<p> <ol>
			<li>Создана реферальная система.</li>
			<li>Мелкие визуальные изменения.</li>
			<li>Создана чудо ссылка для тех у кого есть доступ к beta тесту. Ваша реферальная ссылка на данный момент: <b>http://exslife.com/{{ Auth::user()->inviteCode }}/beta</b><br>
			С помощью этой ссылки любой кто перейдет по ней, получит доступ к beta и станет вашим рефералом.</li>
			</ol> </p>
		</div>
	</li>
	<li>
		<time class="cbp_tmtime"><span>16:45</span> <span>18.07.2914</span></time>
		
		<div class="cbp_tmicon bg-success">
			<i class="entypo-feather"></i>
		</div>
		
		<div class="cbp_tmlabel">
		<h2><a href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a> <span>обновления №10</span></h2>
			<p> <ol>
			<li>Добавлена страница статистики.</li>
			<li>Мелкие визуальные изменения.</li>
			<li>Добавлена лента разработки сайта.</li>
			</ol> </p>
		</div>
	</li>	
	<li>
		<time class="cbp_tmtime"><span>14:31</span> <span>10.07.2014</span></time>
		
		<div class="cbp_tmicon">
			<i class="entypo-user"></i>
		</div>
		
		<div class="cbp_tmlabel empty">
			<span>Alpha test started</span>
		</div>
	</li>
</ul>
@stop