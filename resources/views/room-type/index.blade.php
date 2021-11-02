@extends('layouts.app')
@section('title','Kelola Data Tipe Ruangan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Tipe Ruangan</h6>
    </div>
    <div class="card-body">
        @include('alert')
        <hr>
        <table class="table table-bordered" id="hotels-table">
            <thead>
                <tr>
                    <th width="50">Nomor</th>
                    <th>Nama Hotel</th>
                    <th width="100">#</th>
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
            ajax: "{{env('API_HOST')}}/hotel?room=type",
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action' }
            ]
        });
    });
</script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush
