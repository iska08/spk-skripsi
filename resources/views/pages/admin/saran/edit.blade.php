@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="containter-fluid px-4 mt-3">
    @can('admin')
    <div class="row align-items-center">
        <form class="col-lg-8" method="POST" action="{{ route('sarans.update', $saran->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_saran" class="form-label">Saran Nama Destinasi Wisata</label>
                <input type="text" class="form-control" id="nama_saran" name="nama_saran"
                    value="{{ $saran->nama_saran }}" readonly disabled>
                <input type="hidden" name="nama_saran" value="{{ $saran->nama_saran }}">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan"
                    value="{{ $saran->keterangan }}" readonly disabled>
                <input type="hidden" name="keterangan" value="{{ $saran->keterangan }}">
            </div>
            <div class="mb-3">
                <label for="validasi" class="form-label">Validasi</label>
                <select class="form-control" id="validasi" name="validasi" required>
                    <option value="0" {{ $saran->validasi == 0 ? 'selected' : '' }}>Belum Disetujui</option>
                    <option value="1" {{ $saran->validasi == 1 ? 'selected' : '' }}>Tidak Disetujui</option>
                    <option value="2" {{ $saran->validasi == 2 ? 'selected' : '' }}>Disetujui</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Simpan Perubahan</button>
            <a href="/dashboard/sarans" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
    @elseif('user')
    <div class="row align-items-center">
        <form class="col-lg-8" method="POST" action="{{ route('sarans.update', $saran->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_saran" class="form-label">Saran Nama Destinasi Wisata</label>
                <input type="text" class="form-control" id="nama_saran" name="nama_saran"
                    value="{{ $saran->nama_saran }}">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan"
                    value="{{ $saran->keterangan }}">
            </div>
            <input type="hidden" class="form-control" id="validasi" name="validasi" value="{{ $saran->validasi }}">
            <button type="submit" class="btn btn-primary mb-3">Simpan Perubahan</button>
            <a href="/dashboard/sarans" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
    @endcan
</div>
@endsection
