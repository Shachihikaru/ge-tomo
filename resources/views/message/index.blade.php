@extends('layouts.app')

@section('content')
<div class="container">

    <h1>メッセージ</h1>  
    
    @foreach($messages as $message)
    <div class="card" >
        <div class="card-body">
            @if ($message->sender_id == Auth::id())
            <h4 class="text-right">{{$message->content}}</h4>
            @else
            <h4>{{$message->content}}</h4>
            @endif
        </div>
    </div>
    @endforeach


    <form action="/message/send/{{$user_id}}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>    
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value='送信する'>
        </div> 

    </form>
    {{-- <div class="alert alert-light" role="alert">{{$message->content}}</div>
    <div class="alert alert-dark" role="alert">{{$message->content}}</div> --}}
</div>

    
@endsection