<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function payment($id)
    {
        Session::put('price',$id);
        return view('users.payment');

    }
}
