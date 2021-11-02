@extends('layouts.app')
@section('title','Detail Fasilitas')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Tipe Ruangan <strong>{{ $roomType['hotel'] }}</strong></h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td width="140">Tipe Ruangan</td>
                <td width="270" align="right">:</td>
                <th>{{ $roomType['name'] }}</th>
            </tr>
            <tr>
                <td>Harga</td>
                <td align="right">:</td>
                <th>Rp. {{ number_format($roomType['price']) }}</th>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td align="right">:</td>
                <th>{{ $roomType['description'] }}</th>
            </tr>
            <tr>
                <td>Gambar</td>
                <td align="right">:</td>
                <th>{{ $roomType['images'] }}</th>
            </tr>
        </table>
    </div>
</div>
@endsection


