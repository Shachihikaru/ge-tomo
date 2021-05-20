@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ゲー友</h1>  
    {{-- 検索フォーム --}}
    <form action="/profile/search">
            <div class="form_group">
                <label for="content">プロフィール検索内容</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>       
            <div class="form_group">     
                <label for="content">時間帯</label>        
                <select id="timezone" name="timezone" class="form-control">
                    @foreach (config('timezone') as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach                                
                </select>
            </div>
                <button type="submit" class="btn btn-primary">検索</button>
    </form>
        {{-- マイプロフィール --}}
        <div class="alert alert-info" role="alert">
            <a href="/profile/mypage" class="alert-link">マイプロフィール</a>
          </div>

    <div class="card bg-light mb-3">
        <form action="/post/store">
            <div class="form-group">
                <div class="card-header">
                    <h3><label for="post">募集</label></h3>
                </div>
                    <div class="card-body">
                        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                    </div>
            </div>    
            <div class="form-group"> 
                <div class="card-header">
                    <h3><label for="game_id">遊ぶゲーム</label></h3>
                </div>
                    <div class="card-body">
                        <select id="game_id" name="game_id" class="form-control">
                            @foreach (config('game') as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <div class="card-header">
                    <h3><label for="start_at">時間</label></h3></div>
                <div class="card-body">
                    <input type="datetime-local"  id="start_at" name="start_at">
                </div>
            </div> 

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value='投稿'>
            </div>
    </div> 
        </form>

        {{-- 投稿されたものの表示 --}}
     @foreach($posts as $post)
        <div class="card" >
            <div class="card-body">
                <div class="card-header">
                    <h2>{{$post->content}}</h2>
                </div>
                    <h5 class="card-title">募集ゲーム</h5>
                        <div class="content">
                        <p>{{config('game')[$post->game_id]}}</p>
                        </div>
                        <h5 class="card-title">遊ぶ時間</h5>
                            <div class="content">
                                <p>{{$post->start_at}}</p>
                            </div>    
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
