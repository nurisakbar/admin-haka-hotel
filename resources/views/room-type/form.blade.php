<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail">Tipe Ruangan</label>
      {!! Form::select("hotel_id", $hotel ,null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail">Tipe Ruangan</label>
      {!! Form::text("name", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail">Harga</label>
      {!! Form::number("price", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail">Deskripsi</label>
      {!! Form::text("description", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-md-4">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("image[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("image[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("image[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ $_SERVER['HTTP_REFERER'] }}" class="btn btn-primary">Kembali</a>
