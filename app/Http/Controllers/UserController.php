<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;
use App\Schedule;
use Session;
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
       $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
       return view('users.home',compact('bus'));
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
    public function reserve()
    {
       echo "jfdkfd";
    }
}
