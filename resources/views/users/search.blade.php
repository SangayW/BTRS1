<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/btrs.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Cabin" rel="stylesheet">  
</head>
<body>    
    <div id="app"> 
    <div class="container-fluid bg"> 
    <div class="row">        
        <nav class="navbar navbar-default navbar-static-top">
            <!--<a href="#"><img src="../image/logo.png" alt="Logo" width="210px" height="120px" class="col-md-2"></a>-->
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                   
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}"><img src="img/logoxsm.png"></a></li> 
                        <li style="margin-top: 30px; font-size:18px;"><a href="{{ url('/') }}">Home</a></li>                       
                        <li style="margin-top: 30px; font-size:18px;"><a href="{{ url('/journey') }}">Journey</a></li>
                        <li style="margin-top: 30px; font-size:18px;"><a href="{{ url('/bus') }}">Bus Information</a></li>
                        <li style="margin-top: 30px; font-size:18px;"><a href="{{ url('/schedule') }}">Schedule</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="nav navbar-nav navbar-right"> --}}
                        <!-- Authentication Links -->
                       {{--  @if (Auth::guest()) --}}
                           {{--  <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('login') }}">Login</a></li>
                            <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('register') }}">Register</a></li> --}}
                       {{--  @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>     
    </div> --}}
<!--Body Text-->

             
               <div id="main-content1">
      <div class="row">
         <div class="col-sm-11" style="margin-top:2px">
            @foreach($buses as $bus)
            <h2 style='text-align:center'> Available bus On:&nbsp;{{$bus->schedule->Date}}</h2>
             @break
            @endforeach

        </div>

      </div>    
      <div class='row'>
        <div class="col-sm-11" style='margin-top:20px; margin-left:30px;'>
        <table class="table table-striped table-responsive" id="table1" border="0">
        <thead>
        <tr>
          <th>Sl no:</th>
          <th>Bus Number</th>
          <th>Bus Name</th>
          <th>No of seats</th>
          <th>Departure_time</th>
          <th>Driver Phone No</th>
          <th>Journey Source</th>
          <th>Journey Destination</th>
          <th>Action</th>
        </tr> 
        </thead>
        <tbody>
          <?php $id=1?>
          @foreach($buses as $bus)
          <tr>
            <td>{{$id++}}</td>
            <td><img src="img/new.png" alt="" border=3 height=30 width=30>{{$bus->Bus_no}}</td>
            <td>{{$bus->Bus_name}}</td>
            <td>{{$bus->No_of_seat}}</td>
            <td>{{$bus->schedule->Departure_time}}</td>  
            <td>{{$bus->Driver_phone}}</td>
            <td>{{$bus->journey->source}}</td> 
            <td>{{$bus->journey->destination}}</td>         
            <td>
                <form class="form-group" action="{{route('reserve_bus',$bus->Bus_no)}}" method='get'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button  class='btn btn-primary' type='submit'>Reserve</button>   
                </form> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
    </div>        
    </div>        
  </div><!--main content end-->
 
 <hr height="3"></hr>           
   <div class="container">
    <div class="container footerstyle">
        <div class="col-md-4">
            <img src="img/logoxsm.png" alt="Logo"><br><br>
            <p style="color:#999;">BTRS is the first of it's kind, go-to website for booking bus ticket online. Our booking system allows travelers to search and book bus tickets for over a hundred bus companies throughout the country.</p>
        </div>
        <div class="col-md-4">
            <h4 class="fhead">Contacts</h4><br><br>
            <div style="text-align: left;padding-left: 70px; color:#999;">
                <p><img src="img/icon02.png" alt="phone icon">12345678</p>
                <p><img src="img/icon01t.png" alt="mail icon">info@email.com</p> 
                <p><img src="img/icon03.png" alt="location icon">CST,Rinchending,Phuentsholing</p>
            </div>        
        </div>
        <div class="col-md-4">
            <h4 class="fhead">Feedback</h4>
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="subject">Subject:</label>
                        <div class="col-sm-9 col-sm-offset-1">
                          <input type="text" class="form-control" id="subject" placeholder="Enter subject">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="feedback">Feedback:</label>
                        <div class="col-sm-9 col-sm-offset-1"> 
                          <input type="text" class="form-control" id="feedback" placeholder="Give your feedback here.">
                        </div>
                      </div>
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>
                    </form> 
        </div>  
    </div><!--footer end-->
</div>

</div>
<div class="container-fluid footerall" style="position:relative; top:170px;margin-bottom:0px; background-color: black; color:white;">
    <div class="col-sm-4"></div>    
    <div class="col-sm-4">&copy 2017 Bus Ticket Reservation System. All rights reserved.</div>    
    <div class="col-sm-4"></div>     
</div> 


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/nav-scroll.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    
</body>
</html>
