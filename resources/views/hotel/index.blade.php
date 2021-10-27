@extends('layouts.app')
@section('title','Kelola Data Pegawai')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Hotel</h6>
    </div>
    <div class="card-body">
        @include('alert')
            <a href="hotel/create" class="btn btn-danger">Tambah Data Hotel</a>
        <hr>
        <table class="table table-bordered" id="hotels-table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Hotel</th>
                    <th>Alamat</th>
                    <th>Tag Alamat</th>
                    <th>Daerah</th>
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
        $('#hotels-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{env('API_HOST')}}/hotel?type=datatables",
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name' },
                { data: 'address', name: 'address' },
                { data: 'address_tag', name: 'address_tag' },
                { data: 'regency.name', name: 'regency.name' },
                { data: 'action', name: 'action' }
            ]
        });
    });
</script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush
