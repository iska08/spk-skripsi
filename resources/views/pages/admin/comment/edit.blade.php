@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="containter-fluid px-4 mt-3">
    <div class="row align-items-center">
        <form class="col-lg-8" method="POST" action="{{ route('comments.update', $comment->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Komentar</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{ old('content', $comment->content) }}" autofocus required>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Simpan Perubahan</button>
            <a href="/dashboard/comments" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection