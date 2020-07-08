{{-- @php
    $prefix = Request::route()->getPrefix();
    // $route = Request::current()->getName();
    $route = Request::route();
@endphp
@dd($route) --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Commerce</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" title="Got to Profile">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {{-- Category --}}
        <li class="nav-item has-treeview @yield('open-category')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
              Manage Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link @yield('active-category-all')">
                {{-- <i class="fas fa-arrow-right nav-icon"></i> --}}
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Category</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Brands --}}
        <li class="nav-item has-treeview @yield('open-brand')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-copyright"></i>
            <p>
              Manage Brands
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('brands.index') }}" class="nav-link @yield('active-brand')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Brands</p>
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