<?php

class Fortuna extends \Eloquent {
    protected $table = 'fortunaInfo';
	protected $fillable = ['userID','winnerNumber','winnerCount'];
    
    public function user(){
        return $this->belongsTo('User','userID');
    }
    
}