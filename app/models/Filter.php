<?php

class Filter extends \Eloquent {
    protected $table = 'taskFilter';
	protected $fillable = ['userID','taskID','hidden'];
    
    public function user(){
        return $this->belongsTo('Account','userID');
    }
}