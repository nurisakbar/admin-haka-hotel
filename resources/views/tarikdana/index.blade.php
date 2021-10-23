@extends('layouts.app')
@section('title','Laporan Tarik Dana')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Tarik Dana</h6>
    </div>
    <div class="card-body">
        @include('alert')
        @if(Auth::user()->level!='administrator')
            <a href="/tarikdana/create" class="btn btn-danger">Input Transaksi Tarik Dana</a>
            <hr>
        @endif
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th>Karyawan</th>
                    <th>Nama Toko</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th width="70">#</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/tarikdana',
        columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            { data: 'toko.user.name', name: 'toko.user.name' },
            { data: 'toko.nama_toko', name: 'toko.nama_toko' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush


