<?php

class FortunaController extends \BaseController{
    
    public function display(){
     $fortunaInfo = Fortuna::orderBy('id', 'desc')->take(1)->get();
     $fortunaUserGame = FortunaGame::where('userID','=', Auth::user()->id)->get()->toArray();//DB::table('fortunaGame')->where('userID','=',Auth::user()->id)->get();
     $gameInfo = FortunaGame::all();
     generatePage(
			View::make('pages.fortuna.main')
				->with('fortunaInfo', $fortunaInfo)
                ->with('userGame', $fortunaUserGame)
                ->with('gameInfo', $gameInfo)
				->withTitle(trans('titles.fortuna')),
			trans('titles.fortuna')
			); 
    }
    
    
    
    public function join(){
        $userGame = DB::table('fortunaGame')->where('userID','=',Auth::user()->id)->get();
        $money = Auth::user()->balanse - 200;
        if($money < 0){
          Message('error','Нет денег');
          die();
        }
        if(empty($userGame)){
            // Забираем 200 монет
            $user = User::find(Auth::user()->id);
            $user->balanse = $user->balanse - 200;
            $user->save();
            // Выдаем билетик ;)
           DB::table('fortunaGame')->insert([
                'userID' => Auth::user()->id
            ]);
        Message('success','Успешно учатсвуем',['balanse'=>'200']);
        die();
        }else{
           Message('error','Уже участник');
           die();
        }   
    }
     
    
}