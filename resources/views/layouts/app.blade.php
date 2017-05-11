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
                        <li><a href="{{ url('/') }}"><img src=" src="{{URL::asset('/img/logoxsm.png')}}"></a></li> 
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/w3.js') }}"></script>
    <script src="{{ asset('js/nav-scroll.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> 
   {{--  <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/ jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/   pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/   vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/    buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/    buttons.print.min.js"></script> --}}
</body>
</html>
