<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-info sidebar collapse bg-opacity-25">
    <div class="position-sticky pt-4 mt-4 mx-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            {{-- <span data-feather="home"></span>
            Dashboard --}}
            {{-- <i class="bi bi-layout-text-window-reverse"></i><label class="sidebar-title"> Dashboard</label> --}}
            <span><i class="bi bi-layout-text-window-reverse"></i> Dashboard</span>
          </a>
        </li>
        <!-- Divider -->
        <hr class="dropdown-divider mx-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mobils*') ? 'active' : '' }}" href="/dashboard/mobils">
            <span><i class="bi bi-card-list"></i> Data Mobil</span>
          </a>
        </li>
        <!-- Divider -->
        <hr class="dropdown-divider mx-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/orders*') ? 'active' : '' }}" href="/dashboard/orders">
            <span><i class="bi bi-credit-card"></i> Transaksi</span>
          </a>
        </li>
        <!-- Divider -->
        <hr class="dropdown-divider mx-2">
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="shopping-cart"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
          </a>
        </li> --}}
      </ul>

      {{-- @can('admin')
        
        <h6 class="sidebar-heading d-flex justify-contetnt-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Post Categories
            </a>
          </li>
        </ul>
      @endcan --}}

      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul> --}}
    </div>
  </nav>