<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;
use App\Schedule;
use App\SeatInformation;
use Session;

class BusController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('auth:admin');
 //    }
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
            'schedule_id'=>'required',
            'journey_id'=>'required',
            ]);

        $bus = new Bus;
        $bus->Bus_no=$request->bno;
        $bus->Bus_name=$request->bname;
        $bus->No_of_seat=$request->seatno;
        $bus->Driver_name=$request->dname;
        $bus->Driver_phone=$request->driverphone;
        $bus->schedule_id=$request->schedule_id;
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
    public function search(Request $request)
    {
        $schedule_id=array();
        $source=$request->journey_id1;
        $destination=$request->journey_id2;
        $date=$request->date;
        $schedules=Schedule::where('Date',$date)->pluck('id');
        $schedule=explode(',',$schedules);
        foreach($schedule as $schedules_id)
        {
            $schedule_id[]=trim($schedules_id,'[]');
        }
        $journey=Journey::where('source',$source)->where('destination',$destination)->get();
        $buses=Bus::join('journeys','buses.journey_id','journeys.id')
            ->select('buses.*')
            ->where('journeys.source','=',$source)
            ->where('journeys.destination','=',$destination)
            ->whereIn('schedule_id',$schedule_id)
            ->get();
       //return view('admin.bus.index',compact('buses'));
       $journeys=Journey::all();
        return view('users.search',compact('buses'));
    }

    public function retrieveSeats(Request $request)
    {
         if($request->ajax()){
            $seat=SeatInformation::all();
            return response()->json($seat);
        }
    }


    public function seatInfo(Request $request)
    {
       $count=0;
       if(!empty($request->val1))
        {
            $seat=SeatInformation::where('seatNo',$request->val1)->first();
            $seat->status=1;
            $seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
        }
       if(!empty($request->val2))
       {
            $seat=SeatInformation::where('seatNo',$request->val2)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val3))
       {
            $seat=SeatInformation::where('seatNo',$request->val3)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val4))
       {
            $seat=SeatInformation::where('seatNo',$request->val4)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val5))
       {
            $seat=SeatInformation::where('seatNo',$request->val5)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val6))
       {
            $seat=SeatInformation::where('seatNo',$request->val6)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val7))
       {
            $seat=SeatInformation::where('seatNo',$request->val7)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val8))
       {
            $seat=SeatInformation::where('seatNo',$request->val8)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val9))
       {
            $seat=SeatInformation::where('seatNo',$request->val9)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val10))
       {
            $seat=SeatInformation::where('seatNo',$request->val10)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val11))
       {
            $seat=SeatInformation::where('seatNo',$request->val11)->first();
            $seat->status=1;
            $seat->save();
           
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val12))
       {
            $seat=SeatInformation::where('seatNo',$request->val12)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val13))
       {
            $seat=SeatInformation::where('seatNo',$request->val13)->first();
            $seat->status=1;
            $seat->save();
           
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val14))
       {
            $seat=SeatInformation::where('seatNo',$request->val14)->first();
            $seat->status=1;
            $seat->save();
           
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val15))
       {
            $seat=SeatInformation::where('seatNo',$request->val15)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val16))
       {
            $seat=SeatInformation::where('seatNo',$request->val16)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val17))
       {
            $seat=SeatInformation::where('seatNo',$request->val17)->first();
            $seat->status=1;
            $seat->save();

            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val18))
       {
            $seat=SeatInformation::where('seatNo',$request->val18)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       if(!empty($request->val19))
       {
            $seat=SeatInformation::where('seatNo',$request->val19)->first();
            $seat->status=1;
            $seat->save();
            
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
            $count++;
       }
       else
       {
         Session::put('count',$count);
         return redirect()->route('user_login',Session::get('bus_no'));
       }
       Session::put('count',$count);
       return redirect()->route('user_login',Session::get('bus_no'));
    }
}
