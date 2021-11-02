<div class="form-group">
  <label for="exampleInputEmail1">Nama Fasilitas</label>
  {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama']) !!}
</div>

<div class="row mb-4">
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("images", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="/facilities" class="btn btn-primary">Kembali</a>
