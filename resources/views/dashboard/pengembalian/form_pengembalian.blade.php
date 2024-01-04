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
                <form action="/dashboard/pengembalians/update_status" enctype="multipart/form-data" method="post">
                    @csrf
                    <input class="form-control form-control-user @error('order_id') is-invalid @enderror" type="text" id="order_id" name="order_id"
                                value="{{ $pengembalian->id }}" style="display: none;">
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
                            <input class="form-control form-control-user @error('mobil_id') is-invalid @enderror" type="text" id="mobil_id" name="mobil_id"
                                value="{{ $pengembalian->mobil_id }}" style="display: none;">
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
                    <!-- nomor plat -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-12">
                            <p class="my-0 mx-3">Nomor Plat</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user @error('no_plat') is-invalid @enderror" type="text" id="no_plat" name="no_plat"
                                value="{{ old('no_plat') }}" autofocus>
                            @error('no_plat')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <p class="mx-4" id="note" name="note" style="display:none">Nomor Plat tidak sesuai!</p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary text-white me-md-4 my-3" id="final" type="submit">Kembalikan Mobil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#no_plat', function() {
                var no_plat = $(this).val();
                var mobil_id = parseInt($('#mobil_id').val());

                $.ajax({ 
                    type: 'GET', 
                    url:  '{{ route('validate_NoPlat') }}', 
                    data: { no_plat: no_plat, mobil_id: mobil_id }, 
                    async:false, 
                    dataType: 'json', 
                    success: function (data) { 
                        result=data; 
                    },
                    error: function(error) {
                        console.error('Error validate no_plat:', error);
                    }
                });
    
                var valid = parseInt(result);
                if(valid==0){
                    $('#final').css({
                        "pointer-events" : "none",
                    });
                    $('#note').css({
                        "display": "inline",
                        "color": "red"
                    });
                }
                else{
                    $('#final').css({
                        "pointer-events" : "auto",
                    });
                    $('#note').css({
                        "display": "none"
                    });
                }
    
            });
        });
    </script>
@endsection