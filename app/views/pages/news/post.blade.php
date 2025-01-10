@extends('template')
@section('content')
<div class="profile-env">
	
	<section class="profile-feed">
		
		<div class="profile-stories">
			
			<article class="story">
				
				<aside class="user-thumb">
					<a href="#">
						<img src="https://pp.vk.me/c616828/v616828256/12f28/BYg8COzRMpQ.jpg" width="50" height="50" alt="" class="img-circle">
					</a>
				</aside>
				
				<div class="story-content">
					
					<!-- story header -->
					<header>
						
						<div class="publisher">
							<a href="http://vk.com/codemax_tm">CodeMax</a> {{ $post->title }}
							<em>{{date('d.m.y', strtotime($post->created_at)); }} {{ trans('static.in')}}{{date('H:i', strtotime($post->created_at)); }}</em>
						</div>
					
						<div class="story-type">
							<i class="entypo-rocket"></i>
						</div>
						
					</header>
					
					<div class="story-main-content">
						<p>{{ $post->text }}</p>
					</div>
					
					<!-- story like and comment link -->
					<footer>
						<a id='like' onclick="news.like('{{ $post->newsID }}');" href="javascript:;"
						@if(Likes::isLiked($post->newsID) == 'is')
						 class="liked"
						 @endif>
							<i class="entypo-heart"></i>
							{{ trans('static.like')}} <span id='likes'>({{ $likes }})</span>
						</a>
						
						<a onclick="news.commentBegin();" href="javascript:;">
							<i class="entypo-comment"></i>
							{{ trans('static.comment')}} <span>({{ $comments }})</span>
						</a>
						
						<!-- story comments -->
						@if($comments > 0)
						<ul class="comments">
						@foreach($post->comments as $comment)
							<li>

								<div class="user-comment-thumb">
									<img src="{{ $comment->user->ava }}" alt="" class="img-circle" width="30">
								</div>
								
								<div class="user-comment-content">
								@if($comment->userID == Auth::user()->id)
								<div onclick="news.commentDelete('{{ $comment->id }}','{{ $post->newsID }}');" class="story-type" style="float: right;cursor:pointer;">
									<i class="entypo-cancel"></i>
								</div>
								@endif
									<a href="/id{{ $comment->user->id }}" class="user-comment-name">
										{{ $comment->user->firstName }}
									</a>
                                    <br />
									
									{{ $comment->comment }} 
                                   	
									<div class="user-comment-meta">
										
										<a href="#" class="comment-date">{{date('d.m.y', strtotime($comment->created_at)); }} {{ trans('static.in')}}{{date('H:i', strtotime($comment->created_at)); }}</a>
										 - 
                                         <a href="javascript:;" onclick="news.likeComment('{{ $comment->id }}','{{ $post->newsID }}');" @if(Likes::IsCommentLiked($comment->id) == 'is')
						 class="liked"
						 @endif>
											<i class="entypo-heart"></i>
											{{ trans('static.like')}} <span>
                                            @if(Likes::countLikes($comment->id) != 'no')
                                             ({{Likes::countLikes($comment->id)}}) 
                                            @else 
                                                (0)
                                            @endif</span>
										</a>
                                        -
                                        <a href="javascript:;" onclick="news.answerTo('{{ $comment->userID }}');">
											<i class="entypo-comment"></i>
											{{ trans('static.reply') }}
										</a>
									</div>
									
								</div>
							</li>
						@endforeach
						</ul>
						@endif
						<ul class="comments" style="border:0px;">
						<li class="comment-form">
								<div class="user-comment-thumb">
									<img src="{{ Auth::user()->ava }}" alt="" class="img-circle" width="30">
								</div>
								
								<div class="user-comment-content">
									{{ Form::token(); }}
									<textarea onkeypress="javascript:if(13==event.keyCode){news.commentSend('{{ $post->newsID }}');}" class="form-control autogrow" placeholder="{{ trans('static.beginToComment')}} " style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 46px;"></textarea>
									<button onclick="news.commentSend('{{ $post->newsID }}');" class="btn"><i class="entypo-chat"></i></button>
									
								</div>
							</li>
							</ul>
						
						
							
					</footer>
					
					<!-- separator -->
					<hr>
					
				</div>
				
			</article>			
			
		</div>
		
	</section>
</div>
{{ HTML::script('/js/news.js')}}
@stop