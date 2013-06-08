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

Route::get('/', function()
{

	$data['name'] = 'Patrick Mainka';

	//Mail::pretend();

	Mail::send('emails.welcome', $data, function($message)
	{
		$message->to('patrickmainka@gmail.com')->subject('Laravel Testmail!');
	});
	return 'yeah gesendet!';
	//return View::make('hello');
});

Route::resource('dogs','DogsController');

Route::resource('guestbooks', 'GuestbooksController');


