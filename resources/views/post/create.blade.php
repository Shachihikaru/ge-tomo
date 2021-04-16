@extends('layouts.app')

@section('content')
<div class="container">

    <h1></h1>
    <form action="/post/store">
        <div class="form-group">
            <label for="post">書き込み</label>
            <textarea class="form-control" id="post" name="post" rows="3"></textarea>
        </div>  

        </div>       
        <input class="btn btn-primary" type="submit" value='送信'>
    </form>

</div>
@endsection