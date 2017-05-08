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
             <h2 style='text-align:center'>Edit Journey Detail</h2>
             <form action="{{route('admin.journey.update',$journey->id)}}" method="post" id='form3'>
                <div class='form-group'>
                  <input name="_method" type="hidden" value="PATCH">
                  {{csrf_field()}}
                </div>
                <div class="form-group{{ $errors->has('src') ? ' has-error' : '' }}">
                      <label for='src' class='col-xs-2'>From</label>
                          <div class='col-xs-10 input-group'>
                              <input type="text" id="src" name="src" class="form-control" required autofocus value={{$journey->source}}>
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
                              <input type="text" name="dest" class="form-control" required autofocus value={{$journey->destination}}>
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
                              <input type="number" name="dist" min="0" max="1000" class="form-control" required autofocus value={{$journey->distance}}>
                              @if ($errors->has('dist'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('dist') }}</strong>
                                              </span>
                             @endif
                        </div>
                   </div>
                  
                <div class="col-xs-10 col-xs-offset-2">
                  <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-7'>Update</button>  
                  <a href="{{route('admin.journey.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1 pull-right'> Cancel</a>
                </div> 
              </form>
          </div>          
        </div> 
      </div>        
    </div>
</div>

@endsection