<div class="form-group">
  <label for="exampleInputEmail1">Nama Hotel</label>
  {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama']) !!}
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleInputEmail1">Alamat</label>
      {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Alamat']) !!}
    </div>
  </div>
</div>
<div class="row">
  @if(isset($data))
    <?php $i = 0;?>
    @foreach($data['address_tag'] as $tag)
    <div class="col-md-3">
      <div class="form-group">
        <label for="exampleInputEmail">Alamat Tag</label>
        {!! Form::text("address_tag[$i]", null, ['class'=>'form-control','placeholder'=>'Alamat']) !!}
      </div>
    </div>
    <?php $i++;?>
    @endforeach
    @else
    <div class="col-md-3">
      <div class="form-group">
        <label for="exampleInputEmail">Alamat Tag</label>
        {!! Form::text("address_tag[]", null, ['class'=>'form-control','placeholder'=>'Tag']) !!}
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="exampleInputEmail">Alamat Tag</label>
        {!! Form::text("address_tag[]", null, ['class'=>'form-control','placeholder'=>'Tag']) !!}
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="exampleInputEmail">Alamat Tag</label>
        {!! Form::text("address_tag[]", null, ['class'=>'form-control','placeholder'=>'Tag']) !!}
      </div>
    </div>
    @endif

</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleInputEmail1">Daerah</label>
      {!! Form::select('regency_id', ['1101' => 'KAB. ACEH SELATAN', '1102' => 'KAB. ACEH TENGGARA'], null , ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
{{-- <div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="">Gambar</label>
      <input type="file" name="photos[]" class="form-control" multiple="true" >
    </div>
  </div>
</div> --}}

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="/hotel" class="btn btn-primary">Kembali</a>
