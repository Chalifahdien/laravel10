<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="../img/tolak.png" alt="Logo Tolak" style="width: 45px">
        </div>
        <div class="sidebar-brand-text mx-3">TOLAK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna</span>
        </a>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('request', 'ongoing', 'history', 'detail*','pekerjaan*') ? 'active' : '' }} ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pekerjaan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('request') ? 'active' : '' }}" href="/request">Permintaan</a>
                <a class="collapse-item {{ Request::is('ongoing') ? 'active' : '' }}" href="/ongoing">Berjalan</a>
                <a class="collapse-item {{ Request::is('history') ? 'active' : '' }}" href="/history">Riwayat</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
   

    <!-- Nav Item - Charts -->
  

    <!-- Nav Item - Tables -->
   

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
