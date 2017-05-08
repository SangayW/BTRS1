@extends('layouts.app')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">            
            <li role="presentation"><a href="#">My Profile</a></li>           
             <li role="presentation"><a href="{{route('admin.bus.index')}}">Bus Information</a></li>            
            <li role="presentation"><a href="{{route('admin.journey.index')}}">Journey Information</a></li>
             <li role="presentation"><a href="{{route('admin.schedule.index')}}">Bus Schedule</a></li>             
             <li role="presentation"><a href="{{route('admin.user.index')}}">Registered Users</a></li>
             <li role="presentation"><a href="#">Reservation</a></li>
        </ul>        
    </div>
    <div id="main-content">
        
    </div>
</div>
@endsection
