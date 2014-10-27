<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/users', function()
{

	 // $user = new User;
	 // $user->username = 'Teste';
	 // $user->password = Hash::make('123');

	 // $user->save();

	 // User::create([
	 // 	'username' => 'Teste Create',
	 // 	'password' => Hash::make('123')
	 // 	]);

	$users = User::all();
	return View::make('users.index', ['users' => $users]);
});

Route::get('/users/{username}', function($username)
{


	$user = User::whereUsername($username)->first();
	return View::make('users.show', ['user' => $user]);
});