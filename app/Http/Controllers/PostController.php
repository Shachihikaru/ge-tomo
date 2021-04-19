<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view("post/index",compact('posts'));
    }
    
    public function store(Request $request){
        $content = $request->content;
        $game_id = $request->game_id;
        $start_at = $request->start_at;
        $post = new Post();
        $post->content = $content;
        $post->game_id = $game_id;
        $post->start_at = $start_at;
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

    public function delete($id){
        $post = Post::where('id','=',$id)->first();
        $post->delete();

        return redirect('/post');    
    }
}