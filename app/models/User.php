<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



	public function Tasks(){
		return $this->hasMany('Task','owner');
	}

	public function referals(){
		return $this->belongsToMany('Referals');
	}
    
    public function account(){
        return $this->belongsTo('Account','activeAccountID');
    }
    
    public function scopeGetUserID($query,$userID = ''){
        if(!empty($userID)){
            $user = User::find($userID);
        }else{
            $user = User::find(Auth::user()->id);
        }
        if(!empty($user->ownerID)){
            return (int) $user->ownerID;
        }else{
            return (int) $user->id;
        }
    }

	
}
