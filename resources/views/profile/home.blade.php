@extends(`layout`)

@section('content')
 <div class="container">
   <div class="row">
     <div class="col col-md-offset-3 col-md-6">
       <nav class="panel panel-default">
         <div class="panel-heading">タスクを追加する</div>
         <div class="panel-body">
           @if($errors->any())
             <div class="alert alert-danger">
               @foreach($errors->all() as $message)
                 <p>{{ $message }}</p>
               @endforeach
             </div>
           @endif
           <form action="{{ route('profile.create', ['id' => $user_id]) }}" method="POST">
             @csrf<main>
                <div class="container">
                  <div class="edit_form">
                    <form action="{{ route('profile.edit', ['id' => $my_profile->user_id]) }}" method="post">
                    @csrf
                    <div class="form_group">
                      <label for="name">名前</label>
                      <input type="text" id="name" name="name" value="{{ old('name', $my_profile->name) }}" />
                    </div>
                    <div class="form_group">
                      <label for="user_name">ユーザーネーム</label>
                      <input type="text" id="user_id" name="user_id" value="{{ old('user_id',$my_profile->user_id)}}" />
                    </div>
                    <div class="form_group">
                      <label for="introduction">自己紹介</label>
                      <textarea name="introduction" id="introduction">
                          {{ old('introduction', $my_profile->introduction) }}
                      </textarea>
                    </div>
                    <div class="submit">
                      <button type="submit">送信</button>
                    </div>
                    </form>
                  </div>
                </div>
               </main>
               
             <div class="form_group">
               <label for="name">名前</label>
               <input type="text" id="name" name="name" value="{{ old('name') }}" />
             </div>
             <div class="form_group">
               <label for="user_name">ユーザーネーム</label>
               <input type="text" id="user_name" name="user_name" value="{{ old('user_name')}}" />
             </div>
             <div class="form_group">
               <label for="introduction">自己紹介</label>
               <textarea name="introduction" id="introduction">
                 {{ old('introduction') }}
               </textarea>
             </div>
             <div class="submit">
               <button type="submit">送信</button>
             </div>
           </form>
         </div>
       </nav>
     </div>
   </div>
 </div>
@endsection