@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ゲー友</h1>  
    <form action="/profile/search">
        <div class="input-group">
                    <select id="timezone" name="timezone" class="form-control">
                        @foreach (config('timezone') as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach                                
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">検索</button>
                    </span>
                </div>
            </form>
        <div class="alert alert-info" role="alert">
            <a href="/profile/mypage" class="alert-link">マイプロフィール</a>
          </div>

    <form action="/post/store">
        <div class="form-group">
            <h3><label for="post">募集</label></h3>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>    
        
        <div class="form-group"> 
            <h3><label for="game_id">遊ぶゲーム</label></h3>
            <select id="game_id" name="game_id" class="form-control">
                @foreach (config('game') as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        
         <div class="form-group">
            <h3><label for="start_at">時間</label></h3>
             <input type="datetime-local"  id="start_at" name="start_at">   
        </div> 
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value='投稿'>
        </div> 

    </form>
     @foreach($posts as $post)
        <div class="card" >
            <div class="card-body">
                <h2>{{$post->content}}</h2>
                <h5 class="card-title">募集ゲーム</h5>
                    <p>{{config('game')[$post->game_id]}}</p>
                    <h5 class="card-title">遊ぶ時間</h5>
                        <p>{{$post->start_at}}</p>
                        <p><a href="/profile/detail/{{$post->user_id}}" class="btn btn-primary">{{$post->name}}</a></p>
                    @if($post->user_id == $user_id)
                        <a href="/post/edit/{{$post->post_id}}" class="btn btn-success">編集</a>
                        <a href="/post/delete/{{$post->post_id}}" class="btn btn-danger">削除</a>
                    @endif
        </div>
    </div>
    @endforeach
</div>
@endsection