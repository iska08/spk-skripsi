@extends('layouts.free')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div class="container-fluid px-4">
        <?php
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false || strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false) {
        ?>
            <center><img src="{{ url('frontend/images/Balai_Kota_Malang.jpg') }}" style="height: 4cm; width: 6cm"/></center>
            <br>
            <h4 class="text-center">
                <p style="font-family: 'Times New Roman', Times, serif; font-size: 30px">SELAMAT DATANG DI</p>
                <i style="font-family: 'Courier New', Courier, monospace">Sistem Pendukung Keputusan Pemilihan Destinasi Wisata di Kota Malang</i>
            </h4>
            <hr style="border-width: 2px;">
            <div class="slide-container">
                <div class="slide-content">
                    @foreach ($wisatas as $wisata)
                    <div class="slide-item">
                        <div class="d-flex justify-content position-relative" style="max-width: 80%">
                            @if ($wisata->link_foto == "" || $wisata->link_foto == "-")
                            <img src="{{ url('frontend/images/noimage.png') }}" alt="Gambar" style="width: 4cm; height: 3cm">
                            @else
                            <img src="{{ $wisata->link_foto }}" alt="Gambar" style="width: 4cm; height: 3cm">
                            @endif
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <p style="font-family: 'Times New Roman', Times, serif; font-size: 24px; max-width: 40%; min-width: 40%">
                                {{ $wisata->nama_wisata }}
                            </p>
                        </div>
                        <br>
                        <h4 style="max-width: 80%">
                            <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">
                                <strong>Keterangan:</strong>
                                <br>
                                {{ $wisata->keterangan }}
                            </p>
                            <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">
                                <strong>Website Resmi:</strong> 
                                @if($wisata->situs == "" || $wisata->situs == "-")
                                -
                                @else
                                <a href="{{ $wisata->situs }}">Klik di Sini</a>
                                @endif
                            </p>
                            <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">
                                <strong>Fasilitas:</strong>
                                <br>
                                {{ $wisata->fasilitas}}
                            </p>
                        </h4>
                    </div>
                    @endforeach
                </div>
            </div>
        <?php
        }else{
            ?>
                <div class="container d-flex justify-content-center align-items-center text-center position-relative">
                <img src="{{ url('frontend/images/Balai_Kota_Malang.jpg') }}" style="height: 4cm; width: 6cm"/>&nbsp;&nbsp;
                <h4>
                    <p style="font-family: 'Times New Roman', Times, serif; font-size: 45px">SELAMAT DATANG DI</p>
                    <i style="font-family: 'Courier New', Courier, monospace">Sistem Pendukung Keputusan Pemilihan Destinasi Wisata di Kota Malang</i>
                </h4>
            </div>
            <hr style="border-width: 2px;">
            <div class="table-responsive slide-container">
                <div class="slide-content">
                    @foreach ($wisatas as $wisata)
                    <div class="slide-item">
                        <div class="container d-flex justify-content position-relative">
                            @if ($wisata->link_foto == "" || $wisata->link_foto == "-")
                            <img src="{{ url('frontend/images/noimage.png') }}" alt="Gambar" style="height: 4cm; width: 6cm">
                            @else
                            <img src="{{ $wisata->link_foto }}" alt="Gambar" style="height: 4cm; width: 6cm">
                            @endif
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h4 style="max-width: 30%; min-width:30%">
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 24">{{ $wisata->nama_wisata }}</p>
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">{{ $wisata->keterangan }}</p><br>
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">
                                    Website Resmi: 
                                    @if($wisata->situs == "" || $wisata->situs == "-")
                                    -
                                    @else
                                    <a href="{{ $wisata->situs }}">Klik di Sini</a>
                                    @endif
                                </p>
                            </h4>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h4 style="max-width: 30%; min-width:30%">
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 24">Fasilitas</p>
                                <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px">{{ $wisata->fasilitas}}</p>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <?php
        }?>
    </div>
</main>
@endsection