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
        <div class="row">
        <div class="col-sm-10" style="margin-top:-50px">
            <h2 style='text-align:center'> Registered User Details</h2>
        </div>
        <div class="row">           
            <div class="col-sm-11" style="margin-left:30px; margin-top:-30px">
                <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>Slno:</th>
                        <th>UserName</th>
                        <th>FirstName</th>
                        <th>LastName</th>                        
                        <th>Phone</th>
                        <th>Email</th>                        
                        <!--<th>Password</th>-->
                        <!--th>Journey ID</th>
                        <th>Journey Source</th>
                        <th>Journey Destination</th-->
                        <th>Action</th>
                    </tr> 
                <thead>
                      <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target="#addnew">Add New User</a><br><br>
                <tbody>
                  <?php $id=1?>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$user->uname}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->lname}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <!--<td>{{$user->password}}</td>  -->                  
                    <td>
                      <form class="form-group" action="{{route('admin.user.destroy',$user->id)}}" method='post'>
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!--a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">Edit</a-->
                                <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-primary" >Edit</a>
                                <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data')" name='name' value='Delete'>
                            </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
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
        <h4 class="modal-title">Add New User</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.user.store')}}" method='post'>
        <div class='form-group'>
              {{csrf_field()}}
         </div>
         <div class="form-group{{ $errors->has('uname') ? ' has-error' : '' }}">
            <label for='bno' class='col-xs-2'>User Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="uname" class="form-control" placeholder="Provide bus number here" required autofocus>
                    @if ($errors->has('uname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uname') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
            <label for='bname' class='col-xs-2'>First Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="fname" class="form-control" placeholder="Provide First Name of the User" required autofocus>
                    @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
            <label for='bname' class='col-xs-2'>Last Name</label>
                <div class='col-xs-10 input-group'>
                    <input type="text" name="lname" class="form-control" placeholder="Provide  Last Name " required autofocus>
                    @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>         
         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for='driverphone' class='col-xs-2'>Phone</label>
                <div class='col-xs-10 input-group'>
                    <input type="tel" name="phone" pattern="[1]{1}[6-7]{1}[0-9]{6}" title='Phone Number (Format: 17 or 16)' class="form-control" placeholder="Enter driver mobile number" required autofocus>
                    @if ($errors->has('driverphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for='dname' class='col-xs-2'>Email</label>
                <div class='col-xs-10 input-group'>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address here" required autofocus>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                   @endif
              </div>
         </div>         
         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for='driverphone' class='col-xs-2'>Password</label>
                <div class='col-xs-10 input-group'>
                    <input type="password" name="password" class="form-control" placeholder="Enter driver mobile number" required autofocus>
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                   @endif
              </div>
         </div> 
          <div class="form-group">
            <div class="col-xs-10 col-xs-offset-2 input-group">
                <button type="submit" class="btn btn-info col-xs-2 col-xs-offset-7 glyphicon glyphicon-ok">Save</button>
                <a href="{{route('admin.user.index')}}" class='btn btn-warning glyphicon glyphicon-remove col-xs-2 col-xs-offset-1'>Cancel</a>
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