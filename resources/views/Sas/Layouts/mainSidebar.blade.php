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
                <a href="#"><i class="glyphicon glyphicon-user"></i> Personil SAS</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <li>
                <a href="{{route('sas-home')}}">
                    <i class="glyphicon glyphicon-envelope"></i> <span>SIMARU</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="{{route('get-sasLihatSOP')}}">
                    <i class="glyphicon glyphicon-flag"></i> <span>Dokumen SOP</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>