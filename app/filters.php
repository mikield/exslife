<?php

// События перед загрузкой и после загрузки страницы
// Проверка посещения должна быть в собитии после, потому что мы должны убедится что пользователь загрузил страницу полностью.
App::before(function($request)
{
	//Локализация сайта
	$lang = Session::get('lang');
	if(empty($lang)){
		$userLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		if(!empty($userLanguage)){
			App::setLocale($userLanguage);
			Session::put('lang', $userLanguage);
		}else{
			Session::put('lang','ru');
			App::setLocale('ru');
		}
	}else{
		App::setLocale(Session::get('lang'));
	}
	
});


App::after(function($request, $response)
{	
	// Уникальные посетители
	//Проверяем или пользователь уже заходил сегодня
	$vInfo = DB::table('visitors')->where('ip', '=', Request::getClientIp())->where('created_at', '>', Carbon::today())->where('created_at', '<', Carbon::tomorrow())->get();
	if(empty($vInfo)){
	 	DB::table('visitors')->insert(array(
	 		'ip' => Request::getClientIp(),
	 		'created_at' => Carbon::now(),
	 		));
	 }

	 // Обновляем базу с онлайном
     Online::updateCurrent();

});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/news');
});


Route::filter('invited', function()
{
  // Is this user invited?
	if(Cookie::get('invitedByAdmin') != TRUE){
		return View::make('landing')->withTitle('');
	}
});

Route::filter('hasAccounts', function()
{
	if(!empty($_COOKIE['loggedAccounts'])){
		$accountsIDs = $_COOKIE['loggedAccounts'];
		$accountsIDs = explode(',', $accountsIDs);
		$users = User::find($accountsIDs);
		return View::make('pages.accounts')->withTitle(trans('titles.loginAccounts'))->withUsers($users);
	}
});


/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
