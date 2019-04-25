<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('img/iconUser.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ucwords(auth('user')->user()->nama)}}</p>
                <a href="#"><i class="glyphicon glyphicon-user"></i> Manager Area</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{areActiveRoutes([
                'get-superValidatorIndexLihatSurat','get-superValidatorIndexExportSimaru','get-superValidatorDetailSurat'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>SIMARU</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-superValidatorIndexLihatSurat','get-superValidatorDetailSurat'
                    ])}}"><a href="{{route('get-superValidatorIndexLihatSurat')}}"><i
                                    class="glyphicon glyphicon-th-list"></i> Lihat Surat</a></li>
                    <li class="{{isActiveRoute('get-superValidatorIndexExportSimaru')}}"><a href="{{route('get-superValidatorIndexExportSimaru')}}"><i
                                    class="glyphicon glyphicon-open"></i>
                            Export SIMARU</a></li>

                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-superValidatorLihatUser','get-superValidatorLihatUserPicTelkom'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Data Pengguna</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                             </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-superValidatorLihatUser')}}"><a href="{{route('get-superValidatorLihatUser')}}"><i class="glyphicon glyphicon-th-list"></i>
                            Data
                            Security</a></li>
                    <li class="{{isActiveRoute('get-superValidatorLihatUserPicTelkom')}}"><a href="{{route('get-superValidatorLihatUserPicTelkom')}}"><i class="glyphicon glyphicon-th-list"></i>
                        Data
                        PIC Telkom</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-superValidatorLihatPicTelkom','get-superValidatorExportPicTelkom',
            'get-superValidatorLihatPicTelkomAkses','get-superValidatorLihatUnitTelkomAkses','get-superValidatorExportTelkomAkses',
            'get-superValidatorLihatPicSigma','get-superValidatorLihatUnitSigma','get-superValidatorExportSigma',
            'get-superValidatorLihatPicTkmNetra','get-superValidatorExportTkmNetra',
            'get-superValidatorLihatPicMitra','get-superValidatorExportMitra'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-folder-open"></i> <span>Data PIC</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-superValidatorLihatPicTelkom','get-superValidatorExportPicTelkom'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-superValidatorLihatPicTelkom')}}"><a href="{{route('get-superValidatorLihatPicTelkom')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat </a></li>
                            <li class="{{isActiveRoute('get-superValidatorExportPicTelkom')}}"><a href="{{route('get-superValidatorExportPicTelkom')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data</a></li>

                        </ul>

                    </li>
                    <li class="{{areActiveRoutes([
                    'get-superValidatorLihatPicTelkomAkses','get-superValidatorLihatUnitTelkomAkses','get-superValidatorExportTelkomAkses'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom Akses
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-superValidatorLihatPicTelkomAkses')}}"><a href="{{route('get-superValidatorLihatPicTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-superValidatorLihatUnitTelkomAkses')}}"><a href="{{route('get-superValidatorLihatUnitTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-superValidatorExportTelkomAkses')}}"><a href="{{route('get-superValidatorExportTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-superValidatorLihatPicSigma','get-superValidatorLihatUnitSigma','get-superValidatorExportSigma'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> SIGMA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-superValidatorLihatPicSigma')}}"><a href="{{route('get-superValidatorLihatPicSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-superValidatorLihatUnitSigma')}}"><a href="{{route('get-superValidatorLihatUnitSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-superValidatorExportSigma')}}"><a href="{{route('get-superValidatorExportSigma')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                   'get-superValidatorLihatPicTkmNetra','get-superValidatorExportTkmNetra'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> TKM NETRA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-superValidatorLihatPicTkmNetra')}}"><a href="{{route('get-superValidatorLihatPicTkmNetra')}}"><i class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-superValidatorExportTkmNetra')}}"><a href="{{route('get-superValidatorExportTkmNetra')}}"><i class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-superValidatorLihatPicMitra','get-superValidatorExportMitra'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Mitra
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-superValidatorLihatPicMitra')}}"><a href="{{route('get-superValidatorLihatPicMitra')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-superValidatorExportMitra')}}"><a href="{{route('get-superValidatorExportMitra')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-superValidatorIndexExportLogBook','get-superValidatorIndexLogHarian','get-superValidatorIndexLogBook',
            'get-superValidatorLihatPesanExtend','get-superValidatorLogHarian','get-superValidatorLogBook'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-book"></i> <span>Log Book</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-superValidatorIndexExportLogBook')}}">
                        <a href="{{route('get-superValidatorIndexExportLogBook')}}"><i class="glyphicon glyphicon-export"></i>
                            Export Log Book
                        </a>
                    </li>

                    <li class="{{areActiveRoutes(['get-superValidatorIndexLogHarian','get-superValidatorLihatPesanExtend','get-superValidatorLogHarian'])}}">
                        <a href="{{route('get-superValidatorIndexLogHarian')}}"><i class="glyphicon glyphicon-list-alt"></i>
                            Log Harian
                        </a>
                    </li>

                    <li class="{{areActiveRoutes(['get-superValidatorIndexLogBook','get-superValidatorLogBook'])}}">
                        <a href="{{route('get-superValidatorIndexLogBook')}}"><i class="glyphicon glyphicon-book"></i>
                            Log Book
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a target="_blank" href="{{route('get-superValidatorLihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>