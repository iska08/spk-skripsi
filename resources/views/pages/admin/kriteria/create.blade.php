@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="row align-items-center">
        <form class="col-lg-8" method="POST" action="{{ route('kriteria.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama kriteria</label>
                <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria"
                    value="{{ old('nama_kriteria') }}" autofocus required placeholder="Masukan kriteria">
                @error('nama_kriteria')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori"
                    required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="BENEFIT" {{ old('kategori') === 'BENEFIT' ? 'selected' : '' }}>Benefit</option>
                    <option value="COST" {{ old('kategori') === 'COST' ? 'selected' : '' }}>Cost</option>
                </select>
                @error('kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" value="{{ old('keterangan') }}" autofocus required
                    placeholder="Masukan keterangan">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            <a href="{{ route('kriteria.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
        <div class="col-lg-4 card mb-5" style="height: 50%">
            <p> Kriteria yang telah ditentukan dibagi menjadi dua kategori, yaitu:</p>
            <ol>
                <li>
                    <b> Benefit (keuntungan) : </b> Semakin tinggi nilai keuntungannya maka semakin tinggi peluang untuk
                    dipilih.
                </li>
                <li>
                    <b> Cost (biaya): </b> Semakin tinggi nilai cost maka semakin rendah peluang untuk dipilih.
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection