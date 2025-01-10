@extends('wMenuTemplate')
@section('content')

<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      
      <p class="description">{{ trans('auth.loginTitle') }}</p>
         <br />
        <a class="link" onclick="go(this, event);" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>
        
      
      
      <!-- progress bar indicator -->
      <div class="login-progressbar-indicator">
        <h3 id="processProc">0%</h3>
        <span>{{ trans('messages.loginProcess')}}.</span>
      </div>
    </div>
    
  </div>
  
  <div class="login-progressbar">
    <div id="process"></div>
  </div>
  
  <div class="login-form">
    
    <div class="login-content">
      
      <form id="form_login">
        <div class="form-group">  
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-user"></i>
            </div>
            <input type="text" class="form-control" name="email" id="email" placeholder="{{ trans('messages.loginField') }}" autocomplete="off" required="">
          </div>
          
        </div>
        
        <div class="form-group">
          
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-key"></i>
            </div>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="{{ trans('messages.passField') }}" autocomplete="off" required="">
          </div>
        
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-login">{{ trans('messages.login') }}<i class="entypo-login"></i>
          </button>
        </div>
        
      </form>
    <div class="login-bottom-links">	
				<a href="/forgot" class="link">{{ trans('auth.forgot') }}</a>
			</div>
    <div style='margin-top:50px;'>  
     {{--*/ $lang = Session::get('lang') /*--}}
      <a href="/lang/en" class="btn @if($lang == 'en') btn-primary @endif btn-small btn-login">English</a>
      <a href="/lang/ru" class="btn @if($lang == 'ru') btn-primary @endif btn-small btn-login">Русский</a>

    </div>
    </div>
    
  </div>
  
</div>
@stop