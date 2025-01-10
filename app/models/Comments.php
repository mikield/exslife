<?php

class Comments extends \Eloquent {
	protected $table = 'newsComments';
	protected $fillable = ['postID','userID','comment'];

	public function user(){
		return $this->belongsTo('User','userID');
	}
    
    public function likes(){
        return $this->hasOne('Likes','commentID');
    }
}