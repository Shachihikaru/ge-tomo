
@extends('layouts.app')

@section('content')
<div class="container">


    <h1>編集</h1>
    <form action="/profile/update/{{$profile->id}}">
        <div class="form-group">
            <label for="content">上書き</label>
            <textarea class="form-control" id="content" name="content" rows="3" >{{$profile->content}}</textarea>
        </div>        
        
        <div class="form-group">
            <label for="timezone">遊ぶ時間帯</label>
              <select id="timezone" name="timezone" class="form-control">
                @foreach (config('timezone') as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <input class="btn btn-primary" type="submit" value='送信'>
    </form>

</div>
@endsection