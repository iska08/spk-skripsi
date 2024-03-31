@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row align-items-center">
        <form class="col-lg-8" method="POST" action="{{ route('sarans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_saran" class="form-label">Saran Nama Destinasi Wisata</label>
                <input type="text" class="form-control @error('nama_saran') is-invalid @enderror" id="nama_saran" name="nama_saran"
                    value="{{ old('nama_saran') }}" autofocus required placeholder="Masukkan Nama Destinasi Wisata">
                @error('nama_saran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                    value="{{ old('keterangan') }}" autofocus required placeholder="Masukkan Keterangan">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="validasi" value="0">
            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            <a href="{{ route('sarans.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection