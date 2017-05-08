<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'uname'=>'required|max:255|unique:users',
            'fname'=>'required',
            'lname'=>'required',
            'cid'=>'required|min:11|max:11',
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
        $user->password=$request->password;
        $user->save();
        //Session::flash('success','Journey has been created successfully');
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $user->uname=$request->uname;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->cid=$request->cid;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=$request->password;        
        $user->save();
        //Session::flash('success','Journey has been created successfully');
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
