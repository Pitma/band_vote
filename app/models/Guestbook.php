<?php

class Guestbook extends Eloquent {
    protected $guarded = array();

    public static $rules = array(

    	'name' => 'required|min:3',
    	'email' => 'email',
    	'message' => 'required|min:5'


    	);
}