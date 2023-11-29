@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-4">

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main class="form-signin">
      <!-- <div class="text-center">
        <img class="mb-4" src="../images/logo_iap.png" alt="" width="100" height="100">
      </div> -->
      <h1 class="h3 mb-4 fw-normal text-center times-larger">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <!-- <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email" class="times">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div> -->
        <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="John Doe" autofocus required value="{{ old('name') }}">
            <label for="name" class="times">Full Name</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password" class="times">Password</label>
        </div>
    
        
        <button class="w-100 btn btn-lg btn-primary mt-3 times" type="submit">Sign in</button>
        <!-- <small class="d-block text-center mt-3 times-small">Bukan admin? <a href="/">Go to home</a></small> -->
        <small class="d-block text-center mt-3 times-small">Not registered? <a href="/register">Register Now!</a></small>
        <small class="d-block text-center mt-3 times-small"><a href="/">Back to home</a></small>
        <p class="mt-5 mb-3 text-muted text-center times-small">&copy; RISMA RENTAL 2023</p>
        
      </form>
    </main>
  </div>
</div>

  <!--My Style CSS-->
  <link rel="stylesheet" href="../css/style.css">
@endsection