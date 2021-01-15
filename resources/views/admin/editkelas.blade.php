@extends('main')

@section('title', 'Edit Data Kelas')

@section('content')
<!-- form start -->
<form role="form" action="{{'/kelas/' . $kelas->id_kelas}}" method="post">
@method('PUT')
@csrf
  <div class="row align-items-center">
    <div class="mb-3">
      <label for="jurusan" class="form-label">Jurusan</label>
      <input type="text" class="form-control @error ('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" value="{{$kelas->jurusan}}">
        @error('jurusan')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
    <div class="mb-3">
      <label for="nama_kelas" class="form-label">Email address</label>
      <input type="text" class="form-control @error ('nama_kelas') is-invalid @enderror" name="nama_kelas" id="nama_kelas" value="{{$kelas->nama_kelas}}">
        @error('nama_kelas')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
  </div>

  <div class="box-footer">
    <a href="/kelas" class="btn btn-secondary btn-sm">Kembali</a>
    <button type="submit" class="btn btn-warning btn-sm" value="submit">Edit</button>
  </div>
</form>
@endsection