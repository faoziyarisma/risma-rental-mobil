@extends('layouts.main')

@section('container')
<div class="row justify-content-center isian-db">
    <div class="col-lg-4">
        <main class="form-registration">
            <form action="/register" method="post">
                <!-- <img class="mb-4 rounded mx-auto d-block" src="../image/logo_undip.jpg" alt="" width="80" height="90"> -->
                <h1 class="h3 mb-3 fw-normal text-center times-larger">Registration Form</h1>
                @csrf
                <!-- name -->
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top  @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                  <label for="name" class="times">Full Name</label>
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <!-- alamat -->
                <div class="form-floating">
                  <textarea class="form-control" id="alamat" name="alamat" required style="height: 100px">{{ old('alamat') }}</textarea>
                  <label for="alamat" class="times">Alamat</label>
                  @error('alamat')
                    <div class="small text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <!-- no. telepon -->
                <div class="form-floating">
                  <input type="text" name="no_telp" class="form-control rounded-top  @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Nomor Telepon" required value="{{ old('no_telp') }}">
                  <label for="no_telp" class="times">Nomor Telepon</label>
                  @error('no_telp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <!-- no. sim -->
                <div class="form-floating">
                  <input type="text" name="no_sim" class="form-control rounded-top  @error('no_sim') is-invalid @enderror" id="no_sim" placeholder="Nomor SIM" required value="{{ old('no_sim') }}">
                  <label for="no_sim" class="times">Nomor SIM</label>
                  @error('no_sim')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <!-- password -->
                <div class="form-floating">
                  <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                  <label for="password" class="times">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              <button class="w-100 btn btn-lg btn-primary mt-4 times" type="submit">Register</button>
              <small class="d-block text-center mt-3 times-small">Already registered? <a href="/login">Login</a></small>
              <p class="mt-4 mb-3 text-muted text-center times-small">&copy; RISMA RENTAL 2023</p>
            </form>
          </main>
    </div>
</div>


  <!--My Style CSS-->
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
@endsection