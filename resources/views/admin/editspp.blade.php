@extends('main')

@section('title', 'Edit Data SPP')

@section('content')
<!-- form start -->
<form role="form" action="{{'/spp/' . $spp->id_spp . '/edit' }}" method="post">
@method('PUT')
@csrf
  <div class="row align-items-center">
    <div class="mb-3">
      <label for="tahun_spp" class="form-label">Tahun Ajar</label>
      <input type="text" class="form-control @error ('tahun_spp') is-invalid @enderror" name="tahun_spp" id="tahun_spp" value="{{$spp->tahun_spp}}">
        @error('tahun_spp')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
    <div class="mb-3">
      <label for="nominal_spp" class="form-label"> Nominal Bayar</label>
      <input type="text" class="form-control @error ('nominal_spp') is-invalid @enderror" name="nominal_spp" id="nominal_spp" value="{{$spp->nominal_spp}}">
        @error('nominal_spp')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
  </div>

  <div class="box-footer">
    <a href="/spp" class="btn btn-secondary btn-sm">Kembali</a>
    <button type="submit" class="btn btn-warning btn-sm" value="submit">Edit</button>
  </div>
</form>
@endsection