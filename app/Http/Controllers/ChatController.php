<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatEvent;
use Illuminate\Support\Facades\Auth;
use App\User;


class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('group_chat.index');
    }


    public function send(request $request) {
        $user = User::find(Auth::id());
        $this->saveToSession($request);
        event(new ChatEvent($request->message, $user));
    }

    public function saveToSession(request $request) {
        session()->put('chat',$request->chat);
    }

    public function getOldMessage() {
        return session('chat');
    }

}
