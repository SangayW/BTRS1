@extends('layouts.adminLayout')
@section('content')
<div id="parent">
    <div id="sidebar">
        <ul class="nav nav-pills nav-stacked">            
            <li role="presentation"><a href="{{route('admin_dashboard1')}}">Dashboard</a></li>            
             <li role="presentation"><a href="{{route('admin.bus.index')}}">Bus Information</a></li>            
            <li role="presentation"><a href="{{route('admin.journey.index')}}">Journey Information</a></li>
             <li role="presentation"><a href="{{route('admin.schedule.index')}}">Bus Schedule</a></li>             
             {{-- <li role="presentation"><a href="{{route('admin.user.index')}}">Registered Users</a></li> --}}
             <li role="presentation"><a href="#">Reservation</a></li>
             <li role="presentation"><a href="{{route('seat_information')}}">Seat Information</a></li>
        </ul>           
    </div>
    <div id="main-content">
        <div class="row">
            <div class="col-sm-11" style="margin-top:-50px">
                <h2 style='text-align:center'>Seat Details</h2>
            </div>
        </div> 
        <div class='col-xs-11'>
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#addnew">Add</a><br><br>
        </div>
         <div class='row'>
        <div class="col-sm-11" style='margin-top:20px; margin-left:30px;'>
         @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
         @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped table-responsive" id="table1">
        <thead>
            <th>Sl.No</th>
            <th>Bus Name</th>
            <th>Bus Number</th>
            <th>Seat No</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php $id=1?>
          @foreach($bus_seat as $seat)
          <tr>
            <td>{{$id++}}</td>
            <td>{{$seat->bus->Bus_name}}</td>
            <td>{{$seat->bus->Bus_no}}</td>
            <td>{{$seat->seat->seatNo}}</td>
            <td>
                <form class="form-group" action="#" method='post'>
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!--a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">Edit</a-->
                        <a href="#" class="btn btn-primary" >Edit</a>
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data')" name='name' value='Delete'>
                    </form>
            </td> 
          </tr>
          @endforeach
        </tbody>
        </table>
       </div>
    </div>

    </div>
</div>
<div id="addnew" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Seats</h4>
      </div>
      <div class="modal-body">
      <form action="{{route('store_bus_seat')}}" method="post">
        <div class='form-group'>
          {{csrf_field()}}
        </div>
        <div class='form-group'>
          <label for='bus' class='col-xs-2'>Bus</label>
            <div class='col-xs-10 input-group'>
              <select class='form-control' name='bus'>
                <option disabled selected>Select Bus</option>
                <?php 
                  $bus=App\Bus::all();
                  foreach($bus as $buses):
                ?>
                <option value="{{$buses->id}}">{{$buses->Bus_name}}</option>
                <?php 
                  endforeach
                ?>
              </select>
            </div>
        </div>
        <div class='form-group'>
          <label for='seat' class='col-xs-2'>Seat</label>
            <div class='col-xs-10 input-group'>
              <select class='form-control' name='seat'>
                <option disabled selected>Select seat</option>
                <?php 
                  $seats=App\SeatInformation::all();
                  foreach($seats as $seat):
                ?>
                <option value="{{$seat->id}}">{{$seat->seatNo}}</option>
                <?php 
                  endforeach
                ?>
              </select>
            </div>
        </div>
      <div class="modal-footer">
        <button type='submit' class='btn btn-primary'>Save</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
  $(function(){
    $('#table1').dataTable(
      {
        'searching':false,
      });
  })
</script>
@endsection