@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid isian-db">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Data Pengembalian Mobil RENTAL RISMA</h4>
    </div>
    {{-- deskripsi --}}
    <p class="mb-3">Daftar data pengembalian mobil RENTAL RISMA terdaftar.</p>

    @if (session()->has('success'))
        <div class="alert alert-success py-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- <a href="/dashboard/pengembalians/create" class="btn btn-info text-dark py-2 px-2 rounded mb-4">Kembalikan mobil</a> -->

    {{-- Daftar mobil terdaftar --}}
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="my-2 table-name">Pengembalian Mobil RENTAL RISMA</h6>
        </div>

        <div class="card-body">
            
            <div class="table-responsive mt-3">
                <table class="table table bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SewaId</th>
                            <th>Merek</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status Pengembalian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pengembalians)>0)
                            @foreach ($pengembalians as $pengembalian)
                                <tr>
                                    <td>{{ $pengembalian->id }}</td>
                                    <td>
                                        @php
                                            $mobil_id = $pengembalian->mobil_id;
                                            $merek_mobil = App\Http\Controllers\DashboardOrderController::merek_mobil($mobil_id);
                                            echo $merek_mobil;
                                        @endphp
                                        <!-- {{ $pengembalian->mobil_id }} -->
                                    </td>
                                    <td>{{ $pengembalian->tgl_mulai }}</td>
                                    <td>{{ $pengembalian->tgl_selesai }}</td>
                                    <td>
                                        @php
                                            $status = $pengembalian->status_sewa;
                                            $status_sewa_name = App\Http\Controllers\DashboardPengembalianController::status_sewa_name($status);
                                            echo $status_sewa_name;
                                        @endphp
                                    </td>
                                    <td>
                                        @if ($pengembalian->user_id == $auth_id && $pengembalian->status_sewa==0)
                                            <a href="/dashboard/pengembalians_form/{{ $pengembalian->id }}" class="badge bg-info"  style="text-decoration: none; color: black;"> <span>Kembalikan Mobil</span></a>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6" style="text-align:center">Data peminjaman mobil tidak ditemukan!</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="pagination-block d-flex justify-content-end">
                    {{ $pengembalians->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <style>
    /* Add hover effect */
    .badge.bg-info:hover {
        background-color: #007bff; /* Change the color to your preferred hover color */
        color: #fff; /* Change the text color to your preferred hover text color */
    }
</style> -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
@endsection