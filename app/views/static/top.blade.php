@extends('template')
@section('content')
<div class="row">
	<div class="col-md-9 col-sm-7">
		<h2>{{ trans('static.top') }}</h2>
	</div>
	
</div>
{{--*/ $i = 1 /*--}}
@foreach ($users as $user)

	<div class="member-entry" style="
		@if($i == '1') {{ 'border: 2px solid #daa520;'}} 
		@elseif($i == '2') {{ 'border: 2px solid #959292;' }} 
		@elseif($i == '3') {{ 'border: 2px solid #c46e1a;' }}
		@else {{ 'border-color:#d7d7d7;' }}
		@endif" >
		
	<a href="/id{{ $user->id }}" class="member-img">
		<img src="{{ $user->ava }}" class="img-rounded">
		<i class="entypo-forward"></i>
	</a>
	
	<div class="member-details">
		<h4>
			<a href="/id{{ $user->id }}">{{ $user->firstName }} {{ $user->lastName }}</a>
		</h4>
		
				<div class="row info-list">
			
			<div class="col-sm-4">
				<i class="entypo-chart-bar"></i>
				 {{ trans('static.rate') }}: <b>{{ $user->rate }}</b>
			</div>
			
			<div class="col-sm-4">
				
			</div>
			
			<div class="col-sm-4">
				<i class="entypo-trophy"></i>
				<b>{{ $i }}</b> {{ trans('static.place')  }}
			</div>
			
			<div class="clear"></div>
			
			<div class="col-sm-4">
				<i class="entypo-location"></i>
				{{ trans('messages.lastLogin')}}: <b>
				@if(Online::isOnline($user->id) == 'is')
					{{ trans('static.online') }}
				@else
					{{date('d.m.y', strtotime($user->updated_at)); }}
				@endif
				</b>
			</div>
			
			<div class="col-sm-4">
				
			</div>
			
			<div class="col-sm-4">
				<i class="fa fa-gift"></i>
				<a href="#">@if($i == '1') 10 000 {{ Lang::choice('static.money', '10000') }} @endif
					@if($i == '2') 8 000 {{ Lang::choice('static.money', '8000') }} @endif
					@if($i == '3') 5 000 {{ Lang::choice('static.money', '5000') }} @endif
					@if($i == '4') 2 000 {{ Lang::choice('static.money', '2000') }} @endif
					@if($i == '5') 1 000 {{ Lang::choice('static.money', '1000') }} @endif
					@if($i > '5' and $i <= '50') 100 {{ Lang::choice('static.money', '100') }} @endif
					@if($i > '50' and $i <= '80') 50 {{ Lang::choice('static.money', '50') }} @endif
					@if($i > '80') 10 {{ Lang::choice('static.money', '10') }} @endif</a>
			</div>
			
		</div>
	</div>
	
</div>
{{--*/ $i++ /*--}}
@endforeach


@stop