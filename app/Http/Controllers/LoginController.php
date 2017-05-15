<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class LoginController extends Controller
{
    public function login(Request $request){
        //dd($request->all());
        if(Auth::attempt([
            'email' =>$request->email,
            'password' => $request->password
            ])){
            $user = User::where('email',$request->email)->first();
            Session(['user_id' => $user->id]);
             return  redirect()->route('user_login');
        }
        return redirect()->back();
    }
    public function register(Request $request)
    {
        $this->validate($request,[
            'uname'=>'required|max:255|unique:users',
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required|min:8|max:13',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6',
            ]);
        $user = new User;
        $user->uname=$request->uname;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->cid=$request->cid;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }
}

