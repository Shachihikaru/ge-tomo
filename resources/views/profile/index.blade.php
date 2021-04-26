@extends('layouts.app')

@section('content')
<div class="container">
   
    <form action="/profile/store">
    <div class="form-group">
        <label for="post">プロフィール</label>
        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
    </div>    

    <div> 
        <label for="timezone">遊ぶ時間帯</label>
        <select id="timezone" name="timezone" class="form-control">
            @foreach (config('timezone') as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-primary" type="submit" value='送信'>

    {{-- <div class="card mt-4">
        <div class="card-body">
            {{$profile->content}}
            {{config('timezone')[$profile->timezone]}}
            <a href="/post/edit/{{$profile->profile_id}}" class="btn btn-success">編集</a>
            <a href="/post/delete/{{$profile->profile_id}}" class="btn btn-danger">削除</a>
        </div>
    </div> --}}

</div>
@endsection