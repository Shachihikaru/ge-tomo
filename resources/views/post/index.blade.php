@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ゲー友</h1>    
    <a href="post/profile">プロフィール</a>
    <form action="/post/store">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="post">募集</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>    
        
        <div> 
            <label for="game_id">遊ぶゲーム</label>
            <select id="game_id" name="game_id" class="form-control">
                @foreach (config('game') as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        
         <div class="form-group">
            <label for="start_at">時間帯</label>
             <input type="datetime-local"  id="start_at" name="start_at">   
        </div> 

        <input class="btn btn-primary" type="submit" value='投稿'>
    </form>

     @foreach($posts as $post)
    <div class="card mt-4">
        <div class="card-body">
            {{$post->content}}
            {{config('game')[$post->game_id]}}
            {{$post->start_at}}
            {{$post->name}}
            <a href="/post/edit/{{$post->id}}" class="btn btn-success">編集</a>
            <a href="/post/delete/{{$post->id}}" class="btn btn-danger">削除</a>
        </div>
    </div>
    @endforeach
</div>
@endsection