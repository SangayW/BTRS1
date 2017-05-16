<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store_seat;
use App\Tbl_reservation;
use Session;

class ReservationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completeReservation(){
        return view('users.reserve_confirmation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seatNo=array();
        $reservation=new Tbl_reservation;
        $reservation->date=Session::get('date');
        $reservation->bus_no=Session::get('bus_no');
        $seat=Store_seat::all();
        foreach($seat as $seat)
        {
            $seatNo[]=$seat->seat_no;
        }
        $reservation->seat_no=implode(',',$seatNo);
        $reservation->booked_by=Session::get('user_id');
        $reservation->save();
        Session::flash('success', 'Your reservation has been made successfully');
        return redirect()->route('complete_reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPaymentPage()
    {
        return redirect()->route('payment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
