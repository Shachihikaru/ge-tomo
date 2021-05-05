<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::select('profiles.id as profile_id', 'users.id', 'users.name', 'profiles.content', 'profiles.timezone')->join('users','profiles.user_id','=','users.id')->get();
        
        return view("profile/index",compact('profiles'));
    }
    
    public function store(Request $request){
        $content = $request->content;
        $timezone = $request->timezone;
        $user_id = Auth::id();
        $profile = new Profile();
        $profile->content = $content;
        $profile->timezone = $timezone;
        $profile->user_id = $user_id;
        // dd($content);
        $profile->save();
        
        return redirect('/profile/mypage');
    }   
    
    public function mypage(){
        $profile = Profile::where('user_id','=',Auth::id())->first();
        if($profile == null){
            $user_id = Auth::id();
            $profile = new Profile();
            $profile->content = "";
            $profile->timezone = 1;
            $profile->user_id = $user_id;
        
            $profile->save();
        }
        return view("profile/mypage",compact('profile'));
    }

    public function edit($id){
        $profile = Profile::where('id','=',$id)->first();
        return view("profile/edit",compact('profile'));
    }
    
    public function update(Request $request,$id){
        $profile = Profile::where('id','=',$id)->first();
        $profile->content = $request ->content;
        $profile->timezone = $request ->timezone;
        $profile->save();
        return redirect('/profile/mypage');
    }
    
    public function delete($profile_id){
        $profile = Profile::where('id','=',$profile_id)->first();
        $profile->delete();

        return redirect('/profile/mypage');    
    }
    public function detail($id){
        $profile = Profile::where('user_id','=',$id)->first();
        if($profile == null){
            $user_id = $id;
            $profile = new Profile();
            $profile->content = "";
            $profile->timezone = 1;
            $profile->user_id = $user_id;
        
            $profile->save();
        }
        return view("profile/detail",compact('profile'));
    }
}