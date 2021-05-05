@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>マイプロフィール</h1>  

    <div class="card-body">
        <h2>自己紹介</h2>
        <p>{{$profile->content}}</p>
        <h2>時間帯</h2>
        <p>{{config('timezone')[$profile->timezone]}}</p>
        <a href="/profile/edit/{{$profile->id}}" class="btn btn-success">編集</a>
    </div>
</div>
<a href="/post" class="btn btn-primary">戻る</a>



@endsection