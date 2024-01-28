@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 border-bottom">
        <h1 class="mt-4 h2">{{ $title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ $title }}</li>
            <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Data Jenis Wisata</a></li>
        </ol>
    </div>

    <form class="col-lg-8 contianer-fluid px-4 mt-3" method="POST" action="{{ route('wisata.index') }}"
        enctype="multipart/form-data">
        @csrf
        {{-- nama destinasi wisata --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Destinasi Wisata</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" autofocus required placeholder="Nama Destinasi Wisata">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- lokasi maps --}}
        <div class="mb-3">
            <label for="lokasi_maps" class="form-label">Link Google Maps</label>
            <input type="text" class="form-control @error('lokasi_maps') is-invalid @enderror" id="lokasi_maps" name="lokasi_maps"
                value="{{ old('lokasi_maps') }}" autofocus required placeholder="Link Google Maps">

            @error('lokasi_maps')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- fasilitas --}}
        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas"
                value="{{ old('fasilitas') }}" autofocus required placeholder="Fasilitas">

            @error('fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- biaya --}}
        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya"
                value="{{ old('biaya') }}" autofocus required placeholder="Biaya">

            @error('biaya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- jenis wisata --}}
        <div class="mb-3">
            <label for="jenis_id" class="form-label">Jenis Wisata</label>
            <select class="form-select @error('jenis_id') is-invalid @enderror" id="jenis_id" name="jenis_id" required>
                <option value="" disabled selected>Pilih Jenis Wisata</option>
                @foreach ($jenises as $jenis)
                    @if (old('jenis_id') == $jenis->id)
                        <option value="{{ $jenis->id }}" selected>{{ $jenis->jenis_name }}</option>
                    @else
                        <option value="{{ $jenis->id }}">{{ $jenis->jenis_name }}</option>
                    @endif
                @endforeach
            </select>

            @error('jenis_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
        <a href="{{ route('wisata.index') }}" class="btn btn-danger mb-3">Cancel</a>
    </form>
@endsection
