<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="superadmin"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Program Kerja</li><!-- /.menu-title -->
                    <li><a href="{{route('superadmin.perusahaan')}}"> <i class="menu-icon fa fa-truck"></i>Perusahaan</a></li>
                    <li><a href="{{route('superadmin.direksi')}}"> <i class="menu-icon fa fa-male"></i>Direksi</a></li>
                    <li><a href="{{route('superadmin.vp')}}"> <i class="menu-icon fa fa-user"></i>Vice President</a></li>
                    <li><a href="{{route('superadmin.dvp')}}"> <i class="menu-icon fa fa-user"></i>Deputy Vice President</a></li>

                    <li class="menu-title">Log Harian</li><!-- /.menu-title -->
                    <li><a href="{{route('superadmin.log.dvp')}}"> <i class="menu-icon fa fa-user"></i>Deputy Vice President</a></li>
                    <li><a href="{{route('superadmin.log.officer')}}"> <i class="menu-icon fa fa-user"></i>Officer / TNO</a></li>

                    <li class="menu-title">User Setting</li><!-- /.menu-title -->
                    <li><a href="{{route('superadmin.user')}}"> <i class="menu-icon fa fa-user"></i>User</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
