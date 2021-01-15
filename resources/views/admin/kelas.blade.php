@extends('main')

@section('title', 'Tambah Data Kelas')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah
</button>

@if (session('status'))
  <div class="alert alert-info" role="alert">
      {{ session('status') }}
      <button class="btn btn-box-tool pull-right" aria-label="Close"><i class="fa fa-times"></i></button>
  </div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelas" method="post">
            @csrf
            <div class="row align-items-center">
                <div class="col-3">
                    <label for="jurusan" class="col-form-label">Jurusan</label>
                </div>
                <div class="col-8 mb-2">
                    <input type="text" name="jurusan" id="jurusan" class="form-control @error ('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}">
                      @error('jurusan')<div class="invalid-feedback">
                        {{ $message }}
                      </div>@enderror
                </div>

                <div class="col-3">
                    <label for="nama_kelas" class="col-form-label">Nama Kelas</label>
                </div>
                <div class="col-8">
                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control @error ('nama_kelas') is-invalid @enderror" value="{{ old('nama_kelas') }}">
                    @error('nama_kelas')<div class="invalid-feedback">
                      {{ $message }}
                    </div>@enderror
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
            <button type="submit" value="submit" class="btn btn-primary btn-sm">Tambah</button>
        </div>
        </form>
    </div>
  </div>
</div>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Nama Kelas</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kelas as $kls)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$kls->jurusan}}</td>
      <td>{{$kls->nama_kelas}}</td>

      <td>
        <a href="{{ '/kelas/' . $kls->id_kelas . '/edit'}}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ '/kelas/' . $kls->id_kelas }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm" type="submit" value="submit">Hapus</button>
        </form>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection