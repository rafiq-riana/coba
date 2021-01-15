@extends('main')

@section('title', 'Tambah Data SPP')

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
        <form action="/spp" method="post">
            @csrf
            <div class="row align-items-center">
                <div class="col-3">
                    <label for="tahun_spp" class="col-form-label">Tahun Ajar</label>
                </div>
                <div class="col-8 mb-2">
                    <input type="text" name="tahun_spp" id="tahun_spp" class="form-control @error ('tahun_spp') is-invalid @enderror" value="{{ old('tahun_spp') }}">
                      @error('tahun_spp')<div class="invalid-feedback">
                        {{ $message }}
                      </div>@enderror
                </div>

                <div class="col-3">
                    <label for="nominal_spp" class="col-form-label">Nominal Bayar</label>
                </div>
                <div class="col-8">
                    <input type="text" name="nominal_spp" id="nominal_spp" class="form-control @error ('nominal_spp') is-invalid @enderror" value="{{ old('nominal_spp') }}">
                    @error('nominal_spp')<div class="invalid-feedback">
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
      <th scope="col">Tahun Ajar</th>
      <th scope="col">Nominal Bayar</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($spp as $sp)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$sp->tahun_spp}}</td>
      <td>{{$sp->nominal_spp}}</td>

      <td>
        <a href="{{ '/spp/' . $sp->id_spp . '/edit'}}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ '/spp/' . $sp->id_spp }}" method="POST" class="d-inline">
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