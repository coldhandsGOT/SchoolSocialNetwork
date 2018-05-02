<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Conversations extends Controller
{

  public function index()
  {
    $users = User::select('name','id')->where('id','!=',Auth::user()->id) ->get();
    return view('conversations/index',compact('users')):
  }


  public function show (int $id )
  {

  }
    //
}
