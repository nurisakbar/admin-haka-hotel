@extends('layouts.app')
@section('title','Detail Fasilitas')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Fasilitas</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td width="140">Nama Fasilitas</td>
                <td width="270" align="right">:</td>
                <th>{{ $facility['name'] }}</th>
            </tr>
            <tr>
                <td>Gambar</td>
                <td align="right">:</td>
                <th>{{ $facility['image'] }}</th>
            </tr>
        </table>
    </div>
</div>
@endsection


