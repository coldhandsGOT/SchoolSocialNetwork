<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
Use App\Repository\ConversationsRepository;
Use App\User;
use Illuminate\Auth\AuthManager;


class ConversationsController extends Controller
{
  private $r;
  private $auth;
  public function __construct(ConversationsRepository $conversationsRepository, AuthManager $auth)
  {
    $this->r = $conversationsRepository;
    $this->auth = $auth;
  }

  public function index()
  {
    $users = User::select('name','id')->where('id','!=',$this->auth->user()->id) ->get();
    return view('conversations/index',['users' => $this->r->getConversations($this->auth->user()->id),
                                      'unread' => $this->r->unreadCount($this->auth->user()->id)
                                          ]);
  }


  public function show (User $user )
  {
    $messages = $this->r->getMessageFor($this->auth->user()->id,$user->id)->paginate(4);
    $unread = $this->r->unreadCount($this->auth->user()->id);
    $users = User::select('name','id')->where('id','!=',$this->auth->user()->id) ->get();

    if (isset($unread[$user->id]))
    {
      $this->r->readAllFrom($user->id,$this->auth->user()->id);
      unset($unread[$user->id]);
    }
    return view('conversations/show',['users' => $this->r->getConversations($this->auth->user()->id),
                                      'user' => $user,
                                      'messages' => $messages,
                                      'unread' => $unread

                                                                                              ]);

  }

public function store(User $user, StoreMessageRequest $request){
$this->r->createMessage(
  $request->get('content'),
  $this->auth->user()->id,
  $user->id

);
return redirect(route('conversations.show',['id' => $user->id]));

}


    //
}
