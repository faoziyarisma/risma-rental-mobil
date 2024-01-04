@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
            <h4>Detail Sewa</h4>
        </div>

        {{-- deskripsi --}}
        <p class="mb-3">Detail data sewa.</p>
        

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Sewa RENTAL RISMA dengan id {{ $order -> id }} 
            </div>
            <div class="card-body px-lg-3 mt-1">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tanggal Mulai:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $order->tgl_mulai }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Tanggal Selesai:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $order->tgl_selesai }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Merek :</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">
                        @php
                            $mobil_id = $order->mobil_id;
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
                        <p class="my-0 mx-3">Tarif:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">Rp. {{ $order->tarif }},00</p>
                    </div>
                </div>
                
            </div>
        </div>
        <a href="/dashboard/orders" class="btn btn-info text-dark rounded mt-2 mb-3 ms-auto" id="tombol4">Home</a>
    </div>
@endsection
