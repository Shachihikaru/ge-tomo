<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::get();
        
        return view("profile/index",compact('profiles'));
    }
    
    public function store(Request $request){
        $content = $request->content;
        $game_id = $request->timezone;
        $user_id = Auth::id();
        $profile = new Profile();
        $profile->content = $content;
        $profile->game_id = $timezone;
        $profile->user_id = $user_id;
        // dd($content);

        $post->save();
        
        return redirect('/post');
    }   
    
    public function edit($id){
        $post = Post::where('id','=',$id)->first();
        return view("post/edit",compact('post'));
    }
    
    public function update(Request $request,$id){
        $post = Post::where('id','=',$id)->first();
        $post->content = $request ->content;
        $post->game_id = $request ->game_id;
        $post->start_at = $request ->start_at;
        $post->save();
        return redirect('/post');
    }
}