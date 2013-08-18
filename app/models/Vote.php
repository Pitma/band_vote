<?php

class Vote extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public static $voteIsAllowed = true;

    public function users(){

    	return $this->belongsToMany('User');
    }

    public function voteisAllowed(){

    	return $this->$voteIsAllowed;
    }
}