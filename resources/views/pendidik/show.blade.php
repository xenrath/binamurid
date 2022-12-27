@extends('layouts.main')

@section('title', 'Lihat Pendidik')

@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
    style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <div class="row">
      <div class="col-auto">
        <a href="{{ url('pendidik') }}" class="btn btn-secondary">
          <i class="fa fa-arrow-left"></i>
        </a>
      </div>
      <div class="col-lg-8">
        <h3>Data Pendidik</h3>
        <p class="mb-0">Lihat</p>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h5>Lihat Pendidik</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        @if ($pendidik->foto)
        <img src="{{ asset('storage/uploads/' . $pendidik->foto) }}" alt="{{ $pendidik->nama }}" class="w-100 rounded border">
        @else
        <img src="{{ asset('falcon/public/assets/img/img-placeholder.jpg') }}" alt="{{ $pendidik->nama }}"
          class="w-100 rounded border">
        @endif
      </div>
      <div class="col-md-6">
        <table class="w-100">
          <tr height="50">
            <td>
              <h5 class="fs-0">Nama</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $pendidik->nama }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Email</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $pendidik->email }}</h5>
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
                @if ($pendidik->gender == 'L')
                Laki-laki
                @else
                Perempuan
                @endif
              </h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Nomor Telepon</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">+62{{ $pendidik->telp }}</h5>
            </td>
          </tr>
          <tr height="50">
            <td>
              <h5 class="fs-0">Alamat</h5>
            </td>
            <td>
              <h5 class="fs-0">:</h5>
            </td>
            <td class="text-end">
              <h5 class="fs-0">{{ $pendidik->alamat }}</h5>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection