<header class="main-header">
    <a href="{{route('admin-home')}}" class="logo">
        <span class="logo-mini">
            <img style="max-width: 100%;height: auto;" src="{{url('img/TelkomAsset/logofix-40x40.png')}}" alt="User Image">
        </span>

        <span class="logo-lg">
            <img style="max-width: 100%;height: auto;" src="{{url('img/TelkomAsset/logofix-40x40.png')}}" alt="User Image">
            <b>SIMARU</b>
        </span>
    </a>
    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{url('img/iconUser.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth('user')->user()->username}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{url('img/iconUser.png')}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth('user')->user()->nama}}<br>{{ucwords(auth('user')->user()->role)}}
                                <small><b>NIK. </b>{{auth('user')->user()->nik}}</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <div class="btn-group" role="group">
                                    <a href="{{route('admin-indexProfile')}}">
                                        <button type="button" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-cog"></span>
                                            <div class="inline">Edit Profil</div>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group" role="group">
                                    <a href="{{route('logout')}}">
                                        <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-off"></span>
                                            <div class="inline">Logout</div>
                                        </button>
                                    </a>
                                </div>
                                <div class="btn-group" role="group">
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>