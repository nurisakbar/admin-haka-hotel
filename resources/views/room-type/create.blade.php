@extends('layouts.app')
@section('title','Tambah Data Tipe Ruangan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tipe Ruangan</h6>
    </div>
    <div class="card-body">
        @include('validation_error')
        {!! Form::open(['url'=>'hotel/' . $id . '/roomtype', 'method' => 'POST', 'files' => true]) !!}
        @include('room-type.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection




