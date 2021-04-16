@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ゲー友</h1>    
    <form action="/post/store">
        <div class="form-group">
            <label for="post">書き込み</label>
            <textarea class="form-control" id="post" name="post" rows="4"></textarea>
        </div>     

        <div class="form-group">
            <label for="game_id">主に遊ぶゲーム</label>
        <input type="text" class="form-control"　id="game_id" name="game_id">   
        </div>

        <div class="form-group">
            <label for="start_at">時間帯</label>
        <input type="time" class="form-control"　id="start_at" name="start_at">   
        </div>

        <input class="btn btn-primary" type="submit" value='送信'>
    </form>

     @foreach($posts as $post)
    <div class="card mt-4">
        <div class="card-body">
            {{$post->content}}
            {{$post->game_id}}
            {{$post->start_at}}
            <a href="/post/edit/{{$post->id}}" class="btn btn-success">編集</a>
            <a href="/post/delete/{{$post->id}}" class="btn btn-danger">削除</a>
        </div>
    </div>
    @endforeach
</div>
@endsection