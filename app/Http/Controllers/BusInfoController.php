<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Bus_seat;

class BusInfoController extends Controller
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
       $buses=Bus::all();
       return view('admin.bus.index',compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function createSeats(Request $request)
    {
        $bus_seat=Bus_seat::all();
        return view('admin.Seat.seatInformation',compact('bus_seat'));
    }
     public function dashboard()
    {
        return view('admin.dashboard');
    }
}
