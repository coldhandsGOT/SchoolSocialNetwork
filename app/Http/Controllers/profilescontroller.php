<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\User;


class profilescontroller extends Controller
{
   public function index($slug) //lien dynamique selon profile/nom-prenom
   {
    $user= User::where('slug',$slug)->first();
   	return view('profiles.profile')
   	->with('user',$user);
   }

   public function edit()	//edition des informations du user
   {
   	return view('profiles.edit')->with('information', Auth::user()->profile);

   }

   public function update(request $r)
   {
   	

   	$this->validate($r, [
   		'location' => 'max:255',
   		'bio' => 'max:255',
   		'phone' => 'max:255',
   		]);
   	Auth::user()->profile()->update([

   		'location'=> $r->location,
   		'bio'=>$r->bio,
   		'phone'=>$r->phone,
   		]);
   	if($r->hasFile('avatar'))
   	{
   		Auth::user()->update([
   				'avatar' => $r-> avatar->store('public/avatars'),
   			]);
   	}



   	Session::flash('success', 'profile mis à jour');
   	return redirect()->back();
   }



}
