@extends('layouts.app')
@section('title','Edit Hotel')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Hotel</h6>
    </div>
    <div class="card-body">
        @include('validation_error')
        {!! Form::model($hotel,['url'=>'hotel/'.$hotel['id'],'method'=>'PUT']) !!}
        @include('hotel.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection

