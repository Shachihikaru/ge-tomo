@extends('layouts.app')

@section('content')
@foreach($profiles as $profile)
<div class="text-center">
    <h1>マイプロフィール</h1>  

    <div class="card-body">
        {{$profile->content}}
        {{config('timezone')[$profile->timezone]}}
        <a href="/profile/edit/{{$profile->profile_id}}" class="btn btn-success">編集</a>
    </div>
</div>
@endforeach

@endsection