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
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Destinasi Wisata</th>
                            <th>Link Google Maps</th>
                            <th>Fasilitas</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($wisatas->count())
                            @foreach ($wisatas as $wisata)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::ucfirst(Str::upper($wisata->nama_wisata)) }}</td>
                                    <td><a href="{{ $wisata->lokasi_maps }}">{{ $wisata->lokasi_maps }}</a></td>
                                    <td>{{ $wisata->fasilitas }}</td>
                                    <td>Rp {{ number_format($wisata->biaya, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-danger text-center p-4">
                                    <h4>Belum ada data Destinasi Wisata</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
