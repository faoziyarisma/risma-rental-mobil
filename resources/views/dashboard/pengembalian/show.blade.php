@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
            <h4>Detail Pengembalian</h4>
        </div>

        {{-- deskripsi --}}
        <p class="mb-3">Detail data pengembalian.</p>
        

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Data Pengembalian RENTAL RISMA dengan sewa id {{ $pengembalian -> id }} 
            </div>
            <div class="card-body px-lg-3 mt-1">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tanggal Mulai:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $pengembalian->tgl_mulai }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tanggal Selesai:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $pengembalian->tgl_selesai }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Merek :</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">
                        @php
                            $mobil_id = $pengembalian->mobil_id;
                            $merek_mobil = App\Http\Controllers\DashboardOrderController::merek_mobil($mobil_id);
                            echo $merek_mobil;
                        @endphp
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tarif per hari:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">Rp. {{ $tarif_per_hari }},00</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tarif Pembayaran:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">Rp. {{ $pengembalian->tarif }},00</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Status Pengembalian:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        @php
                            $status = $pengembalian->status_sewa;
                            $status_sewa_name = App\Http\Controllers\DashboardPengembalianController::status_sewa_name($status);
                            echo $status_sewa_name;
                        @endphp
                    </div>
                </div>
                
            </div>
        </div>
        <a href="/dashboard/pengembalians" class="btn btn-info text-dark rounded mt-2 mb-3 ms-auto" id="tombol4">Home</a>
    </div>
@endsection
