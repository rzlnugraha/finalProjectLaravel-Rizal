<!-- Logo -->
<a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Lolokeran</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Sentinel::getUser()->first_name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.dataUser') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.userHapus') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Tidak Aktif</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('company.index') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Perusahaan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Job
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('jobs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Job</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tipejob.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Job</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>