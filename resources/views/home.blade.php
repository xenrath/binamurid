@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<h5 class="mb-3">Menu User</h5>
<div class="row g-3 mb-3">
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Pendidik</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($pendidiks) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('pendidik') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Orang Tua</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($orangtuas) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('orangtua') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Anak</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($anaks) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('anak') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
</div>
<h5 class="mb-3">Menu Kelas</h5>
<div class="row g-3 mb-3">
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Kelas</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($kelases) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('kelas') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Mapel</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($mapels) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('mapel') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
</div>
<h5 class="mb-3">Menu Transaksi</h5>
<div class="row g-3 mb-3">
  {{-- <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Menunggu Konfirmasi</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($menunggu) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('transkasi/menunggu') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Dalam Peminjaman</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($proses) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('transaksi/proses') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Riwayat Peminjaman</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
          data-countup='{"endValue":{{ count($pelanggan) }},"suffix":" data"}'>0</div>
        <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('pelanggan') }}">Lihat Data
          <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
        </a>
      </div>
    </div>
  </div> --}}
</div>
@endsection