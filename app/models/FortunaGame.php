<?php

class FortunaGame extends \Eloquent {
    protected $table = 'fortunaGame';
	protected $fillable = ['userID'];
    
    public function user(){
        return $this->belongsTo('User','userID');
    }
    
}