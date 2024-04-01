@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Jenis Wisata: {{ $jenis }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('wisata.index') }}">Data Destinasi Wisata</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Data Jenis Wisata</a></li>
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
                        @foreach ($wisatas->where('validasi', '=', '2')->sortBy('nama_wisata') as $wisata)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($wisata->nama_wisata == "")
                                    -
                                    @else
                                    {{ Str::ucfirst($wisata->nama_wisata) }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($wisata->link_foto == "" || $wisata->link_foto == "-")
                                    <img src="../../../frontend/images/noimage.png" alt="Gambar" style="width: 4cm; height: 3cm">
                                    @else
                                    <img src="{{ $wisata->link_foto }}" alt="Gambar" style="width: 4cm; height: 3cm">
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($wisata->lokasi_maps == "" || $wisata->lokasi_maps == "-")
                                    -
                                    @else
                                    <a href="{{ $wisata->lokasi_maps }}">Klik di Sini</a>
                                    @endif
                                </td>
                                @if($wisata->fasilitas == "" || $wisata->fasilitas == "-")
                                <td class="text-center">-</td>
                                @else
                                <td>{{ $wisata->fasilitas }}</td>
                                @endif
                                <td>
                                    @if($wisata->biaya == "")
                                    -
                                    @else
                                    Rp {{ number_format($wisata->biaya, 0, ',', '.') }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($wisata->situs == "" || $wisata->situs == "-")
                                    -
                                    @else
                                    <a href="{{ $wisata->situs }}">Klik di Sini</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection