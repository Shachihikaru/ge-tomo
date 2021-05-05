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
  </div>
  @endsection