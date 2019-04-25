<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('title')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" media="print" />

    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}" type="text/css" media="print" />

    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}" type="text/css" media="print" />

    <link rel="stylesheet" href="{{url('css/AdminLTE.min.css')}}" type="text/css" media="print" />
    @yield('extraStyleSheet')
</head>
<body onload="window.print();">
<div class="wrapper">
    @yield('content')
</div>
<!-- ./wrapper -->
</body>
</html>
