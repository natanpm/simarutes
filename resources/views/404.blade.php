<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIMARU | Page Not Found</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('css/AdminLTE.css')}}">

    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <style>
        .login-box {
            width: 100%;
            margin: 10% auto;
        }
    </style>
</head>
<body class="hold-transition bgscreen">

<div class="login-box">

    <div class="login-box-body loginbox">
        <div class="login-logo">
            <img class="telkom-logo" src="{{url('img/TelkomAsset/logofix-100x100.png')}}" alt="User Image">
            <h6><b><i>With Great Power Comes Great Responsibility Too!</i></b><br></h6>
        </div>

        <div class="error-page">
            <h2 class="headline text-red" style="margin: 0px">404</h2>
            <div class="error-content">
                <h2><i class="fa fa-warning text-red"></i> Whoops! </h2>
                <h4> Maaf, halaman yang anda minta tidak ditemukan. </h4>
                <a href="{{route('unauthorized-Access-Back')}}" style="text-decoration: none;color: black;">Kembali Ke Halaman Sebelumnya</a>
            </div>
        </div>
    </div>
</div>


<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
