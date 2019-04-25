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
                <a href="#"><i class="glyphicon glyphicon-user"></i>Asman NetPerf & Admin</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{areActiveRoutes([
            'get-validatorBuatSuratMasuk','get-validatorIndexLihatSurat','get-validatorIndexExportSimaru','get-validatorDetailSurat','get-validatorIndexEditSurat'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>SIMARU</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-validatorBuatSuratMasuk')}}"><a
                                href="{{route('get-validatorBuatSuratMasuk')}}"><i class="glyphicon glyphicon-plus"></i>
                            Buat
                            SIMARU</a></li>
                    <li class="{{areActiveRoutes(['get-validatorIndexLihatSurat','get-validatorDetailSurat','get-validatorIndexEditSurat'])}}">
                        <a href="{{route('get-validatorIndexLihatSurat')}}"><i class="glyphicon glyphicon-th-list"></i>
                            Lihat SIMARU</a></li>
                    <li class="{{isActiveRoute('get-validatorIndexExportSimaru')}}"><a
                                href="{{route('get-validatorIndexExportSimaru')}}"><i
                                    class="glyphicon glyphicon-open"></i>
                            Export SIMARU</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-validatorBuatUser','get-validatorBuatUserPicTelkom','get-validatorLihatUserPicTelkom','get-validatorEditUser','get-validatorEditUserPicTelkom','get-validatorLihatUser'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Kelola Pengguna</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-validatorBuatUser')}}"><a href="{{route('get-validatorBuatUser')}}"><i
                                    class="glyphicon glyphicon-plus"></i> Tambah
                            Akun Security</a></li>
                    <li class="{{isActiveRoute('get-validatorBuatUserPicTelkom')}}"><a
                                href="{{route('get-validatorBuatUserPicTelkom')}}"><i
                                    class="glyphicon glyphicon-plus"></i>
                            Tambah Akun PIC Telkom</a></li>
                    <li class="{{areActiveRoutes(['get-validatorLihatUser','get-validatorEditUser'])}}"><a
                                href="{{route('get-validatorLihatUser')}}"><i class="glyphicon glyphicon-th-list"></i>
                            Lihat
                            Data Security</a></li>
                    <li class="{{areActiveRoutes(['get-validatorLihatUserPicTelkom','get-validatorEditUserPicTelkom'])}}">
                        <a href="{{route('get-validatorLihatUserPicTelkom')}}"><i
                                    class="glyphicon glyphicon-th-list"></i> Lihat Data PIC Telkom</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-validatorBuatPicTelkom','get-validatorLihatPicTelkom','get-validatorExportPicTelkom','get-validatorEditPicTelkom',
            'get-validatorBuatPicTelkomAkses','get-validatorBuatUnitTelkomAkses','get-validatorLihatPicTelkomAkses','get-validatorLihatUnitTelkomAkses','get-validatorExportTelkomAkses','get-validatorEditUnitTelkomAkses','get-validatorEditPicTelkomAkses',
            'get-validatorBuatPicMitratel','get-validatorBuatUnitMitratel','get-validatorLihatPicMitratel','get-validatorLihatUnitMitratel','get-validatorExportMitratel','get-validatorEditUnitMitratel','get-validatorEditPicMitratel',
            'get-validatorBuatPicSigma','get-validatorBuatUnitSigma','get-validatorLihatPicSigma','get-validatorLihatUnitSigma','get-validatorExportSigma','get-validatorEditUnitSigma','get-validatorEditPicSigma',
            'get-validatorBuatPicTkmNetra','get-validatorLihatPicTkmNetra','get-validatorExportTkmNetra','get-validatorEditPicTkmNetra',
            'get-validatorLihatPicMitra','get-validatorExportMitra','get-validatorEditPicMitra',
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-folder-open"></i> <span>Kelola Data PIC</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-validatorBuatPicTelkom','get-validatorLihatPicTelkom','get-validatorExportPicTelkom','get-validatorEditPicTelkom'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-validatorBuatPicTelkom')}}"><a
                                        href="{{route('get-validatorBuatPicTelkom')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatPicTelkom','get-validatorEditPicTelkom'])}}">
                                <a href="{{route('get-validatorLihatPicTelkom')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat </a></li>
                            <li class="{{isActiveRoute('get-validatorExportPicTelkom')}}"><a
                                        href="{{route('get-validatorExportPicTelkom')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-validatorBuatPicTelkomAkses','get-validatorBuatUnitTelkomAkses','get-validatorLihatPicTelkomAkses','get-validatorLihatUnitTelkomAkses','get-validatorExportTelkomAkses','get-validatorEditUnitTelkomAkses','get-validatorEditPicTelkomAkses',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom Akses
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-validatorBuatPicTelkomAkses')}}"><a href="{{route('get-validatorBuatPicTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-validatorBuatUnitTelkomAkses')}}"><a href="{{route('get-validatorBuatUnitTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatPicTelkomAkses','get-validatorEditPicTelkomAkses'])}}"><a href="{{route('get-validatorLihatPicTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatUnitTelkomAkses','get-validatorEditUnitTelkomAkses'])}}"><a href="{{route('get-validatorLihatUnitTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-validatorExportTelkomAkses')}}"><a href="{{route('get-validatorExportTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>

                    <li class="{{areActiveRoutes([
                    'get-validatorBuatPicMitratel','get-validatorBuatUnitMitratel','get-validatorLihatPicMitratel','get-validatorLihatUnitMitratel','get-validatorExportMitratel','get-validatorEditUnitMitratel','get-validatorEditPicMitratel',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Mitratel
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-validatorBuatPicMitratel')}}"><a href="{{route('get-validatorBuatPicMitratel')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-validatorBuatUnitMitratel')}}"><a href="{{route('get-validatorBuatUnitMitratel')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatPicMitratel','get-validatorEditPicMitratel'])}}"><a href="{{route('get-validatorLihatPicMitratel')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatUnitMitratel','get-validatorEditUnitMitratel'])}}"><a href="{{route('get-validatorLihatUnitMitratel')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-validatorExportMitratel')}}"><a href="{{route('get-validatorExportMitratel')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>

                    <li class="{{areActiveRoutes([
                    'get-validatorBuatPicSigma','get-validatorBuatUnitSigma','get-validatorLihatPicSigma','get-validatorLihatUnitSigma','get-validatorExportSigma','get-validatorEditUnitSigma','get-validatorEditPicSigma',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> SIGMA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-validatorBuatPicSigma')}}"><a href="{{route('get-validatorBuatPicSigma')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-validatorBuatUnitSigma')}}"><a href="{{route('get-validatorBuatUnitSigma')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatPicSigma','get-validatorEditPicSigma'])}}"><a href="{{route('get-validatorLihatPicSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatUnitSigma','get-validatorEditUnitSigma'])}}"><a href="{{route('get-validatorLihatUnitSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-validatorExportSigma')}}"><a href="{{route('get-validatorExportSigma')}}"><i class="glyphicon glyphicon-open"></i>
                                    Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-validatorBuatPicTkmNetra','get-validatorLihatPicTkmNetra','get-validatorExportTkmNetra','get-validatorEditPicTkmNetra',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> TKM NETRA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-validatorBuatPicTkmNetra')}}"><a href="{{route('get-validatorBuatPicTkmNetra')}}"><i class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-validatorLihatPicTkmNetra','get-validatorEditPicTkmNetra'])}}"><a href="{{route('get-validatorLihatPicTkmNetra')}}"><i class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-validatorExportTkmNetra')}}"><a href="{{route('get-validatorExportTkmNetra')}}"><i class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-validatorLihatPicMitra','get-validatorExportMitra','get-validatorEditPicMitra'
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Mitra
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{areActiveRoutes(['get-validatorLihatPicMitra','get-validatorEditPicMitra'])}}"><a href="{{route('get-validatorLihatPicMitra')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-validatorExportMitra')}}"><a href="{{route('get-validatorExportMitra')}}"><i class="glyphicon glyphicon-open"></i>
                                    Export Data Petugas</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-validatorLihatNdaTelkomAkses','get-validatorLihatNdaMitratel','get-validatorLihatNdaSigma','get-validatorLihatNdaMitra','get-validatorIndexUploadNda','get-validatorLihatNdaTkmNetra'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-file"></i> <span>Kelola Berkas NDA</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-validatorLihatNdaTelkomAkses')}}"><a href="{{route('get-validatorLihatNdaTelkomAkses')}}"><i class="glyphicon glyphicon-user"></i>
                            Telkom Akses </a></li>
                    <li class="{{isActiveRoute('get-validatorLihatNdaMitratel')}}"><a href="{{route('get-validatorLihatNdaMitratel')}}"><i class="glyphicon glyphicon-user"></i>
                            Mitratel </a></li>
                    <li class="{{isActiveRoute('get-validatorLihatNdaSigma')}}"><a href="{{route('get-validatorLihatNdaSigma')}}"><i class="glyphicon glyphicon-user"></i> SIGMA
                        </a></li>
                    <li class="{{isActiveRoute('get-validatorLihatNdaTkmNetra')}}"><a href="{{route('get-validatorLihatNdaTkmNetra')}}"><i class="glyphicon glyphicon-user"></i> TKM NETRA </a></li>
                    <li class="{{isActiveRoute('get-validatorLihatNdaMitra')}}"><a href="{{route('get-validatorLihatNdaMitra')}}"><i class="glyphicon glyphicon-user"></i> Mitra
                        </a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
                'get-validatorBuatBerita','post-validatorBuatBerita','get-validatorEditBerita','post-validatorEditBerita',
                'get-validatorLihatBerita','get-validatorSetAktifBerita','get-validatorSetPasifBerita'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon glyphicon-asterisk"></i> <span>Berita SIMARU</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes(['get-validatorBuatBerita','post-validatorBuatBerita'])}}"><a
                                href="{{route('get-validatorBuatBerita')}}"><i
                                    class="glyphicon glyphicon-plus"></i>Buat Berita</a></li>
                    <li class="{{areActiveRoutes(['get-validatorEditBerita','post-validatorEditBerita','get-validatorLihatBerita','get-validatorSetAktifBerita','get-validatorSetPasifBerita'])}}"><a
                                href="{{route('get-validatorLihatBerita')}}"><i
                                    class="glyphicon glyphicon-list"></i>Lihat Berita</a></li>
                </ul>
            </li>
            <li>
                <a target="_blank" href="{{route('get-validatorLihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
</aside>