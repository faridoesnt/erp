<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link text-center">
    <span class="brand-text font-weight-light">ERP - System</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('app') }}" class="nav-link">
            <i class="nav-icon fas fa-solid fa-book"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-header">MASTER DATA</li>
        <li class="nav-item">
          <a href="{{ route('supervisor.index') }}" class="nav-link {{ (request()->is('dashboard/supervisor*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-book"></i>
            <p>
              Supervisor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('manager.index') }}" class="nav-link {{ (request()->is('dashboard/manager*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              Manager
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('karyawan.index') }}" class="nav-link {{ (request()->is('dashboard/karyawan*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Karyawan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link {{ (request()->is('dashboard/peminjaman')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-arrow-right"></i>
            <p>
              Absensi
            </p>
          </a>
        </li>
        <li class="nav-header">Organization</li>
        <li class="nav-item">
          <a href="{{ route('organization-supervisor-manager.index') }}" class="nav-link {{ (request()->is('dashboard/organization-supervisor-manager*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              Supervisor - Manager
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('organization-manager-karyawan.index') }}" class="nav-link {{ (request()->is('dashboard/organization-manager-karyawan*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manager - Karyawan
            </p>
          </a>
        </li>
        <li class="nav-header">SETTINGS</li>
        <li class="nav-item">
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right-from-bracket"></i>
              <p>Keluar</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>