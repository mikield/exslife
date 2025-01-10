@extends('wMenuTemplate')
@section('content')

<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      <p class="description">{{ trans('auth.activateTitle') }}</p>
      <br />
        
        <a class="link" onclick="go(this, event);" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>
        
    </div>
    
  </div>
  
  <div class="login-progressbar">
    <div id="process"></div>
  </div>
  
  <div class="login-form">
    
    <div class="login-content">
      
      
				@if($status == 'ok')
				<div class="form-register-success" style="display: block;">
					<i class="entypo-check"></i>
					{{ trans('auth.activatedSuccess') }} <a style="color: white;font-weight:bolder;" href="{{ URL::to('/login') }}">{{ trans('messages.login') }}</a> 
				</div>
				@else
                <div class="form-register-error" style="display: block;">
					<i class="entypo-alert"></i>
					{{ trans('auth.activatedError') }}
                </div>
                    
                @endif
			
    <div style='margin-top:50px;'>  
     {{--*/ $lang = Session::get('lang') /*--}}
      <a href="/lang/en" class="btn @if($lang == 'en') btn-primary @endif btn-small btn-login">English</a>
      <a href="/lang/ru" class="btn @if($lang == 'ru') btn-primary @endif btn-small btn-login">Русский</a>

    </div>
    </div>
    
  </div>
  
</div>


<script src="/assets/js/neon-register.js" id="script-resource-9"></script>
@stop