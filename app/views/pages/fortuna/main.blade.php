@extends('template')
@section('content')


    <script type="text/javascript">
function join(){
$.post("/fortuna/join", { ajax : true},
    function(data){
      if(data.theme == 'success'){
        rateAndMoneyGet(data.more.balanse);
      }
     	go('', event, '', '', '/fortuna');
        showNotify(data,false);
    }, "json");
}
</script>

<div class="row">
	<div class="span12 text-center">
				<h1>{{ trans('fortuna.checkYourFortuna') }}</h1>
				<h3>{{ trans('fortuna.slogan') }}</h3>
			</div>
	<div class="col-md-6">


	
		<div class="span8">
				<div class="row">
					<div class="span8 text-center"><h2>{{ trans('fortuna.lastWinNumber') }}</h2></div>
					<div class="span8 text-center" style="margin: 0px auto;width: 150px;">
						<h1>
							<div class="winNum">
								{{ $fortunaInfo[0]->winnerNumber }}
							</div>
						</h1>
					</div>
					<div class="span8 text-center">{{ trans('fortuna.winner') }} <b> {{ $fortunaInfo[0]->user->userFirstName }}</b> {{ trans('fortuna.won') }} <b>{{ $fortunaInfo[0]->winnerCount}} {{ trans_choice('static.money', $fortunaInfo[0]->winnerCount) }}</b></div>

					<div class="span8 text-center">
					<h2>{{ trans('fortuna.game') }}</h2>
					</div>
					<div class="span8 text-center">
						<h3>{{ trans('fortuna.todayMoney') }} <b>
                        <?php 
                            $win = count($gameInfo)*50; 
                            if($win < 300): $win = 300; endif;
                        ?> {{ $win }} {{ trans_choice('static.money', $fortunaInfo[0]->winnerCount) }}</b></h3>
					</div>
<div class="span8 text-center">
	<h3>{{ trans('fortuna.users') }}:</h3>		
</div>
<div class="span8 text-center">
 {{ trans('fortuna.allUsers') }}: <b><?=count($gameInfo)?></b>
 <div class="clear"></div>
 <?php if(!empty($userGame)){ ?>
 <div class="span8 text-center">
 	<h2>{{ trans('fortuna.yourNumber') }} <b>{{ $userGame[0]['id'] }}</b></h2>
 </div>
 <? }else{ ?>
 <div class="span8 text-center">
 	<button type="button" style="margin-top: 40px;"  onclick='join();' class="btn btn-green btn-icon icon-left">
						{{ trans('fortuna.joinGame') }}
						<i class="entypo-check"></i>
					</button>
 </div>
 <? } ?>
 
</div>
</div>
</div>
		
	</div>
	

	<div class="col-md-6">
		<div class="span4">
	<h2>{{ trans('fortuna.howItWorks') }}</h2>
{{ trans('fortuna.howItWorksText') }}
</div>
		
		
	</div>

</div>





@stop