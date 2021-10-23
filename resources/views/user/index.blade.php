@extends('layouts.app')
@section('title','Kelola Data Pegawai')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Pegawai</h6>
    </div>
    <div class="card-body">
        @include('alert')
            <a href="/user/create" class="btn btn-danger">Tambah Data Pegawai</a>
        <hr>
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th width="10">Nomor</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th width="60">#</th>
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
            ajax: '/user',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action' }
            ]
        });
    });
</script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush
