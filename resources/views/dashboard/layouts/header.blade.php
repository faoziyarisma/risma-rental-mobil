    
<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 shadow header">
    {{-- <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 bg-white">
        <i class="fa fa-bars"></i>
    </button> --}}
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4 fs-4 text-dark times-larger" href="/dashboard">RISMA RENTAL</a>
  {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> --}}
  {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
  <div class="me-6 times-small">
    Welcome back, {{ auth()->user()->name }}
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 text-dark border border-2 blue rounded ms-auto me-3">Logout <i class="bi bi-box-arrow-in-right"></i></button>
      </form>
    </div>
  </div>


</header>