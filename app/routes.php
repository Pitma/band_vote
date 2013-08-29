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

Route::get('/',array('as' => 'home','uses'=>'HomeController@index' ));
Route::get('login', array('as' => 'login','uses'=>'UsersController@login'));
Route::get('users/sort/{order}',array('uses'=>'UsersController@index'));
Route::post('login', 'UsersController@login_try');
Route::get('logout', array('as' => 'logout','uses' => 'UsersController@logout'));

Route::post('user/edit_band/{id}', 'UsersController@edit_band');
Route::post('user/edit_media/{id}', 'UsersController@edit_media');
Route::post('user/edit_personal/{id}', 'UsersController@edit_personal');


Route::get('tickets/order', array('as' => 'tickets.order.get', 'uses' => 'TicketsController@getTicketOrder'));
Route::post('tickets/order', array('as' => 'tickets.order.post', 'uses' => 'TicketsController@postTicketOrder'));

Route::get('admin/check',array('as' => 'admin','before'=> 'auth', 'uses' => 'AdminsController@UserCheck'));
Route::get('admin/check',array('as' => 'check','uses' => 'AdminsController@UserCheck'));
Route::post('admin/aktivieren',array('as'=>'activate','uses' => 'AdminsController@UserActivate'));
Route::get('admin/votingdetails',array('as'=>'details','uses' => 'AdminsController@VotesDetails'));


Route::get('kontakt',array('as'=>'kontakt','uses' => 'UsersController@kontakt_show'));
Route::post('kontakt',array('as'=>'kontakt.post','uses' => 'UsersController@kontakt_post'));

Route::get('spielregeln',array('as'=>'spielregeln','uses' => 'UsersController@spielregeln'));
Route::get('agb',array('as'=>'agb','uses' => 'UsersController@agb'));

Route::get('impressum',function(){
	Notification::info('Das Impressum ist noch nicht online!');
	return Redirect::to('/');
});

Route::get('gallerie',array('as' => 'gallery', function()
{
	return Redirect::to('/');
}));

/*Passwort Routes*/
Route::get('password/remind', 'UsersController@forgot');
Route::post('password/remind', function()
{
    $credentials = array('email' => Input::get('email'));

	Password::remind($credentials, function($message, $user)
	{
	    $message->subject('Amalive.de Passwort vergessen');
	});
	Notification::success('Eine Erinnerungsmail wurde soeben an dich verschickt!');
	return Redirect::to('/');
});

Route::get('password/reset/{token}', function($token)
{
    return View::make('emails.auth.reset')->with('token', $token);
});

Route::post('password/reset/{token}',array('as' => 'password.reset', function()
{
    $credentials = array(
    		'email' => Input::get('email')
    					);

    $password = Input::get('password');

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        Notification::success('Dein Passwort wurde erfolgreich zurückgesetzt!');
        return Redirect::to('login');
    });
}));

/*------------------------	Email Example ---------------------


	$data['name'] = 'Patrick Mainka';

	//Mail::pretend();

	Mail::send('emails.welcome', $data, function($message)
	{
		$message->to('patrickmainka@gmail.com')->subject('Laravel Testmail!');
	});
	return 'yeah gesendet!';

--------------------------------------------------------------*/


Route::resource('dogs','DogsController');

Route::resource('guestbooks', 'GuestbooksController');

Route::resource('users', 'UsersController');

Route::resource('votes', 'VotesController');