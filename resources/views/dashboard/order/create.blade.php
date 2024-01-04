@extends('dashboard.layouts.main')

@section('container')
    {{-- content --}}
    
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
            <h4>Sewa Mobil</h4>
        </div>

        {{-- informasi --}}
        <p class="mb-3">Menyewa mobil.</p>

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Form Sewa Mobil</h6>
            </div>
            <div class="card-body px-lg-3 mt-4">
                <form action="/dashboard/orders" enctype="multipart/form-data" method="post">
                    @csrf
                    <!-- Tanggal Mulai -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Tanggal Mulai</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user @error('tgl_mulai') is-invalid @enderror" type="date" id="tgl_mulai" name="tgl_mulai"
                                value="{{ old('tgl_mulai') }}" required autofocus>
                            @error('tgl_mulai')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- Tanggal Selesai -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Tanggal pengajuan</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user @error('tgl_selesai') is-invalid @enderror" type="date" id="tgl_selesai" name="tgl_selesai"
                                value="{{ old('tgl_selesai') }}" required autofocus>
                            @error('tgl_selesai')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- mobil yang disewa -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Mobil yang Disewa</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <select name="mobil_id" id="mobil_id" class="form-select">
                                <option selected>Pilih mobil</option>
                                @foreach($mobils as $mobil)
                                    <option value="{{ $mobil->id }}">{{ $mobil->merek }}</option>
                                @endforeach
                            </select>
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