@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>プロフィール</h1>  

    <div class="card-body">
        {{$profile->name}}
        {{$profile->content}}
        {{config('timezone')[$profile->timezone]}}

    </div>
</div>
<a href="/post" class="btn btn-primary">戻る</a>



@endsection