<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {
	
	 protected $guarded = array();

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static $rules = array(

    	'name' => 'required|min:3|unique:users',
    	'email' => 'required|email|unique:users',
    	'description' => 'required|min:10',
		'password' => 'required|min:5',
		'genre' => 'required|min:2',
		'origin' => 'required|min:2',
		'firstname' => 'required',
		'lastname' => 'required',
		'address' => 'required',
		'city' => 'required',
        'telefon' => 'required',
        'agb' => 'accepted',
        'picture' => 'image|max:2000',	
		'music' => 'audio|max:8000',
		'youtube' => 'url',
		//'recaptcha_response_field' => 'required|recaptcha',
		'captcha' => 'required|captcha',
		'password_edit' => 'min:5',
	
    	);

	static function get_bands_inactive(){

		$bands = DB::table('users')
					->where('admin', '0')
					->where('aktivkz','0')
					->get();

		return $bands;  
	}

	static function get_bands_active(){

		$bands = DB::table('users')
					->where('admin', '0')
					->where('aktivkz','1')
					->get();

		return $bands;  
	}

	static function bandsByVote($order = 'desc'){
		$bands = DB::table('users')
			->leftJoin('votes', 'users.id','=','votes.user_id')
			->select(DB::raw('count(votes.user_id) as vote_count,users.id as id, users.name as name, users.genre as genre ,users.origin as origin,users.admin'))
			->where('users.admin','=','0')
			->where('users.aktivkz','=','1')
			->orderBy('vote_count',$order)
			->groupBy('users.id')
			->paginate(30);

		return $bands;
	}

	public function votes(){

		return $this->hasMany('Vote');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}