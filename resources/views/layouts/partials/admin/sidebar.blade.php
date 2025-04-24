<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-bold">BLC Surabaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel  -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/Hero 1.png') }}" class="img-circle" alt="User Image">
            </div>
            {{-- <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div> --}}
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboardadmin') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <!--  Logout  -->
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-danger" style="background: none; border: none; width: 100%; text-align: left;">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </button>
            </form>
        </li>
            </ul>
        </nav>
    </div>
</aside>
