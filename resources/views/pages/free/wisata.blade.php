@extends('layouts.free')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h1 class="mt-4">{{ $title }}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('free.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                        <li class="breadcrumb-item"><a href="{{ route('free.jenis') }}">Data Jenis Wisata</a></li>
                    </ol>
                </div>
            </div>
            {{-- datatable --}}
            <div class="card mb-4">
                <div class="card-body table-responsive">
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
                        <form action="{{ route('free.wisata') }}" method="GET" class="ms-auto float-end">
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
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-danger text-center p-4">
                                        <h4>Belum ada data Destinasi Wisata</h4>
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