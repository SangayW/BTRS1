<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;
use App\Schedule;
class PageController extends Controller
{
 	public function index(){
 		$journeys=Journey::all();
 		return view('welcome')->withJourneys($journeys);
 	} 	
 	public function journey(){ 	
 		$journeys=Journey::all();
        return view('journey',compact('journeys'));	
 		//return view('journey');
 	}
 	public function bus(){
 		$buses=Bus::all();
        return view('bus',compact('buses')); 		
 	}
 	public function schedule(){
 		$schedules=Schedule::all();
        return view('schedule',compact('schedules'));
 	}
}
