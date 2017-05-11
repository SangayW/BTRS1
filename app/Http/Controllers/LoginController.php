<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        //dd($request->all());
        if(Auth::attempt([
            'email' =>$request->email,
            'password' => $request->password
            ])){
            $user = User::where('email',$request->email)->first();
            session(['user_id' => $user->id]);
             return  redirect()->route('user_login');
            // if($user->is_admin()==1){
            //     return redirect()->route('admin_dashboard');
            // }elseif($user->is_admin()==4){
            //     return redirect()->route('federationdash');
            // }
            // else{
            //     return  redirect()->route('home');
            // }
        }
        return redirect()->back();
    }
}
