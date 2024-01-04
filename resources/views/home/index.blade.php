
@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row justify-content-center mt-4 mb-3">
        <div class="col-md-6">
            <form action="/">
                <!-- @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mobil.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-info border border-1 border-dark" type="submit" name="action" value="cari">Cari</button>
                    <!-- Add a line (separator) between buttons -->
                    <!-- <div class="input-group-append">
                        <span class="input-group-text" style="border-left: 1px solid #ddd;"></span>
                    </div> -->
                    <button class="btn btn-info border border-1 border-dark" type="submit" name="action" value="tersedia">Tersedia</button>
                </div>

            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($mobils as $mobil)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <!-- <div class="position-absolute bg-danger px-3 py-1 text-white">{{ $mobil->merek }}</div> -->
                        <div class="card-body">
                        <h5 class="card-title">{{ $mobil->merek }}</h5>
                        <h6>Model:  {{ $mobil->model }}</h6>
                        <p class="card-text">Tarif/hari: Rp. {{ $mobil->tarif_per_hari }},00</p>
                        <p class="card-text">Status : 
                            @php
                                $status = $mobil->status;
                                $status_name = App\Http\Controllers\DashboardMobilController::status_name($status);
                                echo $status_name;
                            @endphp
                        </p>
                        @if ($mobil->status==1)
                            <a href="/login" class="btn btn-primary">Sewa</a>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function redirectToTersediaPage() {
            window.location.href = '/home/tersedia';
        }
    </script>
   
@endsection