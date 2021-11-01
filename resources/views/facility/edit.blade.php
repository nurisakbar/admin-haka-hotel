@extends('layouts.app')
@section('title','Edit Fasilitas')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Fasilitas</h6>
    </div>
    <div class="card-body">
        @include('validation_error')
        {!! Form::model($facility,['url'=>'facilities/'.$facility['id'],'method'=>'PUT']) !!}
        @include('facility.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection

