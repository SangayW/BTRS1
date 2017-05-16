<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Journey;
use App\Schedule;
use App\SeatInformation;
use Session;
use App\Bus_seat;
use App\Store_seat;
use App\Passenger_detail;

class BusController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('auth:admin');
 //    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $buses=Bus::all();
    //     return view('admin.bus.index',compact('buses'));
    // }
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
        Session::put('source',$source);
        $destination=$request->journey_id2;
        Session::put('destination',$destination);
        $date=$request->date;
        Session::put('date',$date);
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
            $id=$request->id;
            $seat=Bus::join('bus_seats','buses.id','bus_seats.bus_id')
            ->select('bus_seats.*')
            ->where('buses.Bus_no','=',$id)
            ->get();
            //$seat=SeatInformation::all();
            return response()->json($seat);
        }
    }


    public function seatInfo(Request $request)
    {
       if(!empty($request->val1))
        {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val1;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val1)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
        }
       if(!empty($request->val2))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val2;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val2)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();
           
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val3))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val3;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val3)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val4))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val4;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val4)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val5))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val5;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val5)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val6))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val6;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val6)
            ->where('bus_id',$bus->id)
            ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val7))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val7;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val7)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val8))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val8;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val8)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val9))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val9;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val9)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val10))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val10;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val10)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val11))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val11;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val11)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val12))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val12;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val12)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();

            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val13))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val13;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val13)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
           
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val14))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val14;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val14)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
           
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val15))
       {
             $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val15;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val15)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val16))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val16;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val16)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val17))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val17;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val17)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();

           
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val18))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val18;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val18)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
           
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       if(!empty($request->val19))
       {
            $store_seat=new Store_seat;
            $store_seat->seat_no=$request->val19;
            $store_seat->save();
            $bus=Bus::where('Bus_no',Session::get('bus_no'))->first();
            $bus->No_of_seat=$bus->No_of_seat-1;
            $seat=Bus_seat::where('seat_id',$request->val19)
             ->where('bus_id',$bus->id)
             ->first();
            $seat->status=1;
            $seat->save();
            
            if($bus->No_of_seat==0)
            {
                $bus->status=1;
            }
            $bus->save();
       }
       return redirect()->route('user_login',Session::get('bus_no'));
    }
    public function storeBusSeats(Request $request)
    {
       $bus_seat=new Bus_seat;
       $bus_seat->bus_id=$request->bus;
       $bus_seat->seat_id=$request->seat;
       $bus_seat->save();
       Session::flash('success', 'Seat information has been created successfully');
       return redirect()->route('seat_information');
    }

    public function getSeatNumber(Request $request)
    {
        if($request->ajax()){
            $id=$request->id;
            Session::put('total_fare',$id);
            return response()->json($id);
        }    
    }

    public function storePassengerDetails(Request $request)
    {
        $passenger=new Passenger_detail;
        $passenger->title=$request->title;
        $passenger->full_name=$request->full_name;
        $passenger->cid=$request->cid;
        $passenger->gender=$request->gender;
        $passenger->seat_no=$request->hidden_seat1;
        $passenger->bus_no=Session::get('bus_no');
        $passenger->save();
       // return redirect()->route('payment');
        return redirect()->back()->with('error_code', 5);
    }

    public function getBusSeat(Request $request)
    {
        if($request->ajax()){
            $bus_seat1=array();
            $id=$request->id;
            $bus_seat=Bus_seat::where('bus_id','=',$id)->pluck('seat_id');
            $b_seat=explode(',',$bus_seat);
            foreach($b_seat as $seat)
            {
                $bus_seat1[]=trim($seat,'[]');
            }
            $seat=SeatInformation::select('seat_informations.*')
            ->whereNotIn('seat_informations.seatNo',$bus_seat1)
            ->get();
            return response()->json($seat);
        }
    }
}
