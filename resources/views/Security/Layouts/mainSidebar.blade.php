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
                <a href="#"><i
                            class="glyphicon glyphicon-user"></i> {{ucwords(auth('user')->user()->role)}}  {{ucwords(auth('user')->user()->lokasi->lokasi)}}
                </a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{areActiveRoutes([
            'get-securityIndexCariPicMitra','get-securityIndexCariNoSimaru','get-securityCariPicMitra','get-securityCariNoSimaru','get-securityDetailSurat'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon glyphicon-zoom-in"></i> <span>Pencarian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes(['get-securityIndexCariPicMitra','get-securityCariPicMitra'])}}"><a href="{{route('get-securityIndexCariPicMitra')}}"><i
                                    class="glyphicon glyphicon-user"></i>Berdasarkan Nama</a></li>
                    <li class="{{areActiveRoutes(['get-securityIndexCariNoSimaru','get-securityCariNoSimaru'])}}"><a href="{{route('get-securityIndexCariNoSimaru')}}"><i
                                    class="glyphicon glyphicon-envelope"></i>Berdasarkan No Simaru</a></li>
                </ul>
            </li>
            <li class="{{areActiveRoutes([
            'get-securityLogBelumTerselesaikan','get-securityIndexExtendLog','get-securityIndexBeriExtend','get-securityLihatPesanExtend'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-list-alt"></i> <span>Log Masuk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                    'get-securityLogBelumTerselesaikan','get-securityIndexBeriExtend'
                    ])}}">
                        <a href="{{route('get-securityLogBelumTerselesaikan')}}">
                            <i class="glyphicon glyphicon-pushpin"></i> <span>Log Belum Terselesaikan</span>
                        </a>
                    </li>
                    <li class="{{areActiveRoutes([
                    'get-securityIndexExtendLog','get-securityLihatPesanExtend'
                    ])}}">
                        <a href="{{route('get-securityIndexExtendLog')}}">
                            <i class="glyphicon glyphicon-time"></i> <span>Log Extends</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{areActiveRoutes(['get-securityIndexLogBook','get-securityLihatLogBook'])}}">
                <a href="{{route('get-securityIndexLogBook')}}">
                    <i class="glyphicon glyphicon glyphicon-book"></i> <span>Log Book</span>
                </a>
            </li>




             <li class="{{areActiveRoutes([
            'get-securityIndexLihatSuratKeluar'
            ])}} treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-envelope"></i> <span>Surat Keluar Barang</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{areActiveRoutes([
                     'get-securityIndexLihatSuratKeluar',
                    ])}}"><a href="{{route('get-securityIndexLihatSuratKeluar')}}"><i class="glyphicon glyphicon-th-list"></i> Lihat Surat Keluar</a></li>
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
                <a target="_blank" href="{{route('get-securityLihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>