<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard.index') }}" class="brand-link">
    <img src="{{ url('/assets/images/logo.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light school-name-in-short">E Service</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url(auth()->user()->image ? '/uploads/users/' . auth()->user()->image : '/assets/dist/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item @if((in_array(Route::currentRouteName(), [ 'dashboard.index' ]))) menu-open @endif">
          <a href="{{ route('dashboard.index') }}" class="nav-link @if(Route::currentRouteName() == 'dashboard.index') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        @if(auth()->user()->is_admin)
          <li class="nav-item @if((in_array(Route::currentRouteName(), [ 'user.index', 'user.create' ]))) menu-open @endif">
            <a href="#" class="nav-link @if((in_array(Route::currentRouteName(), [ 'user.index', 'user.create', 'user.edit', 'user.trash' ]))) active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link @if(Route::currentRouteName() == 'user.index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link @if(Route::currentRouteName() == 'user.create') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        <li class="nav-item @if((in_array(Route::currentRouteName(), [ 'visa.index', 'visa.create' ]))) menu-open @endif">
          <a href="#" class="nav-link @if((in_array(Route::currentRouteName(), [ 'visa.index', 'visa.create', 'visa.edit' ]))) active @endif">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Visas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('visa.index') }}" class="nav-link @if(Route::currentRouteName() == 'visa.index') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('visa.create') }}" class="nav-link @if(Route::currentRouteName() == 'visa.create') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @if((in_array(Route::currentRouteName(), [ 'manual-visa.index', 'manual-visa.create' ]))) menu-open @endif">
          <a href="#" class="nav-link @if((in_array(Route::currentRouteName(), [ 'manual-visa.index', 'manual-visa.create', 'manual-visa.edit' ]))) active @endif">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Manual Visas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('manual-visa.index') }}" class="nav-link @if(Route::currentRouteName() == 'manual-visa.index') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('manual-visa.create') }}" class="nav-link @if(Route::currentRouteName() == 'manual-visa.create') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>