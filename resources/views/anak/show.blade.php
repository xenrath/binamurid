@extends('layouts.main')

@section('title', 'Lihat Anak')

@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
    style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <div class="row">
      <div class="col-auto">
        <a href="{{ url('anak') }}" class="btn btn-secondary">
          <i class="fa fa-arrow-left"></i>
        </a>
      </div>
      <div class="col-lg-8">
        <h3>Data Anak</h3>
        <p class="mb-0">Lihat</p>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h5>Lihat Anak</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        @if ($anak->foto)
        <img src="{{ asset('storage/uploads/' . $anak->foto) }}" alt="{{ $anak->nama }}" class="w-100 rounded border">
        @else
        <img src="{{ asset('falcon/public/assets/img/img-placeholder.jpg') }}" alt="{{ $anak->nama }}"
          class="w-100 rounded border">
        @endif
      </div>
      <div class="col-md-6">
        <table class="w-100">
          <tr height="50">
            <td>
              <h5 class="fs-0">Nama Langkap</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $anak->nama }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Panggilan</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $anak->panggilan }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Jenis Kelamin</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">
                @if ($anak->gender == 'L')
                Laki-laki
                @else
                Perempuan
                @endif
              </h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Tanggal Lahir</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ date('d M Y', strtotime($anak->lahir)) }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Orang Tua</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $anak->orangtua->nama }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Kelas</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $anak->kelas->nama }}</h5>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection