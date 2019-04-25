<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('img/iconUser.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ucwords(auth('user')->user()->nama)}}</p>
                <a href="#"><i class="glyphicon glyphicon-user"></i> {{ucwords(auth('user')->user()->role)}}</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{areActiveRoutes([
            'get-buatSuratMasuk', 'get-indexLihatSurat','get-indexExportSimaru',
            'get-detailSurat', 'get-indexEditSurat'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>SIMARU</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-buatSuratMasuk')}}"><a href="{{route('get-buatSuratMasuk')}}"><i
                                    class="glyphicon glyphicon-plus"></i> Buat SIMARU</a></li>
                    <li class="{{areActiveRoutes(['get-indexLihatSurat','get-detailSurat','get-indexEditSurat'])}}"><a
                                href="{{route('get-indexLihatSurat')}}"><i class="glyphicon glyphicon-th-list"></i>
                            Lihat SIMARU</a></li>
                    <li class="{{isActiveRoute('get-indexExportSimaru')}}"><a href="{{route('get-indexExportSimaru')}}"><i
                                    class="glyphicon glyphicon-open"></i> Export SIMARU</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-buatUser', 'get-buatUserPicTelkom','get-lihatUser','get-lihatUserPicTelkom',
            'get-editUser', 'get-editUserPicTelkom'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Kelola Pengguna</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-buatUser')}}"><a href="{{route('get-buatUser')}}"><i
                                    class="glyphicon glyphicon-plus"></i> Tambah Akun Security</a></li>
                    <li class="{{isActiveRoute('get-buatUserPicTelkom')}}"><a href="{{route('get-buatUserPicTelkom')}}"><i
                                    class="glyphicon glyphicon-plus"></i> Tambah Akun PIC Telkom</a></li>
                    <li class="{{areActiveRoutes(['get-lihatUser','get-editUser'])}}"><a
                                href="{{route('get-lihatUser')}}"><i class="glyphicon glyphicon-th-list"></i> Lihat Data
                            Security</a></li>
                    <li class="{{areActiveRoutes(['get-lihatUserPicTelkom','get-editUserPicTelkom'])}}"><a
                                href="{{route('get-lihatUserPicTelkom')}}"><i class="glyphicon glyphicon-th-list"></i>
                            Lihat Data PIC Telkom</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-buatPicTelkom','get-lihatPicTelkom','get-exportPicTelkom','get-editPicTelkom',
            'get-buatPicTelkomAkses','get-buatUnitTelkomAkses','get-lihatPicTelkomAkses','get-lihatUnitTelkomAkses','get-exportTelkomAkses','get-editUnitTelkomAkses','get-editPicTelkomAkses',
            'get-buatPicMitratel','get-buatUnitMitratel','get-lihatPicMitratel','get-lihatUnitMitratel','get-exportMitratel','get-editUnitMitratel','get-editPicMitratel',
            'get-buatPicSigma','get-buatUnitSigma','get-lihatPicSigma','get-lihatUnitSigma','get-exportSigma','get-editUnitSigma','get-editPicSigma',
            'get-buatPicTkmNetra','get-lihatPicTkmNetra','get-exportTkmNetra','get-editPicTkmNetra',
            'get-lihatPicMitra','get-exportMitra','get-editPicMitra'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-folder-open"></i> <span>Kelola Data PIC</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes(['get-buatPicTelkom','get-lihatPicTelkom','get-exportPicTelkom','get-editPicTelkom'])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-buatPicTelkom')}}"><a href="{{route('get-buatPicTelkom')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah </a></li>
                            <li class="{{areActiveRoutes(['get-lihatPicTelkom','get-editPicTelkom'])}}"><a
                                        href="{{route('get-lihatPicTelkom')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat </a></li>
                            <li class="{{isActiveRoute('get-exportPicTelkom')}}"><a
                                        href="{{route('get-exportPicTelkom')}}"><i class="glyphicon glyphicon-open"></i>
                                    Export Data</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-buatPicTelkomAkses','get-buatUnitTelkomAkses','get-lihatPicTelkomAkses','get-lihatUnitTelkomAkses','get-exportTelkomAkses','get-editUnitTelkomAkses','get-editPicTelkomAkses',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Telkom Akses
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-buatPicTelkomAkses')}}"><a
                                        href="{{route('get-buatPicTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-buatUnitTelkomAkses')}}"><a
                                        href="{{route('get-buatUnitTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-lihatPicTelkomAkses','get-editPicTelkomAkses'])}}"><a
                                        href="{{route('get-lihatPicTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-lihatUnitTelkomAkses','get-editUnitTelkomAkses',])}}"><a
                                        href="{{route('get-lihatUnitTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-exportTelkomAkses')}}"><a
                                        href="{{route('get-exportTelkomAkses')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>

                    <li class="{{areActiveRoutes([
                    'get-buatPicMitratel','get-buatUnitMitratel','get-lihatPicMitratel','get-lihatUnitMitratel','get-exportMitratel','get-editUnitMitratel','get-editPicMitratel',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Mitratel
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-buatPicMitratel')}}"><a
                                        href="{{route('get-buatPicMitratel')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-buatUnitMitratel')}}"><a
                                        href="{{route('get-buatUnitMitratel')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-lihatPicMitratel','get-editPicMitratel'])}}"><a
                                        href="{{route('get-lihatPicMitratel')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-lihatUnitMitratel','get-editUnitMitratel',])}}"><a
                                        href="{{route('get-lihatUnitMitratel')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-exportMitratel')}}"><a
                                        href="{{route('get-exportMitratel')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>

                    <li class="{{areActiveRoutes([
                    'get-buatPicSigma','get-buatUnitSigma','get-lihatPicSigma','get-lihatUnitSigma','get-exportSigma','get-editUnitSigma','get-editPicSigma',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> SIGMA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-buatPicSigma')}}"><a href="{{route('get-buatPicSigma')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Petugas </a></li>
                            <li class="{{isActiveRoute('get-buatUnitSigma')}}"><a href="{{route('get-buatUnitSigma')}}"><i
                                            class="glyphicon glyphicon-plus"></i> Tambah Unit </a></li>
                            <li class="{{areActiveRoutes(['get-lihatPicSigma','get-editPicSigma'])}}"><a
                                        href="{{route('get-lihatPicSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-lihatUnitSigma','get-editUnitSigma'])}}"><a
                                        href="{{route('get-lihatUnitSigma')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Unit </a></li>
                            <li class="{{isActiveRoute('get-exportSigma')}}"><a href="{{route('get-exportSigma')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-buatPicTkmNetra','get-lihatPicTkmNetra','get-exportTkmNetra','get-editPicTkmNetra',
                    ])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> TKM NETRA
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{isActiveRoute('get-buatPicTkmNetra')}}"><a
                                        href="{{route('get-buatPicTkmNetra')}}"><i class="glyphicon glyphicon-plus"></i>
                                    Tambah Petugas </a></li>
                            <li class="{{areActiveRoutes(['get-lihatPicTkmNetra','get-editPicTkmNetra'])}}"><a
                                        href="{{route('get-lihatPicTkmNetra')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-exportTkmNetra')}}"><a
                                        href="{{route('get-exportTkmNetra')}}"><i class="glyphicon glyphicon-open"></i>
                                    Export Data Petugas</a></li>
                        </ul>
                    </li>
                    <li class="{{areActiveRoutes(['get-lihatPicMitra','get-exportMitra','get-editPicMitra'])}} treeview">
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Mitra
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{areActiveRoutes(['get-lihatPicMitra','get-editPicMitra'])}}"><a
                                        href="{{route('get-lihatPicMitra')}}"><i
                                            class="glyphicon glyphicon-th-list"></i> Lihat Petugas </a></li>
                            <li class="{{isActiveRoute('get-exportMitra')}}"><a href="{{route('get-exportMitra')}}"><i
                                            class="glyphicon glyphicon-open"></i> Export Data Petugas</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{areActiveRoutes(['get-lihatNdaTelkomAkses','get-lihatNdaMitratel','get-lihatNdaSigma','get-lihatNdaMitra','get-indexUploadNda','get-lihatNdaTkmNetra'])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-file"></i> <span>Kelola Berkas NDA</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{isActiveRoute('get-lihatNdaTelkomAkses')}}"><a
                                href="{{route('get-lihatNdaTelkomAkses')}}"><i class="glyphicon glyphicon-user"></i>
                            Telkom Akses </a></li>
                    <li class="{{isActiveRoute('get-lihatNdaMitratel')}}"><a
                                href="{{route('get-lihatNdaMitratel')}}"><i class="glyphicon glyphicon-user"></i>
                            Mitratel </a></li>
                    <li class="{{isActiveRoute('get-lihatNdaSigma')}}"><a href="{{route('get-lihatNdaSigma')}}"><i
                                    class="glyphicon glyphicon-user"></i> SIGMA </a></li>
                    <li class="{{isActiveRoute('get-lihatNdaTkmNetra')}}"><a href="{{route('get-lihatNdaTkmNetra')}}"><i
                                    class="glyphicon glyphicon-user"></i> TKM NETRA </a></li>
                    <li class="{{isActiveRoute('get-lihatNdaMitra')}}"><a href="{{route('get-lihatNdaMitra')}}"><i
                                    class="glyphicon glyphicon-user"></i> Mitra </a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
                'get-buatBerita','post-buatBerita','get-editBerita','post-editBerita',
                'get-lihatBerita','get-setAktifBerita','get-setPasifBerita'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon glyphicon-asterisk"></i> <span>Berita SIMARU</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes(['get-buatBerita','post-buatBerita'])}}"><a
                                href="{{route('get-buatBerita')}}"><i
                                    class="glyphicon glyphicon-plus"></i>Buat Berita</a></li>
                    <li class="{{areActiveRoutes(['get-editBerita','post-editBerita','get-lihatBerita','get-setAktifBerita','get-setPasifBerita'])}}"><a
                                href="{{route('get-lihatBerita')}}"><i
                                    class="glyphicon glyphicon-list"></i>Lihat Berita</a></li>
                </ul>
            </li>
            <li>
                <a target="_blank" href="{{route('get-LihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
</aside>