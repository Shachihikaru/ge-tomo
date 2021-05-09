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
        $user_id = Auth::id();

        return view("post/index",compact('posts','user_id'));
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
        $user_id = Auth::id();
        if($post->user_id != $user_id){
            return redirect('/post');
        }
        return view("post/edit",compact('post'));
    }
    
    public function update(Request $request,$post_id){
        $post = Post::where('id','=',$post_id)->first();
        $user_id = Auth::id();
        if($post->user_id != $user_id){
            return redirect('/post');
        }
        $post->content = $request ->content;
        $post->game_id = $request ->game_id;
        $post->start_at = $request ->start_at;
        $post->save();
        
        return redirect('/post');
    }

    public function delete($post_id){
        $post = Post::where('id','=',$post_id)->first();
        $user_id = Auth::id();
        if($post->user_id != $user_id){
            return redirect('/post');
        }
        $post->delete();

        return redirect('/post');    
    }
    
    function search(Request $request) {
        // ユーザーが選択した、game_idを取得
        $game_id = $request->game_id;
        // postsテーブルのcontentカラムの中から、game_idが部分一致するものを取得
        $posts = Post::select('posts.id as post_id', 'posts.user_id', 'users.name', 'posts.content', 'posts.game_id', 'posts.start_at')
        ->join('users','posts.user_id','=','users.id')
        ->where('game_id', '=', $game_id)
        ->get();        
        $user_id = Auth::id();
        return view('post/index',compact('posts','user_id'));
    }
}