@extends('layouts.admin')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h1 class="mt-4">{{ $title }}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('wisata.index') }}">Data Destinasi Wisata</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
            {{-- datatable --}}
            <div class="card col-lg-10">
                <div class="card-body table-responsive">
                    @can('admin')
                    <a href="{{ route('jenis.create') }}" type="button" class="btn btn-primary mb-3">
                        <i class="fas fa-plus me-1"></i>
                        Jenis Wisata
                    </a>
                    @endcan
                    <table class="table table-bordered">
                        <thead class="bg-primary align-middle text-center text-white">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Jenis Wisata</th>
                                @can('admin')
                                <th class="text-center">Aksi</th>
                                @elseif('user')
                                <th class="text-center">Detail</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($jenises->count())
                                @foreach ($jenises as $jenis)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            {{ Str::ucfirst($jenis->jenis_name) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('jenis.wisatas', $jenis->slug) }}" class="badge bg-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @can('admin')
                                            <a href="{{ route('jenis.edit', $jenis->id) }}" class="badge bg-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('jenis.destroy', $jenis->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <span role="button" class="badge bg-danger border-0 btnDelClass" data-object="{{ $jenis->jenis_name }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </span>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center p-4">
                                        <h4>Belum ada data Jenis Wisata</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection