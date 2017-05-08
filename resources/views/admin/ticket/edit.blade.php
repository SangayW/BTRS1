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
        </ul>        
    </div>
    <div id="main-content">
      <div class='container'>
        <div class="row">
          <div class="col-sm-10" style="margin-top:-50px">
             <h2 style='text-align:center'>Edit Bus Information Detail</h2>
             <form action="{{route('admin.bus.update',$bus->id)}}" method="post" id='form3'>
            <div class='form-group'>
              <input name="_method" type="hidden" value="PATCH">
              {{csrf_field()}}
            </div>

               <div class="form-group{{ $errors->has('bno') ? ' has-error' : '' }}">
                  <label for='bno' class='col-xs-2'>Bus Number</label>
                      <div class='col-xs-10 input-group'>
                          <input type="text" name="bno" class="form-control" required autofocus value={{$bus->Bus_no}}>
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
                          <input type="text" name="bname" class="form-control" required autofocus value={{$bus->Bus_name}}>
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
                          <input type="number" name="seatno" min="19" max="34" class="form-control" required autofocus value={{$bus->No_of_seat}}>
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
                          <input type="text" name="dname" class="form-control" required autofocus value={{$bus->Driver_name}}>
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
                          <input type="tel" name="driverphone" pattern="[1]{1}[6-7]{1}[0-9]{6}" title='Phone Number (Format: 17 or 16)' class="form-control" required autofocus value={{$bus->Driver_phone}}>
                          @if ($errors->has('driverphone'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('driverphone') }}</strong>
                                          </span>
                         @endif
                    </div>
               </div>              
            <div class="col-xs-10 col-xs-offset-2">
              <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7'>Update</button>  
              <a href="{{route('admin.bus.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right'> Cancel</a>
            </div> 
          </form>
          </div>          
        </div> 
      </div>        
    </div>
</div>
@endsection