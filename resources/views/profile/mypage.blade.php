@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">マイプロフィール</h5>
        <h6 class="card-subtitle mb-2 text-muted">自己紹介</h6>
        <p class="card-text">{{$profile->content}}</p>
        <p class="card-text">{{config('timezone')[$profile->timezone]}}</p>

        <a href="/profile/edit/{{$profile->id}}" class="card-link">編集</a>
        </div>
    </div>
</div>
<div class="text-right">
    <a href="/post" class="btn btn-primary">戻る</a>
</div>


@endsection