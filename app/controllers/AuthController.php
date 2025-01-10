<?php

class AuthController extends \BaseController{

  
  public function login(){
    //Получаем данные с формы
    $email = Input::get('email');
    $pass = Input::get('pass');
    //Пытаемся авторизоваться в системе.
      if (Auth::attempt(['email' => $email, 'password'=> $pass])){
        if(Auth::user()->activated){
            //Добавляем аккаунт с которого авторизовались
            if(!empty($_COOKIE['reservedAccounts'])){
              $accountIDs = $_COOKIE['reservedAccounts'];
              $accountIDs = explode(',', $accountIDs);
                if(in_array(Auth::user()->id, $accountIDs)){
                  setcookie('loggedAccounts', $_COOKIE['reservedAccounts']);
                }else{
                  setcookie('loggedAccounts', $_COOKIE['reservedAccounts'].','.Auth::user()->id);
                }
            }else{
              setcookie('loggedAccounts', Auth::user()->id);
            }
            Message('success');
        }else{
            Auth::logout();
            Message('error',trans('messages.ActivateError')); 
        }
      }else{
         Message('error',trans('messages.AuthError'));
      }
  }
  
  
  
  public function showSignup(){
    generatePage(
			View::make('pages.signup')->withTitle(trans('titles.signup')),
			trans('titles.signup')
		);
  }
  
  // Функция регистрации 
  // @return JSON ARRAY
  // Последнее редактирование: 19.08.2014
  // Последний изменивший: Владислав Гайсюк
  public function signup(){
        $validator = Validator::make([
        'fName' => Input::get("fName"),
        'lName' => Input::get("lName"),
        'phone' => Input::get("phone"),
        'email' => Input::get("email"),
        'password' => Input::get("password"),
        'password_confirmation' => Input::get("passwordConfirm"),
        ],[
        'fName' => 'required|min:3',
        'lName' => 'required|min:3',
        'phone' => 'min:14|max:15',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
        ]);
    
        if ($validator->fails()){
            Message('error','',['errors'=>$validator->getMessageBag()->toArray()]);
        }else{
            $n = rand(1,3);
            $activateCode = str_random(20);
            User::create([
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'inviteCode' => str_random(10),
            'confirmCode' => $activateCode,
            'ava' => 'http://exslife.com/uploads/men'.$n.'.png',
            'firstName' => Input::get('fName'),
            'lastName' => Input::get('lName'),
            'phone' => Input::get('phone'),
            ]);
            //Функция реферала
          $refID = Session::get('invitor');
          if($refID != 0 && !empty($refID)){
            $userID = DB::getPdo()->lastInsertId();
            Referals::create([
            'referalID' => $userID,
            'inviterID' => $refID,
            'activated' => '0',
            ]);
            
          }
            
            Mail::send('emails.activation', ['code'=>$activateCode], function($message){
                $message->to(Input::get('email'), Input::get('fName').' '.Input::get('lName'));
            });
            Message('success');
        }
  }
  
  public function activate($code){
    
   $getCode = User::where('confirmCode','=',$code)->get();
    if(!empty($getCode[0])){
        $getCode[0]->activated = true;
        $getCode[0]->save();
        $status = 'ok';
    }else{
        $status = 'bad';
    }
    generatePage(
			View::make('pages.activate')->withTitle(trans('titles.activate'))->withStatus($status),
			trans('titles.activate')
		);
  }


    public function logout(){
   	    Auth::logout();
	  	Online::updateCurrent();
	  	return Redirect::to('/');
    }
    
    public function accountDissmiss(){
        setcookie('reservedAccounts', $_COOKIE['loggedAccounts']);
		$foreverCookie = Cookie::forget('loggedAccounts');
		return Redirect::to('/login')->withCookie($foreverCookie);	
    }





  //Обновление информации профиля
  private function __updateInfo($uM,$userVkInfo){
    if($uM != 'create'){
      Account::where('accountID', '=', $userVkInfo->userID)->update(array(
        'accessToken' => $userVkInfo->access_token,
        'ava' => $userVkInfo->photo_100,
        'userFirstName' => $userVkInfo->first_name,
        'userLastName' => $userVkInfo->last_name,
      ));
    }else{

    }
  }

  //Проверка информации профиля в соответствии с правилами.
  private function __checkData($userVkInfo){

  }


}