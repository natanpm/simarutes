<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIMARU | {{auth('user')->user()->role}} Dashboard</title>

    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{url('css/skins/skin-red-light.min.css')}}">

    <link rel="stylesheet" href="{{url('css/normalize.css')}}">

    @yield('extraStyleSheet')

</head>
<body class="hold-transition skin-red-light sidebar-mini fixed">
<div class="wrapper">

    @include("Validator.Layouts.header")

    @include("Validator.Layouts.mainSidebar")

    @include("Validator.Layouts.content")

    @include("Validator.Layouts.footer")

</div>
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{url('js/adminlte.min.js')}}"></script>

@yield('extraJavaScript')
</body>
</html>
