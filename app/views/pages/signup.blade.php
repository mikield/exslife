@extends('wMenuTemplate')
@section('content')

<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      
      <p class="description">{{ trans('auth.signupTitle') }}</p>
      <br />
        
        <a class="link" onclick="go(this, event);" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>
        
      
      
      <!-- progress bar indicator -->
      <div class="login-progressbar-indicator">
        <h3 id="processProc">0%</h3>
        <span>{{ trans('auth.signupProcess')}}...</span>
      </div>
    </div>
    
  </div>
  
  <div class="login-progressbar">
    <div id="process"></div>
  </div>
  
  <div class="login-form">
    
    <div class="login-content">
      
      <form method="post" role="form" id="form_register" novalidate="novalidate">
				
				<div class="form-register-success">
					<i class="entypo-check"></i>
					{{ trans('auth.inviteMessage') }}
				</div>
				
				<div class="form-steps">
					
					<div class="step current" id="step-1">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>	
								<input type="text" class="form-control" name="firstName" id="fName" placeholder="{{ trans('auth.fName') }}" autocomplete="off" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-feather"></i>
								</div>
								<input type="text" class="form-control" name="lastName" id="lName" placeholder="{{ trans('auth.lName') }}" autocomplete="off" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-phone"></i>
								</div>
								
								<input type="text" class="form-control" name="phone" id="phone" placeholder="{{ trans('auth.phone') }}" data-mask="phone" autocomplete="off">
							</div>
						</div>
						
						<div class="form-group">
							<button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								{{ trans('auth.nStep') }}
							</button>
						</div>
						
						<div class="form-group">
							{{ trans('auth.step') }} 1 {{ trans('auth.of') }} 2
						</div>
					
					</div>
					
					<div class="step" id="step-2">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="password" id="password" placeholder="{{ trans('auth.password') }}" autocomplete="off" required>
							</div>
						</div>
                        <div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="{{ trans('auth.passwordRepeat') }}" autocomplete="off" required>
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								{{ trans('auth.signup') }}
							</button>
						</div>
						
						<div class="form-group">
							{{ trans('auth.step') }} 2 {{ trans('auth.of') }} 2
						</div>
						
					</div>
					
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


<script src="/assets/js/neon-register.js" id="script-resource-9"></script>
@stop