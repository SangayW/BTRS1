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
    <div class='container'>
      <div class="row">
        <div class="col-md-11" style="margin-top:-40px">
          <h3 style='text-align:center'>Edit Schedule</h3>
        </div>
      </div>            
        <div class='row'>
          <div class="col-sm-11" style="margin-top:0px">
            <form action="{{route('admin.schedule.update',$schedule->id)}}" method="post" id='form3'>
            <div class='form-group'>
              <input name="_method" type="hidden" value="PATCH">
              {{csrf_field()}}
            </div>
           <div class='form-group'>
                  
               <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                  <label for='status' class='col-xs-2'>Date</label>
                      <div class='col-xs-10 input-group'>
                          <input type="date" name="date" class="form-control" required autofocus value={{$schedule->Date}}>
                          @if ($errors->has('date'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('date') }}</strong>
                                          </span>
                         @endif
                    </div>
               </div>
               <div class="form-group{{ $errors->has('rtime') ? ' has-error' : '' }}">
            <label for='rtime' class='col-xs-2'>Reporting Time</label>
                <div class='col-xs-10 input-group'>
                    <input type="time" name="rtime" class="form-control" required autofocus value={{$schedule->Reporting_time}}>
                    @if ($errors->has('rtime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rtime') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('dtime') ? ' has-error' : '' }}">
            <label for='dtime' class='col-xs-2'>Departure Time</label>
                <div class='col-xs-10 input-group'>
                    <input type="time" name="dtime" class="form-control" required autofocus value={{$schedule->Departure_time}}>
                    @if ($errors->has('dtime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dtime') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         
        
      <div class="col-xs-10 col-xs-offset-2">
        <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7'>Update</button>  
        <a href="{{route('admin.schedule.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right'> Cancel</a>
      </div> 
    </form>
  </div>          
  </div>
</div>
@endsection