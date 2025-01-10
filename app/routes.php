<?php

    

Route::get('/test', function(){
	echo Hash::make('qwerty');
});


// ??????? ??????????? 
Route::get('/adminInvite', function(){
	$foreverCookie = Cookie::forever('invitedByAdmin', TRUE);
	return Redirect::to('/')->withCookie($foreverCookie);
});

Route::get('/adminInviteForget', function(){
	$foreverCookie = Cookie::forget('invitedByAdmin');
	return Redirect::to('/')->withCookie($foreverCookie);
});


// ?????? ?? ????? ????? ?? ?????
// ?????????? ??????? ?????? ?????? ????????????
Route::get('/lang/{lang}', function($lang){
	if(!empty($lang)){
		Session::put('lang',$lang);
		App::setLocale($lang);	
		return Redirect::back();
	}else{
		Redirect::back();
		App::setLocale('ru');
		return Redirect::back();
	}
});


// Cupons Routers
Route::get('coupones','CouponesController@showAll');
Route::get('coupones/getValue','CouponesController@getValue');
Route::get('coupones/activate','CouponesController@showActivate');
Route::post('coupones/activate','CouponesController@activate');
Route::post('coupones/delete','CouponesController@delete');


//Profile Routers
Route::get('id{id}', function($id){
    $userInfo = User::find($id);
    if(!empty($userInfo)){
        generatePage(
			View::make('pages.profile.main')->withTitle($userInfo->firstName.' '.$userInfo->lastName)->withUser($userInfo),
			$userInfo->firstName.' '.$userInfo->lastName
		);
    }
});

	// ??????? ???????
	Route::post('/login','AuthController@login')->before('guest');


	Route::post('/newsLike',function(){
		if(Likes::isLiked(Input::get('postID')) == 'is'){
			Likes::where('userID', '=', Auth::user()->id)->where('postID','=',Input::get('postID'))->delete();
			return Message('success');
		}else{
			Likes::create([
				'userID' => Auth::user()->id,
				'postID' => Input::get('postID'),
				]);
			return Message('success');
		}
	})->before('auth');
    
    Route::post('/newsLikeComment',function(){
		if(Likes::isCommentLiked(Input::get('commentID')) == 'is'){
			Likes::where('userID', '=', Auth::user()->id)->where('commentID','=',Input::get('commentID'))->delete();
			return Message('success');
		}else{
			Likes::create([
				'userID' => Auth::user()->id,
				'commentID' => Input::get('commentID'),
				]);
			return Message('success');
		}
	})->before('auth');

	Route::post('/newsCommentCreate',function(){
		$message = strip_tags(Input::get('message'));
		if(!empty($message)){
		  
          //??????? ???????
          if(str_contains($message, '*')){
            $users = explode('*',$message);
            unset($users[0]); // Fix
            foreach($users as $user){
                $userID = explode(' ',$user)[0];
                $userInfo = User::find($userID);
                $message = str_replace("*".$userInfo->id." (".$userInfo->firstName."),", '<a href="/id'.$userInfo->id.'">'.$userInfo->firstName.'</a>, ', $message);
            }
            
        }
          
		Comments::create([
			'postID' => Input::get('postID'),
			'userID' => Auth::user()->id,
			'comment' => $message,
			]);
		return Message('success', trans('static.successCreateComment'));
		}
	})->before('auth|csrf');

	Route::post('/newsCommentDelete',function(){
		$commentInfo = Comments::find(Input::get('commentID'));
		if(!empty($commentInfo)){
			if($commentInfo->userID == Auth::user()->id){
				Comments::where('id', '=', Input::get('commentID'))->delete();
				return Message('success', trans('static.successDeleteComment'));
			}
		}	
	})->before('auth');
    
    Route::post('comments/answerTo', function(){
         $userID = Input::get('userID');
         $userInfo = User::find($userID);
         if(!empty($userInfo)){
            return json_encode(array('msg' => '*'.$userInfo->id.' ('.$userInfo->firstName.'), '));
         }
    });





	// ??????? ?????????????? ???????
	Route::get('/login', function(){
		generatePage(
			View::make('pages.login')->withTitle(trans('titles.login')),
			trans('titles.login')
		);
	})->before('guest|hasAccounts');
    
    Route::get('/forgot', function(){
        generatePage(
			View::make('pages.forgot')->withTitle(trans('titles.login')),
			trans('titles.login')
		);
    })->before('guest');

	Route::get('/loginForget','AuthController@accountDissmiss')->before('guest');// Clear remembered accounts
	Route::get('/logout','AuthController@logout')->before('auth');// Do logout
    Route::get('/signup', 'AuthController@showSignup')->before('guest');// Show Page
    Route::post('/signup', 'AuthController@signup')->before('guest');// Do signup
    Route::get('/activate/{code}', 'AuthController@activate')->before('guest');// Do activate
    
    
    

	Route::get('/about', function(){
		generatePage(
			View::make('pages.about')->withTitle(trans('titles.about')),
			trans('titles.about')
		);
	});

	Route::get('/terms', function(){
		generatePage(
			View::make('pages.terms')->withTitle(trans('titles.terms')),
			trans('titles.terms')
		);
	});

	Route::get('/top', function(){
		generatePage(
			View::make('static.top')->withTitle(trans('titles.top'))->withUsers(User::orderBy('rate', 'desc')->where('activated','=',true)->take(100)->get()),
			trans('titles.top')
		);
	})->before('auth');




	Route::get('/referals', function(){
		$referals = Referals::find(Auth::user()->id);
		if(!empty($referals)){
			$referals = $referals->all();
		}else{
			$referals = [];
		}
		generatePage(
			View::make('static.referals')->withTitle(trans('titles.referals'))->withReferals($referals),
			trans('titles.referals')
		);
	})->before('auth');




	Route::get('/statistic', function(){
		// ??????? ?????????? ??????????
		$visitors = count(DB::table('visitors')->where('created_at', '>', Carbon::today())->where('created_at', '<', Carbon::tomorrow())->get());
		// ??? ???????????? ???????
		$users = count(User::all());
		// ????? ???????????? ???????
		$newDayUsers = count(User::where('created_at', '>', Carbon::today())->where('created_at','<', Carbon::tomorrow())->get());
		// ???????? ???????
		$tasks = Task::all();
		// ????????????? ??????
		$usersOnline = Online::registered()->count();
		// ?????? ??????
		$guestsOnline = Online::guests()->count();
		// ????? ????????????
		$referals = count(DB::table('referals')->where('created_at', '>', Carbon::today())->where('created_at', '<', Carbon::tomorrow())->get());
		generatePage(
			View::make('static.statistic')->withTitle(trans('titles.statistic'))
				->withVisitors($visitors)
				->withUsers($users)
				->with('newDayUsers', $newDayUsers)
				->withTasks($tasks)
				->with('usersOnline',$usersOnline)
				->withReferals($referals)
				->withGuests($guestsOnline),
			trans('titles.statistic')
		);
	})->before('auth');

    //Fortuna Routers
    Route::get('fortuna', 'FortunaController@display')->before('auth');
    Route::post('fortuna/join', 'FortunaController@join')->before('auth');
    
    //Bonus Routers
    Route::get('/bonus', function(){

        $dayBonus =  DB::table('dayBonus')->where('userID','=',Auth::user()->id)->get(); 
        generatePage(
			View::make('pages.bonus.main')->withTitle(trans('titles.bonus'))->with('isDayBonus',$dayBonus),
			trans('titles.bonus')
		);
    })->before('auth');
    
    // Bonus Routers
    /* Vk Public exslife ad
    Route::get('/bonus/share/vk',function(){
    	$message = urlencode('??????? ??????????? ? ?????????? ?????, ??????? ???????? ?? ????. 
								????????, ???????? ? ??????? ? ????? ?????.');
            
            
            $links = ['http://exslifeblog1.blogspot.com/','http://exblogtored.blogspot.com/','http://exslifeblog2.blogspot.com/'];
             foreach($links as $link){
                $checkLink = VkRequest('utils.checkLink','url='.$link);
                if($checkLink->response->status == 'not_banned'){
                    $userPhoto = VkRequest('photos.copy','owner_id=36438256&photo_id=315192026&access_token='.Auth::user()->accessToken);
                    $photoID = $userPhoto->response;
                    $userWallPost = VkRequest('wall.post','message='.$message.'&attachments=photo'.Auth::user()->vkID.'_'.$photoID.','.$link.'&access_token='.Auth::user()->accessToken);
                    $postID = $userWallPost->response->post_id;
                    break;
                }else{
                	Message('error','????????? ?????? ???????, ???????? ?? ???? ??????????.');
                }
              }
                if(isset($postID)){
                	Message('success','??????? ???????????? ??????. ?????????? ?? ?????????.');
                }else{
                	Message('error','????????? ?????? ? ???????? ?????????.');
            	}
    });
    */

    Route::get('/bonus/get', function(){
        $dayBonus =  DB::table('dayBonus')->where('userID','=',Auth::user()->id)->get();
        if(empty($dayBonus)){
            $money = rand(1,50);
                DB::table('dayBonus')->insert([
                'userID' => Auth::user()->id,
                ]);
                $user = User::find(Auth::user()->id);
                $user->balanse = $user->balanse + $money;
                $user->save();
                Message('success','?? ??????? ???????? ????? ? ??????? <b>'.$money.'</b>'.trans_choice('static.money', $money),['balanse'=>$money]);
        }else{
        	Message('error','?? ??? ???????? ??????? ?????.');
        }
 
    })->before('auth');
    

    // VkTasks Routers
	Route::group(array('prefix' => 'vk'), function()
	{
	    Route::get('/', 'VkTasksController@all')->before('auth');
	    Route::get('likes','VkTasksController@likes')->before('auth');
	    Route::get('clubs','VkTasksController@clubs')->before('auth');
        

	});
	//Hide a task
    Route::post('task/hide','TasksController@hide')->before('auth');
    
    //Report Task
    //Modal
    Route::post('task/showReportModal','TasksController@showReportModal')->before('auth');
    Route::post('task/report','TasksController@report')->before('auth');



	Route::get('news', function(){
		generatePage(
			View::make('pages.news.news')->withNews(News::orderBy('created_at','desc')->get())->withTitle(trans('titles.news')),
			trans('titles.news')
			);
	})->before('auth');

	Route::get('news/{id}', function($id){
		$post = News::find($id);
		$comments = $post->comments->count();
		$likes = $post->likes->count();
		generatePage(
			View::make('pages.news.post')
				->withPost($post)
				->withTitle($post->title)
				->withComments($comments)
				->withLikes($likes),
			$post->title
			);
	})->before('auth');


	//??????? ???????? ?????? ???? ??? ??-?? ?????????????? ???????
	// ???? generatePage  ?????? ??? ?? ??????? ?? ????? ??????? ????? ajax
	Route::get('/{someData?}', function($someData = ''){
		//???????? ?? ????????
		if(!empty($someData)){
			$invitor = DB::table('users')->where('inviteCode','=',$someData)->get();
			if(!empty($invitor)){
				Session::put('invitor', $invitor[0]->id);
			}
		}
	  return View::make('index')->withTitle(trans('titles.index'));
	})->before('guest');
