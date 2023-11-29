 <!--Navbar-->
 <nav class="navbar navbar-expand-lg mb-5 navbar-light bg-info bg-gradient">
    <div class="container">
      <a class="navbar-brand fs-5 fw-bold times" href="/">RISMA RENTAL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- {{-- @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->job_title }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
      @else
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="/" class="nav-link fw-bold"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        </ul>
      @endauth --}} -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      </ul>
    </div>
  </nav>