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
                    <a href="{{ route('jenis.create') }}" type="button" class="btn btn-primary mb-3">
                        <i class="fas fa-plus me-1"></i>
                        Jenis Wisata
                    </a>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis Wisata</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($jenises->count())
                                @foreach ($jenises as $jenis)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::ucfirst(Str::upper($jenis->jenis_name)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('jenis.wisatas', $jenis->slug) }}"
                                                class="badge bg-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('jenis.edit', $jenis->id) }}" class="badge bg-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('jenis.destroy', $jenis->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <span role="button" class="badge bg-danger border-0 btnDelClass"
                                                    data-object="destinasi wisata">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </span>
                                            </form>
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
