@extends('dashboard.layouts.main')

@section('container')
    {{-- content --}}
    
    <div class="container-fluid isian-db">
        {{-- heading --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
            <h4>Tambah Mobil</h4>
        </div>

        {{-- informasi --}}
        <p class="mb-3">Menambah mobil.</p>

        {{-- form --}}
        <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">Form Tambah Mobil</h6>
            </div>
            <div class="card-body px-lg-3 mt-4">
                <form action="/dashboard/mobils" enctype="multipart/form-data" method="post">
                    @csrf
                    <!-- merek -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Merek</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user @error('merek') is-invalid @enderror" type="text" id="merek" name="merek"
                                value="{{ old('merek') }}" autofocus>
                            @error('merek')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- model -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Model</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user @error('model') is-invalid @enderror" type="text" id="model" name="model"
                                value="{{ old('model') }}" autofocus>
                            @error('model')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- nomor plat -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
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
                    <!-- tarif sewa per hari -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <p class="my-0 mx-3">Tarif per hari</p>
                            <p class="small text-danger mb-2 mx-3">*required</p>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input class="form-control form-control-user" type="number" id="tarif_per_hari" name="tarif_per_hari"
                                value="{{ old('tarif_per_hari') }}" required>
                            @error('tarif_per_hari')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div id="user_id" style="display: none;" name="user_id" class="col-md-3 col-sm-12" value="{{ auth()->user()->id }}">
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary text-white me-md-4 my-3" type="submit">Add Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection