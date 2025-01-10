@extends('template')
@section('content')
<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-2">
			
			<a href="#" class="profile-picture">
				<img src="{{ $user->ava }}" class="img-responsive img-circle" width="100">
			</a>
			
		</div>
		
		<div class="col-sm-7">
			
			<ul class="profile-info-sections">
				<li>
					<div class="profile-name">
						<strong>
							<a href="#">{{ $user->firstName }} {{ $user->lastName }}</a>
							<a href="javascript:;" class="user-status @if(Online::isOnline($user->id) == 'is') is-online @endif tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="@if(Online::isOnline($user->id) == 'is') Online @else Offline @endif"></a>
													</strong>
					</div>
				</li>
				
			</ul>
			
		</div>
		
	</header>
	
	<section class="profile-info-tabs">
		
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-10">
				
				<ul class="user-details">
					<li>
						<a href="#">
							<i class="entypo-suitcase"></i>
							На сайте как: <span><? switch($user->status){
							 case"0": echo 'Пользователь'; break;
                             case"10": echo 'Разработчик'; break;
							}?></span>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-calendar"></i>
							На сайте с: <span>{{date('d.m.y', strtotime($user->created_at)); }}</span>
						</a>
					</li>
				</ul>
				
				
				
				
			</div>
			
		</div>
		
	</section>

</div>
@stop