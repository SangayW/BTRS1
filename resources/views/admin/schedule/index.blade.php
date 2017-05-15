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
  	   <div class="col-sm-11" style="margin-top:-60px">
      	<h3 style='text-align:center'>Bus Schedule</h3>
    	 </div>
    </div>  	
	  <div class='row'>
      <div class="col-sm-11"  style='margin-top:-40px; margin-left:30px;'>
        <table class="table table-bordered table-striped table-responsive" id="table1">
          <thead>
            <tr> 
            <th>Sl No</th>      
            <th>Date</th>
            <th>Reporting Time</th>
            <th>Departure Time</th>
            <th>Action</th>     
           </tr> 
         </thead>
          <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target="#addnew">Create New Schedule Data</a><br><br>
         <tbody>
          <?php $id=1?>
          @foreach($schedules as $schedule)
          <tr> 
            <td>{{$id++}}</td>       
            <td>{{$schedule->Date}}</td>
            <td>{{$schedule->Reporting_time}}</td>
            <td>{{$schedule->Departure_time}}</td>
            <td>
              <form class="form-group" action="{{route('admin.schedule.destroy',$schedule->id)}}" method='post'>
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!--a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">Edit</a-->
                        <a href="{{route('admin.schedule.edit',$schedule->id)}}" class="btn btn-primary" >Edit</a>
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
<script type="text/javascript">
  $(function(){
    $('#table1').dataTable(
      {
        'searching':false,
      });
  })
</script>
@endsection