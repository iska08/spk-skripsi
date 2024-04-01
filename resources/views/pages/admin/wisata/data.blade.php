@extends('layouts.admin')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h1 class="mt-4">{{ $title }}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                        <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Data Jenis Wisata</a></li>
                    </ol>
                </div>
            </div>
            {{-- datatable --}}
            <div class="card mb-4">
                <div class="card-body table-responsive">
                    @can('admin')
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <a href="{{ route('wisata.create') }}" type="button" class="btn btn-primary mb-3"><i
                                class="fas fa-plus me-1"></i>Destinasi Wisata
                        </a>
                    </div>
                    @endcan
                    {{-- validation error file required --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- file request --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="d-sm-flex align-items-center mb-3">
                            <select class="form-select me-3" id="perPage" name="perPage" onchange="submitForm()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $option == $perPage ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="form-label col-lg-6 col-sm-6 col-md-6" for="perPage">entries per page</label>
                        </div>
                        <form action="{{ route('wisata.index') }}" method="GET" class="ms-auto float-end">
                            <div class="input-group mb-3">
                                <input type="text" name="search" id="myInput" class="form-control"
                                    placeholder="Search..." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white align-middle text-center">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Destinasi Wisata</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Link Google Maps</th>
                                <th class="text-center">Fasilitas</th>
                                <th class="text-center">Biaya</th>
                                <th class="text-center">Jenis Wisata</th>
                                <th class="text-center">Website Resmi</th>
                                @can('admin')
                                <th class="text-center">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($wisatas->count())
                                @foreach ($wisatas as $wisata)
                                    <tr>
                                        <td scope="row" class="text-center">
                                            {{ ($wisatas->currentpage() - 1) * $wisatas->perpage() + $loop->index + 1 }}
                                        </td>
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
                                            {{ $wisata->jenis->jenis_name ?? 'Tidak Punya Jenis Wisata' }}
                                        </td>
                                        <td class="text-center">
                                            <?php if($wisata->situs == ""){
                                                ?>-<?php
                                            }else{
                                                ?><a href="{{ $wisata->situs }}">Klik di Sini</a><?php
                                            }?>
                                        </td>
                                        @can('admin')
                                        <td>
                                            <a href="{{ route('wisata.edit', $wisata->id) }}" class="badge bg-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="badge bg-danger border-0 btnDelete" data-object="Destinasi Wisata {{ $wisata->nama_wisata }}"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>                                            
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-danger text-center p-4">
                                        <h4>Belum Ada Data Destinasi Wisata</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $wisatas->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </main>
    <script>
        function submitForm() {
            var perPageSelect = document.getElementById('perPage');
            var perPageValue = perPageSelect.value;
            var currentPage = {{ $wisatas->currentPage() }};
            var url = new URL(window.location.href);
            var params = new URLSearchParams(url.search);
            params.set('perPage', perPageValue);
            if (!params.has('page')) {
                params.set('page', currentPage);
            }
            url.search = params.toString();
            window.location.href = url.toString();
        }
    </script>
@endsection