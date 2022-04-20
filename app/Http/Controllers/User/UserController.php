<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   function create(Request $request){

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5|max:30',
        'resetpassword' => 'required|min:5|max:30|same:password',
    ]);

    $user = new User();
    $user->name = $request->name ; 
    $user->email = $request->email;
    $user->password = \Hash::make($request->password);

    $save = $user->save();

    if($save){
        return redirect()->back()->with('success','youre logged in succesfully');
    }else{
        return redirect()->back()->with('fail','youre not  logged in ');
    }
   }

   function check(request $request)
   {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ]);

        $cred = $request->only('email', 'password');
        if(auth::guard('web')->attempt($cred)){
            return redirect()->route('user.home')->with('sucess','yes youre logged in');
        }else{
            return redirect()->route('user.login')->with('fail','wrong credentials');
        }
   }

   function logout(){
       Auth::logout();
       return redirect('/');
   }
}
