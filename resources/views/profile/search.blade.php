@extends('layouts.app')

@section('content')
<div class="text-center">
    @foreach($profiles as $profile)
    <div class="card">
        <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">ユーザーネーム</h6>
        <a href="/profile/detail/{{$profile->id}}" class="card-text">{{$profile->name}}</a>
    </div>
    @endforeach

</div>
<div class="text-right">
    <a href="/post" class="btn btn-primary">戻る</a>
</div>


@endsection