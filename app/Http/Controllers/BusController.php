<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;

class BusController extends Controller
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
    public function create()
    {
        $journeys = Journey::all();
        return view('admin.bus.create')->withjourney($journeys);
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
            'bno'=>'required',
            'bname'=>'required',
            'seatno'=>'required',
            'dname'=>'required',
            'driverphone'=>'required',
            'journey_id'=>'required',
            ]);

        $bus = new Bus;
        $bus->Bus_no=$request->bno;
        $bus->Bus_name=$request->bname;
        $bus->No_of_seat=$request->seatno;
        $bus->Driver_name=$request->dname;
        $bus->Driver_phone=$request->driverphone;
        $bus->journey_id=$request->journey_id;
        $bus->save();
        //Session::flash('success','Journey has been created successfully');
        return redirect()->route('admin.bus.index');
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
        $bus = Bus::findOrFail($id);
        return view('admin.bus.edit',compact('bus'));
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
        $bus = Bus::findOrFail($id);
        $bus->Bus_no=$request->bno;
        $bus->Bus_name=$request->bname;
        $bus->No_of_seat=$request->seatno;
        $bus->Driver_name=$request->dname;
        $bus->Driver_phone=$request->driverphone;
        $bus->save();
        //Session::flash('success','Journey has been created successfully');
        return redirect()->route('admin.bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bus = bus::findOrFail($id);
        $bus->delete();
        return redirect()->route('admin.bus.index');
    }
}
