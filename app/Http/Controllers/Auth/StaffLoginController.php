<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class StaffLoginController extends Controller
{
    
	public function __countruct(){
		$this->middleware('guest:staff');
	}
    public function showLoginForm(){
    	return view('auth.staff-login');
    }
    public function login(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required',
    		]);
    	 if(Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('staff');
        }
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
