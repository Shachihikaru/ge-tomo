<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::get();
        return view("message/index",compact('messages'));
    }
    
}