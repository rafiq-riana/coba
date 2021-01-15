@extends('main')

@section('title', 'Edit Data Petugas')

@section('content')
<!-- form start -->
<form role="form" action="{{'/petugas/' . $petugas->id_petugas }}" method="post">
@method('PUT')
@csrf
  <div class="row align-items-center">
    <div class="mb-3">
      <label for="nama_petugas" class="form-label">Nama Petugas</label>
      <input type="text" class="form-control @error ('nama_petugas') is-invalid @enderror" name="nama_petugas" id="nama_petugas" value="{{$petugas->nama_petugas}}">
        @error('nama_petugas')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control @error ('username') is-invalid @enderror" name="username" id="username" value="{{$petugas->username}}">
        @error('username')<div class="invalid-feedback">
          {{ $message }}
        </div>@enderror
    </div>
    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-control @error ('level') is-invalid @enderror" value="{{$petugas->level}}" name="level" id="level">
            <option value="admin" selected>Admin</option>
            <option value="user">User</option>
        </select>
        @error('level')<div class="invalid-feedback">
        {{ $message }}
        </div>@enderror
    </div>
  </div>

  <div class="box-footer">
    <a href="/petugas" class="btn btn-secondary btn-sm">Kembali</a>
    <button type="submit" class="btn btn-warning btn-sm" value="submit">Edit</button>
  </div>
</form>
@endsection