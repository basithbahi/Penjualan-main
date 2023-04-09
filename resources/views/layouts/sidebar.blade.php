<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-train"></i>
        </div>
        <div class="sidebar-brand-text mx-3">JESJESPOR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="nav-icon fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kereta') }}">
            <i class="nav-icon fas fa-user"></i>
            <span>Admin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kereta') }}">
            <i class="nav-icon fas fa-users"></i>
            <span>User</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kereta') }}">
            <i class="nav-icon fas fa-train"></i>
            <span>Kereta Api</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('gerbong') }}">
            <i class="nav-icon fas fa-trailer"></i>
            <span>Gerbong</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kursi') }}">
            <i class="nav-icon fas fa-couch"></i>
            <span>Kursi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kereta') }}">
            <i class="nav-icon fas fa-calendar"></i>
            <span>Jadwal Kereta Api</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('rute') }}">
            <i class="nav-icon fas fa-route"></i>
            <span>Rute</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('stasiun') }}">
            <i class="nav-icon fas fa-building"></i>
            <span>Stasiun</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kereta') }}">
            <i class="nav-icon fas fa-history"></i>
            <span>Transaksi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('metode_pembayaran') }}">
            <i class="nav-icon fas fa-wallet"></i>
            <span>Metode Pembayaran</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
