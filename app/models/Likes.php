<?php

class Likes extends \Eloquent {
	protected $table = 'newsLikes';
	protected $fillable = ['userID','postID','commentID'];

	public function user(){
		return $this->belongsTo('User','userID');
	}
    
    public function comment(){
        return $this->belongsTo('Comments','commentID');
    }


	public function scopeIsLiked($query,$postID, $userID = ''){
		 if(empty($userID)){ 
                $userID = Auth::user()->id;
            }
            $user = $query->where('userID', $userID)->where('postID',$postID)->get()->toArray();
            return !empty($user) ? 'is' : 'no'; 
	}
    
    public function scopeIsCommentLiked($query,$commentID, $userID = ''){
		 if(empty($userID)){ 
                $userID = Auth::user()->id;
            }
            $user = $query->where('userID', $userID)->where('commentID',$commentID)->get()->toArray();

            return !empty($user) ? 'is' : 'no'; 
	}
    
    public function scopeCountLikes($query, $commentID){
            $user = $query->where('commentID',$commentID)->get()->toArray();
          return !empty($user) ? count($user) : 'no';
                
    }
    
}