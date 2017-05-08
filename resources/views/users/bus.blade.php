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
        </ul>   
        </ul>             
    </div>
    <div id="main-content">
      <div class="row">
        <div class="col-sm-11" style="margin-top:-50px">
            <h2 style='text-align:center'> Bus Information Details</h2>
        </div>
      </div>    
      <div class='row'>
        <div class="col-sm-11" style='margin-left:20px'>
        <table class="table table-bordered table-striped table-responsive" id="table1">
        <thead>
        <tr>
          <th>Sl no:</th>
          <th>Bus Number</th>
          <th>Bus Name</th>
          <th>No of seats</th>
          <th>Proprietor Name</th>
          <th>Driver Phone No</th>
          <!--th>Journey ID</th>
          <th>Journey Source</th>
          <th>Journey Destination</th-->          
        </tr> 
        </thead>         
        <tbody>
          <?php $id=1?>
          @foreach($buses as $bus)
          <tr>
            <td>{{$id++}}</td>
            <td>{{$bus->Bus_no}}</td>
            <td>{{$bus->Bus_name}}</td>
            <td>{{$bus->No_of_seat}}</td>
            <td>{{$bus->Driver_name}}</td>
            <td>{{$bus->Driver_phone}}</td>          
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>        
    </div>        
  </div><!--main content end-->
</div><!--parent end-->
<!--create modal -->
<div id="addnew" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Bus</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.bus.store')}}" method='post'>
        <div class='form-group'>
              {{csrf_field()}}
         </div>
         <div class="form-group{{ $errors->has('bno') ? ' has-error' : '' }}">
            <label for='bno' class='col-xs-2'>Bus Number</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="bno" class="form-control" pattern="[B]{1}[P]{1}-[1-3]{1}-[A-C]{1}[0-9]{4}" title="Enter correct format of bus Number" placeholder="Provide bus number here" required autofocus>
                    @if ($errors->has('bno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bno') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('bname') ? ' has-error' : '' }}">
            <label for='bname' class='col-xs-2'>Bus Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="bname" class="form-control" placeholder="Provide Name of the bus here" required autofocus>
                    @if ($errors->has('bname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bname') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('seatno') ? ' has-error' : '' }}">
            <label for='seatno' class='col-xs-2'>No of Seats</label>
                <div class='col-xs-10 input-group'>
                    <input type="number" name="seatno" min="19" max="34" class="form-control" placeholder="Enter number of seats" required autofocus>
                    @if ($errors->has('seatno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seatno') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('dname') ? ' has-error' : '' }}">
            <label for='dname' class='col-xs-2'>Proprietor Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="dname" class="form-control" placeholder="Enter driver name here" required autofocus>
                    @if ($errors->has('dname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dname') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('driverphone') ? ' has-error' : '' }}">
            <label for='driverphone' class='col-xs-2'>Driver Phone No</label>
                <div class='col-xs-10 input-group'>
                    <input type="tel" name="driverphone" pattern="[1]{1}[6-7]{1}[0-9]{6}" title='Phone Number (Format: 17 or 16)' class="form-control" placeholder="Enter driver mobile number" required autofocus>
                    @if ($errors->has('driverphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('driverphone') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>

         
         <div class="form-group">
            <div class="col-xs-10 col-xs-offset-2 input-group">
                <button type="submit" class="btn btn-info col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok">Save</button>
                <a href="{{route('admin.bus.index')}}" class='btn btn-warning glyphicon glyphicon-remove col-xs-2 col-xs-offset-1'>Cancel</a>
            </div>
         </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
@endsection