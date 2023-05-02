<?php

namespace App\Http\Controllers\admin;

use App\Events\MessagesSend;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    const perPage = 20;
    public function send(Request $request)
    {
        $user = Auth::user();
        $text = $request->get('message');
        $message = new Message();

        $message->user_id = $user->id;
        $message->message = $text;
        $message->save();

        event(new MessagesSend($text));

        return true;
    }

    public function index(Request $request){
        $page = $request->page??1;
        $msg = Message::with('user')->limit(self::perPage)->offset(($page-1)*self::perPage)->latest()->get();
        return response()->json($msg);
    }
}
