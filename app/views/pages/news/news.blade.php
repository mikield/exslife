@extends('template')
@section('content')
<link rel="stylesheet" href="/assets/js/vertical-timeline/css/component.css" id="style-resource-1">
<h2>Добро пожаловать на exSLife, мы скоро будем.</h2>


<ul class="cbp_tmtimeline">
@foreach($news as $post)
	<li>
		<time class="cbp_tmtime"><span>{{date('H:i', strtotime($post->created_at)); }}</span> <span>{{date('d.m.y', strtotime($post->created_at)); }}</span></time>
		
		<div class="cbp_tmicon bg-success">
			<i class="entypo-check"></i>
		</div>
		
		<div class="cbp_tmlabel">
		<h2><a href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a> <span>{{ $post->title }}</span></h2>
			<p>{{ str_limit($post->text, $limit = 100, $end = '...') }}</p>
			<a style="float: right;margin-top: -20px;" href="/news/{{ $post->newsID }}" class="btn btn-info" onclick="go(this, event);">Подробней</a>
		</div>
	</li>		
@endforeach
<li>
		<time class="cbp_tmtime"><span>14:31</span> <span>10.07.2014</span></time>
		
		<div class="cbp_tmicon">
			<i class="entypo-user"></i>
		</div>
		
		<div class="cbp_tmlabel empty">
			<span>Beta test started</span>
		</div>
	</li>
</ul>
@stop