<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\User;


class profilescontroller extends Controller
{
   public function index($slug) //lien dynamique selon profile/prenom-nom
   {
    $user= User::where('slug',$slug)->first();
   	return view('profiles.profile')
   	->with('user',$user);
   }

   public function edit()	//affichage des infos existantes dans la page edit
   {
   	return view('profiles.edit')->with('information', Auth::user()->profile);
   }

   public function update(request $r)//edition des informations du user
   {
   	$this->validate($r, [
   		'location' => 'max:255',
   		'about' => 'max:255',
   		'phone' => 'max:20',
   		]);
   	Auth::user()->profile()->update([

   		'location'=> $r->location,
   		'about'=>$r->about,
   		'phone'=>$r->phone,
   		]);

   	if($r->hasFile('profile_pic'))
   	{
   		Auth::user()->update([
   				'profile_pic' => $r->profile_pic->store('public/profile_pic'),
   			]);
   	}



   	Session::flash('success', 'profile mis à jour');
   	return redirect()->back();
   }


}
