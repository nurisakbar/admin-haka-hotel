

<div class="form-group">
  <label for="exampleInputEmail1">Nama Pegawai</label>
  {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!}
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control"  placeholder="Password">
    </div>
  </div>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="/admin/faq" class="btn btn-primary">Kembali</a>