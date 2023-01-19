@extends('layouts.main')

@section('title', 'Tambah Mata Pelajaran')

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
        <h3>Data Mata Pelajaran</h3>
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
    <h5>Tambah Mata Pelajaran</h5>
  </div>
  <form action="{{ url('mapel') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label" for="nama">Nama Mapel *</label>
        <input class="form-control" id="nama" name="nama" type="text" placeholder="masukan nama mata pelajaran"
          value="{{ old('nama') }}" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="keterangan">Keterangan *</label>
        <textarea class="form-control" name="keterangan" id="keterangan" cols="30"
          rows="5" placeholder="masukan keterangan">{{ old('keterangan') }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label" for="waktu">Waktu *</label>
        <input class="form-control datetimepicker" id="waktu" name="waktu" type="text" placeholder="d M Y sampai d M Y"
          data-options='{"mode":"range","dateFormat":"d M Y","disableMobile":true}' value="{{ old('waktu') }}" />
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