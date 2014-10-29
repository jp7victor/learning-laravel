<?php

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{

		$this->user = $user;

	}


	public function index()
	
	{

		$users = $this->user->all();

		return View::make('users.index', ['users' => $users]);

	}


	public function show ($username)

	{

		$user = $this->user->whereUsername($username)->first();

		return View::make('users.show', ['user' => $user]);

	}

	public function create ()
	
	{

		return View::make('users.create');
	
	}

	
	public function store ()
	
	{
		$input = Input::all();


		if ( ! $this->user->fill($input)->isValid())		
		
		{

			return Redirect::back()->withInput()->withErrors($this->user->errors);

		}
		

		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

	
		return Redirect::route('users.index');

	}

}
