<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Dari Toko</label>
      {!! Form::select('toko_id',$toko, null, ['class'=>'form-control spesial']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Nomor Pesanan</label>
      {!! Form::text('nomor_pesanan', null, ['class'=>'form-control spesial','placeholder'=>'Nomor Pesanan']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Tanggal</label>
      {!! Form::date('tanggal', null, ['class'=>'form-control spesial','placeholder'=>'Tanggal']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Ongkir</label>
      {!! Form::text('ongkir_customer', null, ['class'=>'form-control spesial','placeholder'=>'Ongkir']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Nomor Resi Asli</label>
      {!! Form::text('nomor_resi_asli', null, ['class'=>'form-control spesial','placeholder'=>'Nomor Resi Asli']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Pembeli</label>
      {!! Form::text('nama_pembeli', null, ['class'=>'form-control spesial','placeholder'=>'Nama Pembeli']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Nomor HP</label>
      {!! Form::text('nomor_hp', null, ['class'=>'form-control spesial','placeholder'=>'Nomor HP']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      {!! Form::select('status',$status, null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Uang Masuk</label>
      {!! Form::text('uang_masuk', null, ['class'=>'form-control spesial','placeholder'=>'Uang Masuk']) !!}
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Supplier Dari</label>
      {!! Form::select('supplier',['Shopee'=>'Shopee','Jakmall'=>'Jackmall','Tokopedia'=>'Tokopedia','Lainya'=>'Lainya'], null, ['class'=>'form-control spesial']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Akun Belanja</label>
      {!! Form::text('akun_belanja', null, ['class'=>'form-control spesial','placeholder'=>'Akun Belanja']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Pesanan Supplier</label>
      {!! Form::text('nomor_pesanan_beli_ke_supplier', null, ['class'=>'form-control spesial','placeholder'=>'Nomor Pesanan']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Ongkir</label>
      {!! Form::text('ongkir_supplier', null, ['class'=>'form-control spesial','placeholder'=>'Ongkir']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Resi Sementara</label>
      {!! Form::text('nomor_resi_sementara', null, ['class'=>'form-control','placeholder'=>'Resi Sementara']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Uang Belanja Ke Supplier</label>
      {!! Form::text('uang_belanja_ke_supplier', null, ['class'=>'form-control','placeholder'=>'Belanja Supplier']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail1">Dana Cair</label>
      {!! Form::text('dana_cair', null, ['class'=>'form-control','placeholder'=>'Dana Cair']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="exampleInputEmail1">Status WA</label>
      {!! Form::select('status_wa',$statusWa, null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="exampleInputEmail1">Catatan</label>
      {!! Form::text('catatan', null, ['class'=>'form-control','placeholder'=>'Catatan']) !!}
    </div>
  </div>
</div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="/penjualan" class="btn btn-primary">Kembali</a>