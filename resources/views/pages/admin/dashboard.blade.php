@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- Content Row -->
        @can('admin')
        <div class="row">
            <!-- Destinasi Wisata -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a style="text-decoration:none; color: #212529;" href="{{ route('wisata.index') }}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Destinasi Wisata</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wisata }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Criteria -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('kriteria.index') }}" style="text-decoration:none; color: #212529;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kriteria</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $criterias }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Jenis Wisata -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="{{ route('jenis.index') }}" style="text-decoration:none; color: #212529;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jenis Wisata
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jenis }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hiking fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- @can('admin') --}}
            <!-- Data User -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pengguna</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-gear fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endcan --}}
        </div>
        @endcan
    </div>
</main>
@endsection
