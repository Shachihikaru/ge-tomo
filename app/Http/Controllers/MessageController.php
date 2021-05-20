<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function message($user_id){
        $send_messages = Message::where('receiver_id','=',$user_id)
        ->where('sender_id','=' ,Auth::id())
        ->get();
        
        $receive_messages =Message::where('sender_id','=',$user_id)
        ->where('receiver_id','=' ,Auth::id())
        ->get();

        $messages = collect($send_messages)->merge($receive_messages);
        $messages = $messages->sortBy('id');
        
        return view("message/index",compact('user_id','messages'));
    }
    public function send(Request $request,$user_id){
        $content = $request->content;
        $send_id = Auth::id();
        $message = new Message();
        $message->content = $content;
        $message->sender_id = $send_id;
        $message->receiver_id = $user_id;
        $message->save();
        
        return redirect("/message/list/$user_id");
    }   

}