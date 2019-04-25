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
                <a href="#"><i class="glyphicon glyphicon-user"></i> PIC Telkom</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{areActiveRoutes([
            'get-picTelkomIndexLihatSurat','get-picTelkomDetailSurat'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>SIMARU</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-picTelkomIndexLihatSurat','get-picTelkomDetailSurat',
                    ])}}"><a href="{{route('get-picTelkomIndexLihatSurat')}}"><i class="glyphicon glyphicon-th-list"></i> Lihat SIMARU</a></li>
                </ul>
            </li>

            <li class="{{areActiveRoutes([
            'get-picTelkomIndexLihatSuratKeluar','get-picTelkomDetailSuratKeluar'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>Surat Keluar Barang</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-picTelkomBuatSuratKeluar','get-picTelkomBuatSuratKeluar',
                    ])}}"><a href="{{route('get-picTelkomBuatSuratKeluar')}}"><i class="glyphicon glyphicon-plus"></i> Buat Surat Keluar Barang</a></li>
                    <li class="{{areActiveRoutes(['get-picTelkomIndexLihatSuratKeluar','get-picTelkomDetailSuratKeluar','get-picTelkomIndexEditSuratKeluar'])}}"><a
                    href="{{route('get-picTelkomIndexLihatSuratKeluar')}}"><i class="glyphicon glyphicon-th-list"></i>
                    Lihat Surat Keluar Barang</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-picTelkomLogPetugas','get-picTelkomLogPetugasExtend','get-picTelkomLihatPesanExtend'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Log Petugas</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes(['get-picTelkomLogPetugas'])}}"><a href="{{route('get-picTelkomLogPetugas')}}"><i class="glyphicon glyphicon-th-list"></i> Log Petugas</a></li>
                    <li class="{{areActiveRoutes(['get-picTelkomLogPetugasExtend','get-picTelkomLihatPesanExtend'])}}"><a href="{{route('get-picTelkomLogPetugasExtend')}}"><i class="glyphicon glyphicon-time"></i> Log Petugas Extend</a></li>
                </ul>
            </li>
            <li>
                <a target="_blank" href="{{route('get-picTelkomLihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
