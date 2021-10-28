@extends('layouts.app')
@section('title','Detail Hotel')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Hotel <strong>{{ $hotel['name'] }}</strong></h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td width="110">Nama</td>
                <td width="270" align="right">:</td>
                <th>{{ $hotel['name'] }}</th>
            </tr>
            <tr>
                <td>Alamat</td>
                <td align="right">:</td>
                <th>{{ $hotel['address'] }}</th>
            </tr>
            <tr>
                <td>Tag Alamat</td>
                <td align="right">:</td>
                <th>{{ $hotel['address_tag'] }}</th>
            </tr>
            <tr>
                <td>Daerah</td>
                <td align="right">:</td>
                <th>{{ $hotel['regency']['regency'] }}</th>
            </tr>
        </table>
    </div>
</div>
@endsection


