@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid isian-db">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back in RENTAL MOBIL RISMA</h1>
        {{-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> --}}
      </div>
      <div class="card shadow my-4 w-75">
            <div class="card-header py-2">
                <h6 class="my-2 bg-light table-name">My Profile 
            </div>
            <div class="card-body px-lg-3 mt-1">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Nama :</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $user -> name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Alamat:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $user->alamat }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Nomor Telepon:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $user->no_telp }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <p class="my-0 mx-3">Nomor SIM:</p>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <p class="my-0 mx-3">{{ $user->no_sim }}</p>
                    </div>
                </div>
            </div>
            <!-- <a href="/dashboard/edit_profile" class="btn btn-info text-dark rounded mx-3 mt-2 mb-3 ms-auto justify-content-md-end" id="tombol4">Edit Profile</a> -->
        </div>
</div>
@endsection