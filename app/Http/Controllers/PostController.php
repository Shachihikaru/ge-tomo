<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::select('posts.id as post_id', 'posts.user_id', 'users.name', 'posts.content', 'posts.game_id', 'posts.start_at')
        ->join('users','posts.user_id','=','users.id')
        ->get();
        return view("post/index",compact('posts'));
    }
    
    public function store(Request $request){
        $content = $request->content;
        $game_id = $request->game_id;
        $start_at = $request->start_at;
        $user_id = Auth::id();
        $post = new Post();
        $post->content = $content;
        $post->game_id = $game_id;
        $post->start_at = $start_at;
        $post->user_id = $user_id;

        $post->save();
        
        return redirect('/post');
    }   
    
    public function edit($post_id){
        $post = Post::where('id','=',$post_id)->first();
        return view("post/edit",compact('post'));
    }
    
    public function update(Request $request,$post_id){
        $post = Post::where('id','=',$post_id)->first();
        $post->content = $request ->content;
        $post->game_id = $request ->game_id;
        $post->start_at = $request ->start_at;
        $post->save();
        return redirect('/post');
    }

    public function delete($post_id){
        $post = Post::where('id','=',$post_id)->first();
        $post->delete();

        return redirect('/post');    
    }
}