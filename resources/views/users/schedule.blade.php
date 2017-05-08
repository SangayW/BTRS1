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
  	   <div class="col-sm-11" style="margin-top:-60px">
      	<h3 style='text-align:center'>Bus Schedule</h3>
    	 </div>
    </div>  	
	  <div class='row'>
      <div class="col-sm-11"  style='margin-left:20px'>
        <table class="table table-bordered table-striped table-responsive" id="table1">
          <thead>
            <tr> 
            <th>Sl No.</th>  
            <th>Date</th>
            <th>Reporting Time</th>
            <th>Departure Time</th>                 
           </tr> 
         </thead>          
         <tbody>
          <?php $id=1?>
          @foreach($schedules as $schedule)
          <tr> 
            <td>{{$id++}}</td>       
            <td>{{$schedule->Date}}</td>
            <td>{{$schedule->Reporting_time}}</td>
            <td>{{$schedule->Departure_time}}</td>            
          </tr>
          @endforeach
        </tbody>
       </table>
      </div>  		
  	</div>
  </div>
</div>
	<!--create modal -->
<div id="addnew" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Schedule</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.schedule.store')}}" method='post'>
        <div class='form-group'>
              {{csrf_field()}}
         </div>

         <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
            <label for='status' class='col-xs-2'>Date</label>
                <div class='col-xs-10 input-group'>
                    <input type="date" name="date" class="form-control" placeholder="Enter date here " required autofocus>
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
                    <input type="time" name="rtime" class="form-control" placeholder="Enter reporting time here" required autofocus>
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
                    <input type="time" name="dtime" class="form-control" placeholder="Enter Departure time here" required autofocus>
                    @if ($errors->has('dtime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dtime') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         
         
         <div class='form-group'>
            <div class="col-xs-10 col-xs-offset-2 input-group">
                <button type="submit" class="btn btn-info col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok">Save</button>
                <a href="{{route('admin.schedule.index')}}" class='btn btn-warning glyphicon glyphicon-remove col-xs-2 col-xs-offset-1'>Cancel</a>
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