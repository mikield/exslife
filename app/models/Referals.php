<?php

class Referals extends \Eloquent {
	protected $table = 'referals';
	protected $primaryKey = 'inviterID';

	protected $fillable = ['inviterID','referalID'];


	public function User(){
		return	$this->hasMany('User','id','referalID');
	}
}