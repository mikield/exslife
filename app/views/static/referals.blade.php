@extends('template')
@section('content')
<script>
    function showMore(){
        var data = {modalTitle:"<?=trans('modals.refTitle')?>",modalBody:"<?=trans('modals.refText')?>"};
        Modal('create','refInfo');
        Modal('fill','refInfo',data);
        Modal('show','refInfo');
    }
</script>
<div style="float:right;">
<a href="javascript:;" onclick="showMore();"><span class="badge badge-secondary" style="position:absolute;margin-top: -10px;">?</span></a>
 <pre data-toggle="tooltip" data-placement="bottom" data-original-title="{{ trans('static.yourRefLink') }}" style="font-weight: bolder!important;font-size: 14px;width: 300px;float: right;height:40px;">
http://exslife.com/{{ Auth::user()->inviteCode }}
 </pre>
</div>

	


		<table class="table table-white table-vertical-center margin-none table-striped">
			
			<tbody>
			@if(!empty($referals))
				@foreach($referals as $ref)
          		{{--*/ $user = $ref->user[0]; /*--}}
				<tr>
					<td class="center"><img  style="width: 50px; height: 50px;" src="{{ $user->ava }}"></td>
					<td class="strong center">{{ $user->userFirstName.' '.$user->userLastName }}</td>
					<td class="center">
						<a href='http://vk.com/id{{ $user->vkID }}' target='_blank'>vk.com/id{{ $user->vkID }}</a>
					</td>
					<td class="center"><span class="strong text-large">ID {{ $user->id }}</span></td>
				</tr>
				@endforeach
			@else
			<p class="text-danger">{{ trans('static.notInvited')}}</p>
			@endif
			</tbody>
		</table>
@stop