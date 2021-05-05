@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ゲー友</h1>    
    <p><a href="profile/mypage">マイプロフィール</a>

    <form action="/post/store">
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
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h2>{{$post->content}}</h2>
                <h5 class="card-title">募集ゲーム</h5>
                    <p>{{config('game')[$post->game_id]}}</p>
                    <h5 class="card-title">遊ぶ時間</h5>
                        <p>{{$post->start_at}}</p>
                
                        <h5 class="card-title">ユーザープロフィール</h5>
                     <p><a href="/profile/detail/{{$post->user_id}}" class="btn btn-primary">{{$post->name}}</a></p>
           
                    <a href="/post/edit/{{$post->post_id}}" class="btn btn-success">編集</a>
                    <a href="/post/delete/{{$post->post_id}}" class="btn btn-danger">削除</a>
        </div>
    </div>
    @endforeach
</div>
@endsection