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

        {{-- Customer --}}
        <li class="nav-item has-treeview @yield('open-customer')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manage Customer
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('customer.list') }}" class="nav-link @yield('active-customer')">
                {{-- <i class="fas fa-arrow-right nav-icon"></i> --}}
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Customer</p>
              </a>
            </li>
          </ul>
        </li>
        
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
            <li class="nav-item ml-4">
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
              Manage Brand
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('brands.index') }}" class="nav-link @yield('active-brand')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Brands</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Colors --}}
        <li class="nav-item has-treeview @yield('open-color')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-palette"></i>
            <p>
              Manage Color
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('colors.index') }}" class="nav-link @yield('active-color')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Colors</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Sizes --}}
        <li class="nav-item has-treeview @yield('open-size')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-compress-alt"></i>
            <p>
              Manage Size
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('sizes.index') }}" class="nav-link @yield('active-size')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Sizer</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Product --}}
        <li class="nav-item has-treeview @yield('open-product')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              Manage Product
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('products.index') }}" class="nav-link @yield('active-product')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>View Products</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Order --}}
        <li class="nav-item has-treeview @yield('open-order')">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
            <p>
              Manage Order
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-4">
              <a href="{{ route('pending.list') }}" class="nav-link @yield('active-pending')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>Pending Order</p>
              </a>
            </li>
            <li class="nav-item ml-4">
              <a href="{{ route('approved.list') }}" class="nav-link @yield('active-approved')">
                <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                <p>Approved Order</p>
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