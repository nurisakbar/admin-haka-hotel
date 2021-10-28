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
    <div class="col-md-3">
      <div class="form-group">
        <label for="exampleInputEmail">Alamat Tag</label>
        {!! Form::text("address_tag", null, ['class'=>'form-control','placeholder'=>'Cth: Tag1,Tag2']) !!}
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleInputEmail1">Daerah</label>
      <select class="regency form-control" name="regency_id"></select>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("photos[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("photos[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="exampleInputEmail">Gambar</label>
      {!! Form::file("photos[]", null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="/hotel" class="btn btn-primary">Kembali</a>

@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
$('.regency').select2({
  placeholder: 'Select Regency',
  ajax: {
    url: '/select2regency',
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.name,
                  id: item.id
              }
          })
      };
    },
    cache: true
  }
});
</script>
@endpush
  
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush