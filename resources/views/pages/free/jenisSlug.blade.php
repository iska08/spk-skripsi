@extends('layouts.free')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Jenis Wisata: {{ $jenis }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('free.index') }}">Data Destinasi Wisata</a></li>
            <li class="breadcrumb-item"><a href="{{ route('free.jenis') }}">Data Jenis Wisata</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
        {{-- datatable --}}
        <div class="card col-lg-10">
            <div class="card-body table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Destinasi Wisata</th>
                            <th>Foto</th>
                            <th>Link Google Maps</th>
                            <th>Fasilitas</th>
                            <th>Biaya</th>
                            <th>Website Resmi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wisatas->sortBy('nama_wisata') as $wisata)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <?php if($wisata->nama_wisata == ""){
                                        ?>-<?php
                                    }else{
                                        ?>{{ Str::ucfirst($wisata->nama_wisata) }}<?php
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <?php if($wisata->link_foto == ""){
                                        ?>-<?php
                                    }else{
                                        ?><img src="{{ $wisata->link_foto }}" alt="Gambar" style="width: 4cm; height: 3cm"><?php
                                    }?>
                                </td>
                                <td class="text-center">
                                    <?php if($wisata->lokasi_maps == ""){
                                        ?>-<?php
                                    }else{
                                        ?><a href="{{ $wisata->lokasi_maps }}">Klik di Sini</a><?php
                                    }?>
                                </td>
                                <td>
                                    <?php if($wisata->fasilitas == ""){
                                        ?>-<?php
                                    }else{
                                        ?>{{ $wisata->fasilitas }}<?php
                                    }?>
                                </td>
                                <td>
                                    <?php if($wisata->biaya == ""){
                                        ?>-<?php
                                    }else{
                                        ?>Rp {{ number_format($wisata->biaya, 0, ',', '.') }}<?php
                                    }?>
                                </td>
                                <td class="text-center">
                                    <?php if($wisata->situs == ""){
                                        ?>-<?php
                                    }else{
                                        ?><a href="{{ $wisata->situs }}">Klik di Sini</a><?php
                                    }?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
