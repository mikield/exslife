@extends('template')
@section('content')
<style type="text/css">
	.tile-stats > h3 {
		font-size: 15px!important;
	}
</style>
 <script src="/assets/js/neon-custom.js" id="script-resource-9"></script>

<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?=$visitors?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>{{ trans('static.shema1Title') }}</h3>
			<p>{{ trans('static.shema1Text') }}</p>
		</div>
		
	</div>
<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>

			<div class="num" data-start="0" data-end="<?=$users?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			<h3>{{ trans('static.shema2Title') }}</h3>
			<p>{{ trans('static.shema2Text') }}</p>
		</div>
		
	</div>

<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-list"></i></div>
			<div class="num" data-start="0" data-end="<?=$tasks?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>{{ trans('static.shema3Title') }}</h3>
			<p>{{ trans('static.shema3Text') }}</p>
		</div>
		
	</div>

<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?=$newDayUsers?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>{{ trans('static.shema4Title') }}</h3>
			<p>{{ trans('static.shema4Text') }}</p>
		</div>
		
	</div>

<div class="col-sm-3">
	
	<div class="tile-stats tile-aqua">
		<div class="icon"><i class="entypo-users"></i></div>
		<div class="num" data-start="0" data-end="<?=$usersOnline?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
		<h3>{{ trans('static.shema5Title') }}</h3>
		<p>{{ trans('static.shema5Text') }}</p>
	</div>
		
</div>

<div class="col-sm-3">
	
	<div class="tile-stats tile-primary">
		<div class="icon"><i class="entypo-users"></i></div>
		<div class="num" data-start="0" data-end="<?=$guests?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
		<h3>{{ trans('static.shema6Title') }}</h3>
		<p>{{ trans('static.shema6Text') }}</p>
	</div>
		
</div>

<div class="col-sm-3">
	
	<div class="tile-stats tile-red">
		<div class="icon"><i class="entypo-users"></i></div>
		<div class="num" data-start="0" data-end="<?=$referals?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
		<h3>{{ trans('static.shema7Title') }}</h3>
		<p>{{ trans('static.shema7Text') }}</p>
	</div>
		
</div>
@stop

