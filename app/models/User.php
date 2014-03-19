<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
	protected $primaryKey = 'user_id';
	protected $guarded = array('user_id');

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
	
	/**
	 * The validation rules for this model.
	 */
	public static function getValidatorRules()
	{
	    $rules = array('username'                   => 'required|max:100|unique:users',
	                   'email_address'              => 'required|email|max:255|unique:users|confirmed',
	                   'email_address_confirmation' => 'required|email|max:255|',
	                   'password'                   => 'required|min:5|max:100|confirmed',
	                   'password_confirmation'      => 'required|min:5|max:100',
	                   'birthday'                   => 'required|date',
	                   'gender'                     => 'required|in:male,female');
        return $rules;
	}

}