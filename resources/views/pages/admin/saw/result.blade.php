@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-12">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $title }}</li>
                @php($crValue = session("cr_value_{$criteriaAnalysis->id}"))
                @if ($crValue > 0.1)
                <li class="breadcrumb-item" style="color: red;">
                    Perhitungan SAW
                </li>
                @else
                <li class="breadcrumb-item">
                    <a href="{{ route('saw.detail', $criteriaAnalysis->id) }}">
                        Detail Perhitungan SAW
                    </a>
                </li>
                @endif
            </ol>
        </div>
    </div>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Lakukan Perhitungan Perbandingan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- Normalisasi Alternatif --}}
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Normalisasi Alternatif</h4>
                </div>
            </div>
            <table class="table table-bordered table-condensed">
                <tbody>
                    <tr>
                        <td scope="col" class="fw-bold text-center" style="width:11%">Kategori</td>
                        @foreach ($dividers as $divider)
                        <td class="text-center" scope="col">{{ $divider['kategori'] }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col" class="fw-bold text-center" style="width:11%">Nilai Pembagi</td>
                        @foreach ($dividers as $divider)
                        <td class="text-center" scope="col">{{ $divider['divider_value'] }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col" class="fw-bold text-center" style="width:11%">Bobot</td>
                        @foreach ($criteriaAnalysis->bobots as $key => $innerpriorityvalue)
                        <td class="text-center">
                            {{ round($innerpriorityvalue->value, 3) }}
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <table id="datatablesSimple" class="table table-bordered">
                <thead class="bg-primary align-middle text-center text-white">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama Alternatif</th>
                        <th scope="col" class="text-center">Jenis Wisata</th>
                        @foreach ($dividers as $divider)
                        <th scope="col">{{ $divider['nama_kriteria'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="align-middle text-center">
                    @if (!empty($normalizations))
                    @foreach ($normalizations as $normalisasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            {{ Str::ucfirst($normalisasi['wisata_name']) }}
                        </td>
                        <td class="text-center">
                            {{ $normalisasi['jenis_name'] }}
                        </td>
                        @foreach ($dividers as $key => $value)
                        @if (isset($normalisasi['results'][$key]))
                        <td class="text-center">
                            {{ round($normalisasi['results'][$key], 3) }}
                        </td>
                        @else
                        <td class="text-center">
                            Empty
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {{-- Ranking --}}
    <div class="card">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Ranking</h4>
                </div>
            </div>
            <table id="datatablesSimple2" class="table table-bordered">
                <thead class="bg-primary align-middle text-center text-white">
                    <tr>
                        <th scope="col">Nama Alternatif</th>
                        <th scope="col">Jenis Wisata</th>
                        @foreach ($dividers as $divider)
                        <th scope="col">
                            Hitung {{ $divider['nama_kriteria'] }}
                        </th>
                        @endforeach
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Ranking</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (!empty($ranks))
                    @php($rankResult = [])
                    @php($hasilKali = [])
                    @foreach ($ranks as $rank)
                    <tr>
                        <td>
                            {{ $rank['wisata_name'] }}
                        </td>
                        <td>
                            {{ $rank['jenis_name'] }}
                        </td>
                        @foreach ($criteriaAnalysis->bobots as $key => $innerpriorityvalue)
                        @php($hasilNormalisasi = isset($rank['results'][$key]) ? $rank['results'][$key] : 0)
                        <td class="text-center">
                            @php($kali = $innerpriorityvalue->value * $hasilNormalisasi)
                            @php($res = substr($kali, 0, 11))
                            @php(array_push($hasilKali, $res))
                            {{ round($res, 3) }}
                        </td>
                        @endforeach
                        <td class="text-center">
                            {{ round($rank['rank_result'], 3) }}
                        </td>
                        <td class="text-center fw-bold">
                            {{ $loop->iteration }}
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection