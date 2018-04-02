<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth; 
use App\User;
class UserController extends Controller
{
    public function profile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view ('profile')->with('user',$user);
    }
    public function update(Request $request){

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('psname');
        $user->email = $request->input('email');
        $user->phone_num = $request->input('mobnum');
        $user->telephone_num = $request->input('telnum');
        if($request->hasFile('profile_picture')){
            $profile = $request->file('profile_picture');
            Storage::put('public/profile/'.$profile->getClientOriginalName(), file_get_contents($profile));
            $user->profile_picture = $profile->getClientOriginalName();
        }
        $user->save();
        return redirect('/profile')->with('success','Profile Updated!');
    }


}
