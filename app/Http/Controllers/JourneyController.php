<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journey;

class JourneyController extends Controller
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
        $journeys=Journey::all();
        return view('admin.journey.index',compact('journeys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.journey.create');
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
            'title'=>'required',
            'src'=>'required',
            'dest'=>'required',
            'dist'=>'required',
            ]);

        $journey = new Journey;
        $journey->title=$request->title;
        $journey->source=$request->src;
        $journey->destination=$request->dest;
        $journey->distance=$request->dist;
        $journey->save();
        //Session::flash('success','Journey has been created successfully');
        return redirect()->route('admin.journey.index');
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
        $journey= Journey::findOrFail($id);
        return view('admin.journey.edit',compact('journey'));
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
        $journey = Journey::findOrFail($id);
        $journey->title=$request->title;
        $journey->source=$request->src;
        $journey->destination=$request->dest;
        $journey->distance=$request->dist;
        $journey->save();
        //Session::flash('success','journey has been updated successfuly');
        return redirect()->route('admin.journey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journey = Journey::findOrFail($id);
        $journey->delete();
        return redirect()->route('admin.journey.index');
    }
}
