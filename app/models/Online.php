<?php

use Illuminate\Database\Eloquent\Model;


class Online extends Model {


    public $table = 'sessions';

 
    public $timestamps = false;

 
    public function scopeGuests($query)
    {
        return $query->whereNull('user_id')->where('last_activity', '>', strtotime(Carbon::now()) - 60);
    }


    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')->with('user')->where('last_activity', '>', strtotime(Carbon::now()) - 60);
    }


    public function scopeUpdateCurrent($query)
    {
      
        $userArray = Auth::user();
        return $query->where('id', Session::getId())->update(array(
            'user_id' => !empty($userArray) ? Auth::user()->id : null
        )); 
    }

    public function scopeIsOnline($query, $userID = ''){
            if(empty($userID)){ 
                $userID = Auth::user()->id;
            }
            $user = $query->where('user_id', $userID)->where('last_activity', '>', strtotime(Carbon::now()) - 60)->get()->toArray();
            return !empty($user) ? 'is' : 'no';
    }

    public function user()
    {
        return $this->belongsTo('User'); 
    }

}