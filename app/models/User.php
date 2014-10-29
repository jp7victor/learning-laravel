<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	public $timestamps = false;

	protected $fillable = ['username', 'password', 'email'];

	
	public static $rules = [
		
		'username' => 'required',
		'password' => 'required',
		'email' => 'required'

	];


	public static $errors;



	public  function isValid()

	{

		$validation = Validator::make($this->attributes, static::$rules);

		if ($validation->passes()) return true;

		
		$this->errors = $validation->messages();

		return false;

	}

	public function firstLetter()
	{
		return substr($this->username, 0, 1);
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	

	


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	
	

}
