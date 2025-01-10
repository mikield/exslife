@extends('wMenuTemplate')
@section('content')


<style type="text/css">
input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill{
	background-color: none!important;
}
	.lockscreen-input{
		float:left;
		text-align: center;
		margin-right: 20px;
		cursor: pointer;
	}

</style>

<div class="login-container">
	
	<div class="login-header">
		
		<div class="login-content">
			
			 <div class="login-content">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      
      <p class="description">{{ trans('auth.accountsTitle') }}</p>
        <br /> 
        <a class="link" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>
        
    </div>
		</div>
		
	</div>
	
	<div class="login-form">
		<?php $count = count($users);
			$proc = 45- (5*$count); ?>
	<div style="margin-left:{{$proc}}%;" id='accounts'>

	@foreach ($users as $user)
    
			<div class="form-group lockscreen-input" onclick="selectAccount('{{ $user->id }}');"  id="accounts{{ $user->id }}">
					<input hidden value="{{ $user->email }}" id='accEmail{{ $user->id }}'>
					<div class="lockscreen-thumb">
						<img src="{{ $user->ava }}" width="150" height="150" class="img-circle">
						
						<div class="lockscreen-progress-indicator">0%</div>
					<canvas width="150" height="150"></canvas></div>
					
					<div class="lockscreen-details">
						<h4>{{ $user->firstName }} {{ $user->lastName }}</h4>
						<span data-login-text="logging in...">{{ trans('messages.lastLogin')}}: 
						@if(Online::isOnline($user->id) == 'is')
						{{ trans('static.online') }}
						@else
						{{date('d.m.y', strtotime($user->updated_at)); }}
						@endif
						</span>
					</div>
					
				</div>
	@endforeach	


				<div class="form-group lockscreen-input" onclick="location.href='/loginForget'">
					
					<div class="lockscreen-thumb">
						<img src="/images/male_avatar.jpg" width="150" class="img-circle">
						
						<div class="lockscreen-progress-indicator">0%</div>
					<canvas width="150" height="150"></canvas></div>
					
					<div class="lockscreen-details">
						<h4>{{ trans('messages.yourAccount')}}</h4>
						<span data-login-text="logging in..." style='opacity:0;'>{{ trans('messages.lastLogin')}}: 00.00.0000 </span>
					</div>
					
				</div>

				
				</div>





		<div class="login-content">
			
			
			
				<div style="display:none;" id="loginForm">
				<div class="form-group">

						<input type="text" hidden id="email" class="emailField">
					
				
				</div>
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" onkeypress="javascript:if(13==event.keyCode){login();}" class="form-control" name="password" id="pass" placeholder="{{ trans('messages.passField') }}" autocomplete="off">
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						{{ trans('messages.login') }}
					</button>
				</div>
				</div>
			<div class="login-bottom-links">		
				<a href="forgot" class="link">{{ trans('auth.forgot') }}</a>
			</div>
			
			<div style='margin-top:50px;'>
            {{--*/ $lang = Session::get('lang') /*--}}  
      <a href="/lang/en" class="btn btn-primary btn-small btn-login">English</a> 
      <a href="/lang/ru" class="btn btn-primary btn-small btn-login">Русский</a>
    </div>
			
		</div>
		
	</div>
	
</div>