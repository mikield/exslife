<?php

class News extends \Eloquent {
	protected $fillable = ['text','title','state','status'];
	protected $primaryKey = 'newsID';


	public function Comments(){
		return $this->hasMany('Comments','postID');
	}

	public function Likes(){
		return $this->hasMany('Likes','postID');
	}
}