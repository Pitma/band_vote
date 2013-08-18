<?php
use Illuminate\Auth\UserInterface;

class Admin extends Eloquent implements UserInterface {

	protected $table = 'admins';

	protected $guarded = array();

	public static $rules = array();

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
}