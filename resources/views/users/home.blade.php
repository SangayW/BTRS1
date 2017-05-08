@extends('layouts.app')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">
           <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="#">My Profile</a></li>
            <li role="presentation"><a href="{{ url('/home/schedule') }}">Schedule</a></li>
            <li role="presentation"><a href="{{ url('/home/journey') }}">Journey Information</a></li>
            <li role="presentation"><a href="{{ url('/home/bus') }}">Bus Information</a></li>
            <li role="presentation"><a href="{{ url('/home/reservation') }}">Reservation</a></li>  
        </ul>       
    </div>
    <div id="main-content"></div>
</div>
@endsection
