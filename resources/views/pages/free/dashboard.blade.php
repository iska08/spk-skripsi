@extends('layouts.free')
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
        <hr style="border-width: 2px;">
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
</main>
@endsection