@extends('dashboard.layouts.main')

@section('container')
    {{-- content --}}
    
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 bpengembalian-bottom">
            <h4>Pengembalian Mobil</h4>
        </div>

        {{-- informasi --}}
        <p class="mb-3">Mengembalikan mobil.</p>

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Form Pengembalian Mobil</h6>
            </div>
            <div class="card-body px-lg-3 mt-4">
                <form action="/dashboard/pengembalians" enctype="multipart/form-data" method="post">
                    @csrf
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
                            <p class="my-0 mx-3">Tarif:</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <p class="my-0 mx-3">Rp. {{ $pengembalian->tarif }},00</p>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary text-white me-md-4 my-3" type="submit">Sewa Mobil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection