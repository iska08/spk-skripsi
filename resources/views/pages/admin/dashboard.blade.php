@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container d-flex justify-content-center align-items-center text-center position-relative">
            <img src="{{ url('frontend/images/Balai_Kota_Malang.jpg') }}" style="max-height: 4cm"/>&nbsp;&nbsp;
            <h4>
                <p style="font-family: 'Times New Roman', Times, serif; font-size: 45px">SELAMAT DATANG DI</p>
                <i style="font-family: 'Courier New', Courier, monospace">Sistem Pendukung Keputusan Pemilihan Destinasi Wisata di Kota Malang</i>
            </h4>
        </div>
        @can('admin')
        <hr style="border-width: 2px;">
        <!-- Content Row -->
        <div class="row d-flex justify-content-center align-items-center position-relative">
            <!-- Destinasi Wisata -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a style="text-decoration:none; color: #212529;" href="{{ route('wisata.index') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Destinasi Wisata</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wisata }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Criteria -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('kriteria.index') }}" style="text-decoration:none; color: #212529;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kriteria</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $criterias }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Jenis Wisata -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="{{ route('jenis.index') }}" style="text-decoration:none; color: #212529;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jenis Wisata
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jenis }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hiking fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Data User -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{ route('users.index') }}" style="text-decoration:none; color: #212529;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pengguna</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-gear fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @elseif('user')
        <hr style="border-width: 2px;">
        <div class="card mb-4">
            <div class="card-body table-responsive slide-container">
                <div class="slide-content">
                    @foreach ($wisatas as $wisata)
                    <div class="slide-item">
                        <div class="container d-flex justify-content position-relative">
                            <img src="{{ $wisata->link_foto }}" alt="Gambar" style="width: 5cm; height: 3.5cm">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h4>
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px">{{ $wisata->nama_wisata }}</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">{{ $wisata->keterangan }}</p><br>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                    <i>
                                        <?php if($wisata->situs == ""){
                                            ?>Website Resmi: -<?php
                                        }else{
                                            ?>Website Resmi: <a href="{{ $wisata->situs }}">Klik di Sini</a><?php
                                        }?>
                                    </i>
                                </p>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endcan
    </div>
</main>
@endsection