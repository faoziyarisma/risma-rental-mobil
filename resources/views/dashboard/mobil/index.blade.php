@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid isian-db">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Data Mobil RENTAL RISMA</h4>
    </div>
    {{-- deskripsi --}}
    <p class="mb-3">Daftar data mobil RENTAL RISMA terdaftar.</p>

    @if (session()->has('success'))
        <div class="alert alert-success py-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/mobils/create" class="btn btn-info text-dark py-2 px-2 rounded mb-4">+ Tambah mobil</a>

    {{-- Daftar mobil terdaftar --}}
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="my-2 table-name">Mobil RENTAL RISMA</h6>
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <div class="col-md-4 ms-auto">
                    <form action="/dashboard/mobils">
                        <div class="input-group my-2">
                            <input type="text" class="form-control" placeholder="mobilname" name="search" value="{{ request('search') }}">
                            <button class="btn btn-info text-dark" type="submit" id="button-addon2">Cari mobil</button>
                        </div>
                    </form>
                </div>
            </div> --}}
            
            <div class="table-responsive mt-3">
                <table class="table table bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($mobils)>0)
                            @foreach ($mobils as $mobil)
                                <tr>
                                    <td>{{ $mobil->id }}</td>
                                    <td>{{ $mobil->merek }}</td>
                                    <td>{{ $mobil->model }}</td>
                                    <td>
                                        @php
                                            $status = $mobil->status;
                                            $status_name = App\Http\Controllers\DashboardMobilController::status_name($status);
                                            echo $status_name;
                                        @endphp
                                    </td>
                                    <!-- <td>{{$mobil->user_id}}</td> -->
                                    <td>
                                        <a href="/dashboard/mobils/{{ $mobil->id }}" class="badge bg-info"><span><i class="bi bi-eye"></i></span></a>
                                        <a href="/dashboard/mobils/{{ $mobil->id }}/edit" class="badge bg-warning"><span><i class="bi bi-pencil"></i></span></a>
                                        <form action="/dashboard/mobils/{{ $mobil->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span><i class="bi bi-trash-fill"></i></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6" style="text-align:center">Mobil tidak ditemukan!</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="pagination-block d-flex justify-content-end">
                    {{ $mobils->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
@endsection