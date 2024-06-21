<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="../img/tolak.png" alt="Logo Tolak" style="width: 45px">
        </div>
        <div class="sidebar-brand-text mx-3">TOLAK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('ajukan', 'ambil*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pekerjaan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('ajukan') ? 'active' : '' }}" href="/ajukan">Ajukan
                    Pekerjaan</a>
                <a class="collapse-item {{ Request::is('ambil') ? 'active' : '' }}" href="/ambil">Ambil
                    Pekerjaan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    



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
<!-- End of Sidebar -->
