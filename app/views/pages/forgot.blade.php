@extends('wMenuTemplate')
@section('content')

<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content">
      
      <a href="/" class="logo" style="font-size: 50px;font-weight: bolder;color: white;">exSLife</a>
      <p class="description">{{ trans('auth.forgotTitle') }}</p>
      <br />
        
        <a class="link" onclick="go(this, event);" href="/about">{{ trans('messages.about') }}</a>
        <a class="link" href="/terms">{{ trans('messages.terms') }}</a>
        <br>
       {{ trans('messages.withLove') }} <a class="link" href="http://vk.com/codemax_tm" target="_blank">CodeMax™</a>
        
      
      
      <!-- progress bar indicator -->
      <div class="login-progressbar-indicator">
        <h3 id="processProc">0%</h3>
        <span>{{ trans('auth.forgotProcess')}}...</span>
      </div>
    </div>
    
  </div>
  
  <div class="login-progressbar">
    <div id="process"></div>
  </div>
  
 <div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" id="form_forgot_password" novalidate="novalidate">
				
				<div class="form-forgotpassword-success">
					<i class="entypo-check"></i>
					{{ trans('auth.forgotMessage') }}
				</div>
				
				<div class="form-steps">
					
					<div class="step current" id="step-1">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off">
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-login">
								{{ trans('auth.forgotComplete') }}
								<i class="entypo-right-open-mini"></i>
							</button>
						</div>
					
					</div>
					
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="/login" class="link">
					<i class="entypo-lock"></i>
				{{ trans('auth.returnToLogin') }}
				</a>

			</div>
			
		</div>
		
	</div>
  
</div>


<script src="/assets/js/neon-forgotpassword.js" id="script-resource-9"></script>
@stop