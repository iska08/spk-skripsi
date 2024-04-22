@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-12">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kombinasi.awal') }}">Metode SPK</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('saw.result', $criteriaAnalysis->id) }}">
                        Perhitungan SAW
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
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
                        <td  class="text-center" scope="col">{{ $divider['divider_value'] }}</td>
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
            <table id="datatablesSimple2" class="table table-bordered">
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
                            {{ $normalisasi['wisata_name'] }}
                        </td>
                        <td class="text-center">
                            {{ $normalisasi['jenis_name'] }}
                        </td>
                        @foreach ($dividers as $key => $divider)
                        @php
                        $val = isset($normalisasi['alternative_val'][$key]) ? $normalisasi['alternative_val'][$key] :
                        null;
                        $result = isset($normalisasi['results'][$key]) ? round($normalisasi['results'][$key], 3) : null;
                        @endphp
                        <td class="text-center">
                            @if ($result !== null)
                            @if ($divider['kategori'] === 'BENEFIT' && $val != 0)
                            {{ $val }} / {{ $divider['divider_value'] }} =
                            @elseif ($divider['kategori'] === 'COST' && $val != 0)
                            {{ $divider['divider_value'] }} / {{ $val }} =
                            @endif
                            {{ $result }}
                            @else
                            Empty
                            @endif
                        </td>
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
            <table id="datatablesSimple" class="table table-bordered">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Ranking</h4>
                </div>
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
                    @if (!empty($ranking))
                    @php($rankResult = [])
                    @php($hasilKali = [])
                    @foreach ($ranking as $rank)
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
                            ({{ round($innerpriorityvalue->value, 3) }} *
                            {{ round($hasilNormalisasi, 3) }})
                            =
                            {{ round($res, 3) }}
                        </td>
                        @endforeach
                        <td class="text-center">
                            @foreach ($criteriaAnalysis->bobots as $key => $innerpriorityvalue)
                            @php($hasilNormalisasi = isset($rank['results'][$key]) ? $rank['results'][$key] : 0)
                                @php($kali = $innerpriorityvalue->value * $hasilNormalisasi)
                                @php($res = substr($kali, 0, 11))
                                @php(array_push($hasilKali, $res))
                                {{ round($res, 3) }}
                                @if (!$loop->last)
                                +
                                @endif
                            @endforeach
                            = {{ round($rank['rank_result'], 3) }}
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