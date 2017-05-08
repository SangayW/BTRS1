@extends('layouts.default')
@section('content')
<div class='container'>
    <div class="col-md-12">
      <h2 style='text-align:center'>Add Journey</h2>
    </div>
    <div class='row'>
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
    <<ul class='nav nav-pills nav-justified'>
         <li><a href="{{route('ticket.index')}}" class="btn btn-info">Ticket Information</a></li>
              <li><a href="{{route('bus.index')}}" class="btn btn-info">Bus Information</a></li>
              <li ><a href="{{route('journey.index')}}">Journey Details</a></li>
              <li class='active'><a href="{{route('schedule.index')}}" class="btn btn-info">Schedule</a></li>
      </ul>
         <form action="{{route('schedule.store')}}" method='post'>
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
                <a href="{{route('schedule.index')}}" class='btn btn-warning glyphicon glyphicon-remove col-xs-2 col-xs-offset-1'>Cancel</a>
            </div>
         </div>
        </form> 
    </div>
</div>
@endsection