<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIMARU | Login Page</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{url('css/login.min.css')}}">

    <style>
        #loginBox {
            width: 30%;
            margin: 7% auto;
        }
    </style>

</head>
<body class="hold-transition bgscreen ">
<div class="login-box">
    <div class="login-logo">
        <span><b>SIMARU WITEL SBS</b> Login Page </span>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <img class="telkom-logo" src="{{url('img/TelkomAsset/logofix-100x70.png')}}" alt="User Image">
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><strong> {{ $error }} </strong></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-{{session('status')}}">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{route('login')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                @if(old('username'))
                    <input type="text" autocomplete="off" class="form-control border-radius-element" name="username" placeholder="Username" value="{{old('username')}}">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                @else
                    <input type="text" autocomplete="off" class="form-control border-radius-element" name="username" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback "></span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control border-radius-element" name="password"
                       placeholder="Password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{route('index-register')}}">
                        <button type="button" class="btn btn-primary btn-block border-radius-element">Register</button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <button type="submit" class="btn btn-success btn-block border-radius-element">Login</button>
                </div>
            </div>
            <!-- /.col -->
        </form>
        <div class="lockscreen-footer text-center" style="padding-top: 10px">
            <strong>Copyright © 2017 TELKOM INDONESIA.</strong><br>
            <strong>All rights reserved</strong><br>
            <small><strong>SIMARU V 2.6</strong></small><br>
            <strong>
                <small><a target="_blank" href="mailto:natanaelpandapotan@gmail.com">Dev</a></small>
            </strong>
        </div>
    </div>
</div>
</body>
</html>
