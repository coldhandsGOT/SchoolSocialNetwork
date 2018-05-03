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
  Route::post('/conversations/{user}', 'ConversationsController@store')
        //  ->middleware('can:talkTo,user')
        ;



});
