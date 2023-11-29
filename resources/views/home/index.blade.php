
@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

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
                            <a href="/mobils/{{ $mobil->id }}" class="btn btn-primary">Sewa</a>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   
@endsection