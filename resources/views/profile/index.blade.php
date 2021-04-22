@extends('layouts.app')

@section('content')
<div class="container">

        
    <div class="form-group">
        <label for="post">プロフィール</label>
        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
    </div>    

    <div> 
        <label for="timezone">よく遊ぶ時間帯</label>
        <select id="timezone" name="timezone" class="form-control">
            @foreach (config('timezone') as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>

</div>
@endsection