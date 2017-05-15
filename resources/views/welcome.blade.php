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
    <link href="{{ asset('css/btrs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Cabin" rel="stylesheet">  
</head>
<body>    
    <div id="app"> 
    <div class="container-fluid bg"> 
    <div class="row">        
        <nav class="navbar navbar-default navbar-static-top">
 
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
                        <li style="margin-top: 30px; font-size:18px;"><a href="#{{-- {{ url('/journey') }} --}}">About Us</a></li>
                        <li style="margin-top: 30px; font-size:18px;"><a href="#{{-- {{ url('/bus') }} --}}">Vision</a></li>
                        <li style="margin-top: 30px; font-size:18px;"><a href="#{{-- {{ url('/schedule') }} --}}">Mission</a></li>
                         <li style="margin-top: 30px; font-size:18px;"><a href="#{{-- {{ url('/schedule') }} --}}">Contact Us</a></li>
                    </ul>

                 {{--    <!Right Side Of Navbar >
                    <ul class="nav navbar-nav navbar-right">
                        <!Authentication Links >
                        @if (Auth::guest())
                            <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('login') }}">Login</a></li>
                            <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('register') }}">Register</a></li>
                        @else
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
                    </ul> --}}
                </div>
            </div>
        </nav>     
    </div>
<!--Body Text-->
  <div class="body-text">
        <span class="mid-text">Comfort & Style <br/> Over Every Mile </span>
        <p style="color:#ffffff; font-family: Arial; font-style:italic;">Bus Ticket Reservation System is the easiest and fastess way to reserve ticket.....</p>

        <div>
            <button type="submit" class="btn btn-default" style="color:#ffffff; height:40px; width: 100px; background: rgba(0,0,0,0.3);">More</button>
        </div>  
  </div>
  <!--Reservation Form -->
    <div class="container searchopt">
        <div class="container-fluid searchoptin">
            <span style="font-size: 22px; color:#ffffff; font-weight: bold;">Find Bus Tickets</span>
            <div class="container-fluid searchoptin">
            <form class="form-inline" method="post" action="{{route('search_bus')}}">
              {{csrf_field()}}
              <div class="form-group reserveform">
                <p>Traveling From:</p>
                <select class="form-control" name="journey_id1">
                  <option disabled selected>select your source of travel</option>
                  @foreach($journeys as $journey)
                    <option value='{{$journey->source}}'>{{ $journey->source}}</option>
                  @endforeach                  
                </select>
              </div>

              <div class="form-group reserveform">
                <p>Traveling To:</p>
                <select class="form-control" name="journey_id2">
                  <option disabled selected>select your destination</option>
                  @foreach($journeys as $journey)
                    <option value='{{$journey->destination}}'>{{ $journey->destination}}</option>
                  @endforeach                  
                </select>
                
              </div> 
             
             <!-- <div class="form-group reserveform">
                  <p>Date:</p>
                    <div class="input-group date" id="datepicker">
                        <input type='date' class="form-control f">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
              </div>-->
              
              <div class="form-group reserveform">
              <p>Date:</p>
                  <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='date' class="form-control" name='date'/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

              <div class="form-group reserveform">
              <br>
                  <button type="submit" class="btn btn-default btnstyle" value='search' name='search'>Search</button>
              </div>
                </form>
            </div>
        </div>
    </div>
    </div><!--end sharchop-->
            
    <!--Advatages-->
    <div class="container-fluid">
      <div class="container">
        <div style="text-align: center; padding-top: 70px;">
          <span style="font-size: 55px;font-family:Arial; font-weight: bold;">Our Advantages</span>
        </div>
      </div>
      <div class="container-fluid advimg">
            <div class="col-md-4 advstyle1"><img src="img/ticket1.png" alt="Ticket"><br><br>
              <h3 class="advhead">Different ways of Buying Tickets</h3>
              <p class="advtext">Cash,Visa,Mastercards,etc</p>
            </div>
            <div class="col-md-4 advstyle2"><img src="img/time1.png" alt="time"><br><br>
                  <h3 class="advhead">On Time</h3>
                  <p class="advtext">Neither a minute late nor a minute early. Always on time.</p>
            </div>
            <div class="col-md-4 advstyle3"><img src="img/seat2.png" alt="seat"><br><br>
                  <h3 class="advhead">Comfortable</h3>
                  <p class="advtext">You can spend more than 10 hours without any discomfort in our seats</p>
            </div>
      </div>
    </div>
    <!--footer-->
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


<div class="container-fluid footerall" style="position:relative; top:170px;margin-bottom:0px; background-color: black; color:white;">
    <div class="col-sm-4"></div>    
    <div class="col-sm-4">&copy 2017 Bus Ticket Reservation System. All rights reserved.</div>    
    <div class="col-sm-4"></div>     
</div> 


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/nav-scroll.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

