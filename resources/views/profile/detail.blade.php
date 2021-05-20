@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>プロフィール</h1>  

    <div class="card-body">
        <h5 class="card-title">{{$profile->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">自己紹介</h6>
        <p class="card-text">{{$profile->content}}</p>
        <p class="card-text">{{config('timezone')[$profile->timezone]}}</p>
    </div>
    <a href="/message/list/{{$profile->user_id}}">メッセージを送る</a>
</div>
<a href="/post" class="btn btn-primary">戻る</a>



@endsection