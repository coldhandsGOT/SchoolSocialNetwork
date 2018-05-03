<?php

Route::post('/{slug}/save/information', 'profilescontroller@update');

	Route::post('/{slug}/save/information', [
		'uses'=>'profilescontroller@update',
		'as' => 'profile.update',
		]);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/check_relationship_status/{id}', function ($id) {
    return \App\User::find($id);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//renvoi le user sur sa  page de réglages
	Route::get('/settings', function() {

		 return view('settings');
		});


//route groupe for authenticated users
Route::group(['middleware' => 'auth'], function()
{

	Route::get('/profile/{slug}',[
		'uses' => 'profilescontroller@index',
		'as' => 'profile',
		]);

	//edition du profile pour la personne auth sur son profile
	Route::get('/profile/edit/profile',[
		'uses' => 'profilescontroller@edit',
		'as' => 'profile.edit',

		]);

//edition du profile pour la personne auth sur son profile
	Route::get('/settings', function() {

		 return view('settings');
		});






	//submit information
	Route::post('/profile/update/profile',[
		'uses' => 'profilescontroller@update',
		'as' => 'profile.update',

		]);


//edition du profile pour la personne auth sur son profile
	Route::get('/profile/edit/profile',[
		'uses' => 'profilescontroller@edit',
		'as' => 'profile.edit',

		]);


Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
	//  ->middleware('can:talkTo,user')
		->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store');
		//  ->middleware('can:talkTo,user')

});

