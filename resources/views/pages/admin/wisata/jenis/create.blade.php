@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 border-bottom">
        <h1 class="mt-4 h2">{{ $title }}</h1>

        <form class="col-lg-8 contianer-fluid px-4 mt-3" method="POST" action="{{ route('jenis.index') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="jenis_name" class="form-label">Nama Jenis Wisata</label>
                <input type="text" id="jenis_name" name="jenis_name"
                    class="form-control @error('jenis_name') is-invalid @enderror" value="{{ old('jenis_name') }}" autofocus
                    required placeholder="Masukkan Destinasi Wisata">

                @error('jenis_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary mb-3">Save</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
@endsection
