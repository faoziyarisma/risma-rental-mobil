@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
            <h4>Detail Mobil</h4>
        </div>

        {{-- deskripsi --}}
        <p class="mb-3">Detail data mobil.</p>
        

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Mobil RENTAL RISMA dengan id {{ $mobil -> id }} 
            </div>
            <div class="card-body px-lg-3 mt-1">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Merek :</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $mobil -> merek }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Model:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $mobil->model }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Nomor Plat:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $mobil->no_plat }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tarif per hari:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $mobil->tarif_per_hari }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Status:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">
                            @php
                                $status = $mobil->status;
                                $status_name = App\Http\Controllers\DashboardMobilController::status_name($status);
                                echo $status_name;
                            @endphp
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a href="/dashboard/mobils" class="btn btn-info text-dark rounded mt-2 mb-3 ms-auto" id="tombol4">Home</a>
    </div>
@endsection
