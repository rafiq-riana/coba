@extends('main')

@section('title', 'Tambah Data petugas')

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/petugas" method="post">
            @csrf
            <div class="row align-items-center">

                <div class="col-3">
                    <label for="nama_petugas" class="col-form-label">Nama Petugas</label>
                </div>
                <div class="col-8 mb-2">
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control @error ('nama_petugas') is-invalid @enderror" value="{{ old('nama_petugas') }}">
                    @error('nama_petugas')<div class="invalid-feedback">
                      {{ $message }}
                    </div>@enderror
                </div>

                <div class="col-3">
                    <label for="username" class="col-form-label">Username</label>
                </div>
                <div class="col-8 mb-2">
                    <input type="text" name="username" id="username" class="form-control @error ('username') is-invalid @enderror" value="{{ old('username') }}">
                      @error('username')<div class="invalid-feedback">
                        {{ $message }}
                      </div>@enderror
                </div>

                <!-- <div class="col-3">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col-8 mb-2">
                    <input type="text" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" value="{{ old('password') }}">
                      @error('password')<div class="invalid-feedback">
                        {{ $message }}
                      </div>@enderror
                </div> -->

                <div class="col-3">
                    <label for="level" class="col-form-label">Level</label>
                </div>
                <div class="col-8 mb-2">
                    <select class="form-control @error ('level') is-invalid @enderror" value="{{ old('level') }}" name="level" id="level">
                    <option selected disabled>Pilih salah satu... </option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                      @error('level')<div class="invalid-feedback">
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
      <th scope="col">Nama petugas</th>
      <th scope="col">Username</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($petugas as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user->nama_petugas}}</td>
      <td>{{$user->username}}</td>
      <!-- <td>{{$user->password}}</td> -->
      <td>{{$user->level}}</td>

      <td>
        <a href="{{ '/petugas/' . $user->id_petugas . '/edit'}}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ '/petugas/' . $user->id_petugas }}" method="POST" class="d-inline">
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