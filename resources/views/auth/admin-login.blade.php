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
<div class="container" style='margin-top:100px'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Administrator Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>               

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
