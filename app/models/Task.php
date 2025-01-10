<?php

class Task extends \Eloquent {

  protected $table = 'tasks';
  protected $primaryKey = 'taskID';

	protected $fillable = [];

  public function User(){
   return $this->belongsTo('User','owner');
  }
  
  public function isdone(){
    return $this->hasMany('Filter','taskID');
  }
  
}