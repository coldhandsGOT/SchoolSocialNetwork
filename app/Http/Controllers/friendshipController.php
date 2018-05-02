<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class friendshipController extends Controller
{
    
     public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1)
        {
            return [ "status" => "friends" ];
        }
        
        if(Auth::user()->pendingRequestFrom($id))
        {
            return [ "status" => "pending" ];
        }

        if(Auth::user()->pendingRequestTo($id))
        {
            return [ "status" => "waiting" ];
        }

        return [ "status" => 0 ];
    }

}
