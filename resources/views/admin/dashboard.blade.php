@extends('layouts.adminLayout')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">            
            <li role="presentation"><a href="{{route('admin_dashboard1')}}">Dashboard</a></li>            
             <li role="presentation"><a href="{{route('admin.bus.index')}}">Bus Information</a></li>            
            <li role="presentation"><a href="{{route('admin.journey.index')}}">Journey Information</a></li>
             <li role="presentation"><a href="{{route('admin.schedule.index')}}">Bus Schedule</a></li>             
            {{--  <li role="presentation"><a href="{{route('admin.user.index')}}">Registered Users</a></li> --}}
             <li role="presentation"><a href="#">Reservation</a></li>
             <li role="presentation"><a href="{{route('seat_information')}}">Seat Information</a></li>
        </ul>        
    </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3></h3>
              <p>Country</p>
            </div>
            <div class="icon">
              <i class="ion-ios-barcode"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3></h3>
              <p>Dzongkhag</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3></h3>
              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3></h3>
              <p>Gewog</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      </div><!-- /.row -->

</div>
@endsection
