<?php


Route::get('/', function () {
    return view('layouts.guest');
});




Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function(){

	Route::get('/profile/{slug}',[
		'uses' => 'profilescontroller@index',
		'as' => 'profile',
		]);

	//edition du profile pour la personne auth sur son profile
	Route::get('/profile/edit/profile',[
		'uses' => 'profilescontroller@edit',
		'as' => 'profile.edit',

		]);

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

	

});



