@extends('layouts.main')

@section('title', 'Ubah Orang Tua')

@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
    style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <div class="row">
      <div class="col-auto">
        <a href="{{ url('orangtua') }}" class="btn btn-secondary">
          <i class="fa fa-arrow-left"></i>
        </a>
      </div>
      <div class="col-lg-8">
        <h3>Data Orang Tua</h3>
        <p class="mb-0">Ubah</p>
      </div>
    </div>
  </div>
</div>
@if (session('status'))
<div class="alert alert-danger border-2" role="alert">
  <div class="clearfix">
    <div class="d-flex align-items-center float-start">
      <div class="bg-danger me-3 icon-item">
        <span class="fas fa-times-circle text-white fs-3"></span>
      </div>
      <h5 class="mb-0 text-danger">Error!</h5>
    </div>
    <button class="btn-close float-end" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <div class="mt-3">
    @foreach (session('status') as $error)
    <p>
      <span class="dot bg-danger"></span> {{ $error }}
    </p>
    @endforeach
  </div>
</div>
@endif
<div class="card">
  <div class="card-header">
    <h5>Tambah Orang Tua</h5>
  </div>
  <form action="{{ url('orangtua/' . $orangtua->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('put')
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label" for="nama">Nama Lengkap *</label>
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text"
          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))"
          placeholder="masukan nama lengkap" value="{{ old('nama', $orangtua->nama) }}" />
        @error('nama')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label" for="email">Email *</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text"
          placeholder="masukan email" value="{{ old('email', $orangtua->email) }}" />
        @error('email')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label" for="telp">Nomor Telepon *</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">+62</span>
          <input class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" type="text"
            onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="12" placeholder="masukan telp"
            value="{{ old('telp', $orangtua->telp) }}" />
          @error('telp')
          <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="alamat">Alamat *</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
          rows="3">{{ old('alamat', $orangtua->alamat) }}</textarea>
        @error('alamat')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin *</label>
        <div class="">
          <div class="form-check form-check-inline">
            <input class="form-check-input" id="L" type="radio" name="gender" value="L" {{ old('gender',
              $orangtua->gender)=='L' ? 'checked' : '' }} />
            <label class="form-check-label" for="L">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" id="P" type="radio" name="gender" value="P" {{ old('gender',
              $orangtua->gender)=='P' ? 'checked' : '' }} />
            <label class="form-check-label" for="P">Perempuan</label>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="foto">Foto <small>(Kosongkan saja jika tidak diubah)</small></label>
        <input class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" type="file"
          accept="image/*" />
        @error('foto')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="card-footer text-end">
      <button class="btn btn-secondary me-1" type="reset">
        <i class="fas fa-undo"></i> Reset
      </button>
      <button class="btn btn-primary" type="submit">
        <i class="fas fa-save"></i> Simpan
      </button>
    </div>
  </form>
</div>
@endsection