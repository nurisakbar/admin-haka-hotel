@extends('layouts.app')
@section('title','Tambah Data Fasilitas')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Fasilitas</h6>
    </div>
    <div class="card-body">
        @include('validation_error')
        {!! Form::open(['url'=>'facilities', 'method' => 'POST', 'files' => true]) !!}
        @include('facility.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection




