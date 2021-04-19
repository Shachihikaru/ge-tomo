@extends('layouts.app')

@section('content')
<div class="container">


    <h1>編集</h1>
    <form action="/post/update/{{$post->id}}">
        <div class="form-group">
            <label for="content">上書き</label>
            <textarea class="form-control" id="content" name="content" rows="3" >{{$post->content}}</textarea>
        </div>        
        
        <div class="form-group">
            <label for="game_id">遊ぶゲーム</label>
              <input type="number" id="game_id" name="game_id">
        </div>

         <div class="form-group">
            <label for="start_at">時間帯</label>
             <input type="datetime-local"  id="start_at" name="start_at">  
        <input class="btn btn-primary" type="submit" value='送信'>
    </form>

</div>
@endsection