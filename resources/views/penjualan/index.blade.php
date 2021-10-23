@extends('layouts.app')
@section('title','Laporan Penjualan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h6>
    </div>
    <div class="card-body">
        @include('alert')
        {!! Form::open(['url'=>'penjualan','method'=>'GET']) !!}
        <table class="table table-bordered">
            <tr>
                <td>Periode Awal</td>
                <td>
                    {!! Form::date('periode_awal', $periode_awal, ['class'=>'form-control periode_awal','placeholder'=>'Periode Awal']) !!}
                </td>
            </tr>
            <tr>
                <td>Periode Akhir</td>
                <td>
                    {!! Form::date('periode_akhir', $periode_akhir, ['class'=>'form-control periode_akhir','placeholder'=>'Periode Akhir']) !!}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="button" value="filter" class="btn btn-primary">Tampilkan</button>
                    <button type="submit" name="button" value="excel" class="btn btn-primary">Download Excel</button>
                    @if(Auth::user()->level!='administrator')
                        <a href="/penjualan/create" class="btn btn-danger">Input Penjualan</a>
                    @endif
                </td>
            </tr>
        </table>
        {!! Form::close() !!}
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th>Tanggal</th>
                    <th>Nama Toko</th>
                    <th>Nomor Pesanan</th>
                    <th>Nama Pembeli</th>
                    <th>Komisi 1%</th>
                    <th>Profit</th>
                    @if(Auth::user()->level!='administrator')
                        <th width="70">#</th>
                    @endif
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@if(Auth::user()->level!='administrator')
<script>
    $(function() {
        var periode_awal = $(".periode_awal").val();
        var periode_akhir = $(".periode_akhir").val();
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/penjualan?periode_awal='+periode_awal+'&periode_akhir='+periode_akhir,
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'tanggal', name: 'tanggal' },
                { data: 'toko.nama_toko', name: 'toko.nama_toko' },
                { data: 'nomor_pesanan', name: 'nomor_pesanan' },
                { data: 'nama_pembeli', name: 'nama_pembeli' },
                { data: 'komisi', name: 'komisi' },
                { data: 'profit', name: 'profit' },
                { data: 'action', name: 'action' }
            ]
        });
    });
    </script>
@else
<script>
    $(function() {
        var periode_awal = $(".periode_awal").val();
        var periode_akhir = $(".periode_akhir").val();
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/penjualan?periode_awal='+periode_awal+'&periode_akhir='+periode_akhir,
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'tanggal', name: 'tanggal' },
                { data: 'toko.nama_toko', name: 'toko.nama_toko' },
                { data: 'nomor_pesanan', name: 'nomor_pesanan' },
                { data: 'nama_pembeli', name: 'nama_pembeli' },
                { data: 'komisi', name: 'komisi' },
                { data: 'profit', name: 'profit' }
            ]
        });
    });
    </script>
@endif
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush


