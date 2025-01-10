@extends('template')
@section('content')

<script src="/js/tasks.js"></script>
<ul class="comments-list">
						@foreach($resultTasks as $task)
												<li id="task{{ $task->taskID }}">
							
							<div class="comment-details">
								<div class="comment-checkbox">
								<div class="checkbox checkbox-replace neon-cb-replacement">
                                @if($task->type == '1')
									<i class="entypo-user"></i>
                                @elseif($task->type == '2')
                                <i class="entypo-users"></i>
                                @elseif($task->type == '3')
                                <i class="entypo-heart"></i>
                                @elseif($task->type == '4')
                                <i class="entypo-retweet"></i>
                                @endif
								</div>
							</div>
								<div class="comment-head">
                                @if($task->type == '1')
									<a href="vk/friends">{{ trans('tasks.add') }}</a> {{ trans('tasks.toFriends') }} <a target="_blank" href="http://vk.com/id{{ $task->friendID }}">{{ $task->friendName }}</a>
                                @elseif($task->type == '2')
                                    <a href="vk/clubs">{{ trans('tasks.join') }}</a> {{ trans('tasks.in') }}  <a target="_blank" href="http://vk.com/club{{ $task->clubID }}">{{ $task->clubName }}</a>
                                @elseif($task->type == '3')
                                    <a href="vk/likes">{{ trans('tasks.postLike') }}</a> {{ trans('tasks.like').' '.trans('tasks.on') }}  <a target="_blank" href="http://vk.com/{{ $task->likeType }}{{ $task->likeUserID }}_{{ $task->likeObjectID }}">
                                        {{ trans('tasks.like'.$task->likeType) }}    
                                    </a>
                                @elseif($task->type == '4')
                                    <a href="vk/reposts">{{ trans('tasks.repost') }}</a> <a target="_blank" href="http://vk.com/{{ $task->repostType }}{{ $task->repostUserID }}_{{ $task->repostObjectID }}">{{ trans('tasks.repost'.$task->repostType) }}  </a>
                                @endif
                                    <div style="float: right;font-size: 15px;">
                                        <b>{{ $task->done }}</b> 
                                        из 
                                        <b>{{ $task->toDo }}</b>
                                    </div>
                                    <i class="fa fa-money" style="float: right;margin-right: 25%;font-size: 20px;">
                                     {{ $task->pay }}
                                    </i>
								</div>
								
								
								
								<div class="comment-footer">
									
									<div class="comment-time">
										{{date('d.m.y в h:m', strtotime($task->created_at)); }}
									</div>
									
									<div class="action-links">
										
										<a href="#" class="approve">
											<i class="entypo-check"></i>
											Выполнить
										</a>
										
										<a href="javascript:;" onclick="tasks.__hide('{{$task->taskID}}');" class="delete">
											<i class="entypo-cancel"></i>
											Скрыть
										</a>
										
										
										<a href="javascript:;" onclick="tasks.__reportShow('{{ $task->taskID }}');" class="edit">
											<i class="entypo-flag"></i>
											Пожаловаться
										</a>
										
									</div>
									
								</div>
								
							</div>
						</li>
						@endforeach
			
						
					</ul>
@if(Auth::user()->activeAccountID == 0)
<script>

        var data = {
            modalTitle:"Добавить аккаунт <b>ВКонтакте</b>",
            modalBody:"Мы заметили что у вы не выбрали аккаунт ВКонтакте для работы с заданиями. Выберите аккаунт, или добавте новый через форму ниже.",
            modalFooter:""
            };
        Modal('create','addAccount');
        Modal('fill','addAccount',data);
        $( document ).ready(function(){
            setTimeout(function(){ 
                Modal('show','addAccount');
            }, 1000);
        });
        
            
           
</script>
@endif
@stop