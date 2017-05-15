<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Styles -->
    <!-- Bootstrap core CSS     -->
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Animation library for notifications-->  
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS   --> 
    <link href="{{asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project -->    
    <link href="{{ asset('css/demo.css') }} " rel="stylesheet" />
    <link href="{{ asset('css/w3.css') }} " rel="stylesheet" />
    <link href="{{ asset('css/w333.css') }} " rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }} " rel="stylesheet" />
    <!--<link href="{{ asset('css/bus.css') }} " rel="stylesheet" />-->
    <link rel="stylesheet" type="text/css" href="{{url ('css/bus.css')}}"> 
    <link href="https://fonts.googleapis.com/css?family=Acme|Cabin" rel="stylesheet">
      <!-- Datables Style -->
      <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
</head>
<body>         
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
                        <li><a href="{{ url('/') }}"><img src="{{URL::asset('/img/logoxsm.png')}}"></a></li> 
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                           <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('login') }}">Login</a></li>
                            <li style="margin-top: 30px; font-size:18px;"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown" style="margin-top: 30px; font-size:18px;">
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
        @yield('content')
    </div>    
     <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> 
      <!-- Datable Script -->
      <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
      <!-- Scripts -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
