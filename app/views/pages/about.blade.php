
@extends('wMenuTemplate')

@section('content')


<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content" style="width:400px;">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      
      <p>
  {{ trans('messages.aboutTitle') }}<br>
{{ trans('messages.aboutText') }}
  </p>
        
        <a class="link" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>

    </div>
    
  </div>
  <div class="login-form">
    <div class="login-content">
      <div style='margin-top:50px;'>  
     {{--*/ $lang = Session::get('lang') /*--}}
      <a href="/lang/en" class="btn @if($lang == 'en') btn-primary @endif btn-small btn-login">English</a>
      <a href="/lang/ru" class="btn @if($lang == 'ru') btn-primary @endif btn-small btn-login">Русский</a>

    </div>
    </div>
  </div>
</div>
</div>