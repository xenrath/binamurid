@extends('layouts.main')

@section('title', 'Tambah Anak')

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
        <h3>Data Anak</h3>
        <p class="mb-0">Tambah</p>
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
    <h5>Tambah Anak</h5>
  </div>
  <form action="{{ url('anak') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label" for="nama">Nama Anak *</label>
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text"
          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))"
          placeholder="masukan nama anak" value="{{ old('nama') }}" />
        @error('nama')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label" for="panggilan">Panggilan *</label>
        <input class="form-control @error('panggilan') is-invalid @enderror" id="panggilan" name="panggilan" type="text"
          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))"
          placeholder="masukan panggilan anak" value="{{ old('panggilan') }}" />
        @error('panggilan')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin *</label>
        <div class="">
          <div class="form-check form-check-inline">
            <input class="form-check-input" id="L" type="radio" name="gender" value="L" {{ old('gender')=='L'
              ? 'checked' : '' }} />
            <label class="form-check-label" for="L">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" id="P" type="radio" name="gender" value="P" {{ old('gender')=='P'
              ? 'checked' : '' }} />
            <label class="form-check-label" for="P">Perempuan</label>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="lahir">Tanggal Lahir</label>
        <input class="form-control datetimepicker" id="lahir" name="lahir" type="text" placeholder="d/m/y"
          data-options='{"disableMobile":true}' />
      </div>
      <div class="mb-3">
        <label class="form-label" for="orangtua_id">Orang Tua *</label>
        <select class="form-select js-choice" id="orangtua_id" size="1" name="orangtua_id"
          data-options="{'removeItemButton': true, 'placeholder': true}">
          <option value="">- Pilih Orang Tua -</option>
          @foreach ($orangtuas as $orangtua)
          <option value="{{ $orangtua->id }}" {{ old('orangtua_id')==$orangtua->id ? 'selected' : '' }}>{{
            $orangtua->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="foto">Foto *</label>
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