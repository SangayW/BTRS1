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
        <div class="col-sm-11" style='margin-top:-60px' >
          <h3 style='text-align:center'> Journey Details</h3> 
        </div>
      </div>            
      <div class='row'>
        <div class="col-sm-11"  style='margin-top:-40px; margin-left:30px;'>
          <table class="table table-bordered table-striped table-responsive" id="table1" style="align:center">
          <thead >
            <tr style="align:center">
              <th>Sl_no:</th>
              <th>Title</th>
              <th>Source</th>
              <th>Destination</th>
              <th>Distance</th>
              <th>Action</th>
            </tr> 
          </thead>
           <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target="#addnew">Create New Journey Data</a><br><br>
          <tbody>
            <?php $id=1?>
            @foreach($journeys as $journey)
            <tr>
              <td>{{$id++}}</td>
              <td>{{$journey->title}}</td>
              <td>{{$journey->source}}</td>
              <td>{{$journey->destination}}</td>
              <td>{{$journey->distance}}Kilometer</td>
              <td>
                <form class="form-group" action="{{route('admin.journey.destroy',$journey->id)}}" method='post'>
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <!--a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">Edit</a-->
                          <a href="{{route('admin.journey.edit',$journey->id)}}" class="btn btn-primary" >Edit</a>
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

           <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for='title' class='col-xs-2'>Title</label>
                  <div class='col-xs-10 input-group'>
                      <input type="text" name="title" class="form-control" placeholder="Provide title of journey here" required autofocus>
                      @if ($errors->has('title'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('title') }}</strong>
                                      </span>
                     @endif
                </div>
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
<script type="text/javascript">
  $(function(){
    $('#table1').dataTable(
      {
        'searching':false,
      });
  })
</script>
@endsection
  