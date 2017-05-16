@extends('layouts.app')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="#{{-- url('/home/reservation') --}}">Confirmation</a></li>  
        </ul>      
    </div>
    <div id="main-content">
    <div class='col-xs-offset-2 clearfix'>
      @if(Session::has('success'))
        <div class="alert alert-success col-xs-5">
          {{ Session::get('success') }}
        </div>
      @endif
      
    </div>
    <div class='col-xs-offset-2 col-xs-5 clearfix'>
        <span><i>Thank you for using our system!</i></span>
    </div>
    <br>
    <div class='col-xs-offset-2 col-xs-5'>
        <span><b>Note:</b>Please Logout to exit OR to do another reservation!!!</span>
    </div>
  </div>
</div>
@endsection