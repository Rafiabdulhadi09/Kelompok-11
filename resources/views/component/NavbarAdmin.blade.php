<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Kelas <sup>Online</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/DataUser', 'admin/Data-trainer', 'admin/DataKelas') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="{{ request()->is('admin/DataUser', 'admin/Data-trainer', 'admin/DataKelas') ? 'true' : 'false' }}" 
            aria-controls="collapseData">
            <i class="fas fa-fw fa-database"></i>
            <span>Data</span>
        </a>
        <div id="collapseData" class="collapse {{ request()->is('admin/DataUser', 'admin/Data-trainer', 'admin/DataKelas') ? 'show' : '' }}" 
             aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <h6 class="collapse-header text-primary">Manage Data</h6>
                <a class="collapse-item {{ request()->is('admin/DataUser') ? 'active bg-primary text-white' : '' }}" 
                   href="{{ url('admin/DataUser') }}">
                    <i class="fas fa-users mr-2"></i>Data User
                </a>
                <a class="collapse-item {{ request()->is('admin/Data-trainer') ? 'active bg-primary text-white' : '' }}" 
                   href="{{ url('admin/Data-trainer') }}">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Data Trainer
                </a>
                <a class="collapse-item {{ request()->is('admin/DataKelas') ? 'active bg-primary text-white' : '' }}" 
                   href="{{ url('admin/DataKelas') }}">
                    <i class="fas fa-book mr-2"></i>Data Kursus
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Data Pembelian -->
    <!-- Nav Item - Data Pembelian -->
    <li class="nav-item {{ request()->is('admin/data-pembelian') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/data-pembelian') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Data Pembelian</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->is('admin/data-pembelian') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.setting')}}">
            <i class="fa-solid fa-gear"></i>
            <span>Setings</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Search -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow ">
                <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                            <b class=>Logout</b>
                        </a>
                    <!-- Dropdown - User Information -->
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
