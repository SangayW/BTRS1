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
        <div class="col-sm-11" style='margin-top:-60px' >
          <h3 style='text-align:center'> Journey Details</h3> 
        </div>
      </div>            
      <div class='row'>
        <div class="col-sm-11"  style='margin-left:20px'>
          <table class="table table-bordered table-striped table-responsive" id="table1" style="align:center">
          <thead >
            <tr style="align:center">
              <th>Sl_no:</th>
              <th>Source</th>
              <th>Destination</th>
              <th>Distance</th>             
            </tr> 
          </thead>           
          <tbody>
            <?php $id=1?>
            @foreach($journeys as $journey)
            <tr>
              <td>{{$id++}}</td>
              <td>{{$journey->source}}</td>
              <td>{{$journey->destination}}</td>
              <td>{{$journey->distance}}Kilometer</td>              
            </tr>
            @endforeach
          </tbody>
        </table>
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
          <h4 class="modal-title">Create New Journey</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.journey.store')}}" method='post'>
          <div class='form-group'>
                {{csrf_field()}}
           </div>
           <div class="form-group{{ $errors->has('src') ? ' has-error' : '' }}">
              <label for='src' class='col-xs-2'>From</label>
                  <div class='col-xs-10 input-group'>
                      <input type="text" id="src" name="src" class="form-control" placeholder="Provide source here" required autofocus>
                      @if ($errors->has('src'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('src') }}</strong>
                                      </span>
                     @endif
                </div>
           </div>
           
           <div class="form-group{{ $errors->has('dest') ? ' has-error' : '' }}">
              <label for='dest' class='col-xs-2'>To</label>
                  <div class='col-xs-10 input-group'>
                      <input type="text" name="dest" class="form-control" placeholder="Provide destination" required autofocus>
                      @if ($errors->has('dest'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('dest') }}</strong>
                                      </span>
                     @endif
                </div>
           </div>
           <div class="form-group{{ $errors->has('dist') ? ' has-error' : '' }}">
              <label for='dist' class='col-xs-2'>Distance</label>
                  <div class='col-xs-10 input-group'>
                      <input type="number" name="dist" min="0" max="1000" class="form-control" placeholder="Your distance in km" required autofocus>
                      @if ($errors->has('dist'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('dist') }}</strong>
                                      </span>
                     @endif
                </div>
           </div>
           <div class='form-group'>
              <div class="col-xs-10 col-xs-offset-2 input-group">
                  <button type="submit" class="btn btn-info col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok">Save</button>
                  <a href="{{route('admin.journey.index')}}" class='btn btn-warning glyphicon glyphicon-remove col-xs-2 col-xs-offset-1'>Cancel</a>
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
</div>
@endsection
  