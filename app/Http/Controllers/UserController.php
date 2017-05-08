<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;
use App\Schedule;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.home');
    }
   public function journey(){   
        $journeys=Journey::all();
        return view('users.journey',compact('journeys')); 
        //return view('journey');
    }
    public function bus(){
        $buses=Bus::all();
        return view('users.bus',compact('buses'));        
    }
    public function schedule(){
        $schedules=Schedule::all();
        return view('users.schedule',compact('schedules'));
    }
}
