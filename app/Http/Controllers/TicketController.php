<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Session;

class TicketController extends Controller
{
    public function reserve($id)
    {
       Session::put('bus_no',$id);
       return redirect('login');
    }
}

// class TicketController extends Controller
// {
//      public function reserve()
//     {
//        echo "jfdkfd";
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $tickets=Ticket::all();
//         return view('ticket.index',compact('tickets'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('ticket.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $this->validate($request,[
//             'sno'=>'required',
//             'source'=>'required',
//             'destination'=>'required',
//             'seatno'=>'required',
//             'price'=>'required',
//             'rtime'=>'required',
//             'dtime'=>'required',
//             'status'=>'required',
//             'bno'=>'required',
           
//             ]);

//         $ticket = new Ticket;
//         $ticket->Serial_no=$request->sno;
//         $ticket->Source=$request->source;
//         $ticket->Destination=$request->destination;
//         $ticket->Seat_no=$request->seatno;
//         $ticket->Price=$request->price;
//         $ticket->Reporting_time=$request->rtime;
//         $ticket->Departure_time=$request->dtime;
//         $ticket->Status=$request->status;
//         $ticket->Bus_no=$request->bno;
       
//         $ticket->save();
//         return redirect()->route('ticket.index');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $ticket = Ticket::findOrFail($id);
//         return view('ticket.edit',compact('ticket'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $ticket = Ticket::findOrFail($id);
//         $ticket->Serial_no=$request->sno;
//         $ticket->Source=$request->source;
//         $ticket->Destination=$request->destination;
//         $ticket->Seat_no=$request->seatno;
//         $ticket->Price=$request->price;
//         $ticket->Reporting_time=$request->rtime;
//         $ticket->Departure_time=$request->dtime;
//         $ticket->Status=$request->status;
//         $ticket->Bus_no=$request->bno;
       
//         $ticket->save();
//         //Session::flash('success','Journey has been created successfully');
//         return redirect()->route('ticket.index');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $ticket =Ticket::findOrFail($id);
//         $ticket->delete();
//         return redirect()->route('ticket.index');
//     }

// }
