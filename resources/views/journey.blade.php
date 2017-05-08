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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Cabin" rel="stylesheet">
    <style type="text/css">
        .well{
            margin-top: 20px;
        }
    </style>
    <!-- Scripts -->
   
</head>
<body>
    <div id="app">        
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
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
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
                    </ul>
                </div>
            </div>
        </nav>     
    </div> 
    <div class="container">
        <h1>Journey Details </h1>
        <div class="row">
            <div class="col-sm-11">
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
                  <td>{{$journey->distance}} Kilometer</td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
        </div>
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
