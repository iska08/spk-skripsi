@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-8">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                {{-- @can('admin')
                <li class="breadcrumb-item">
                    <a href="{{ route('kombinasi.update', $criteria_analysis->id) }}">
                        Input Perbandingan Kriteria
                    </a>
                </li>
                @endcan --}}
                <li class="breadcrumb-item active">{{ $title }}</li>
                <li class="breadcrumb-item">
                    <a href="{{ route('kombinasi.detailr', $criteria_analysis->id) }}">
                        Perhitungan
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                {{-- matrik penjumlahan(prespektif nilai) --}}
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Penjumlahan Kolom Kriteria</h4>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="table-primary align-middle text-center">
                    <tr>
                        <th scope="col">Kriteria</th>
                        @foreach ($criteria_analysis->priorityValues as $priorityValue)
                        <th scope="col">
                            {{ $priorityValue->criteria->name }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php($startAt = 0)
                    @foreach ($criteria_analysis->priorityValues as $priorityValue)
                    @php($bgYellow = 'bg-warning text-dark')
                    <tr>
                        <th scope="row" class="text-center table-primary">
                            {{ $priorityValue->criteria->name }}
                        </th>
                        @foreach ($criteria_analysis->priorityValues as $priorityvalue)
                        @if (
                        $criteria_analysis->details[$startAt]->criteria_id_first ===
                        $criteria_analysis->details[$startAt]->criteria_id_second)
                        @php($bgYellow = '')
                        <td class="text-center bg-success text-white ">
                            {{ floatval($criteria_analysis->details[$startAt]->comparison_result) }}
                        </td>
                        @else
                        <td class="text-center {{ $bgYellow }}">
                            {{ round(floatval($criteria_analysis->details[$startAt]->comparison_result), 2) }}
                        </td>
                        @endif
                        @php($startAt++)
                        @endforeach
                    </tr>
                    @endforeach
                    <th class="text-center table-dark">Jumlah</th>
                    @foreach ($totalSums as $total)
                    <td class="text-center bg-dark text-white">
                        {{ round($total['totalSum'], 2) }}
                    </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Normalisasi dan prioritas --}}
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Normalisasi Kriteria dan Nilai Prioritas</h4>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="table-primary align-middle text-center">
                    <tr>
                        <th scope="col">Kriteria</th>
                        @foreach ($criteria_analysis->priorityValues as $priorityValue)
                        <th scope="col">
                            {{ $priorityValue->criteria->name }}</th>
                        @endforeach
                        <th scope="col" class="text-center table-primary">Jumlah</th>
                        <th scope="col" class="text-center table-dark text-white">Nilai Prioritas</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php($startAt = 0)
                    @php($rowTotals = [])
                    @foreach ($criteria_analysis->priorityValues as $priorityValue)
                    @php($rowTotal = 0)
                    @php($bgYellow = 'bg-warning text-dark')
                    <tr>
                        <th scope="row" class="table-primary text-center">
                            {{ $priorityValue->criteria->name }}</th>
                        @foreach ($criteria_analysis->priorityValues as $key => $priorityvalue)
                        <td class="text-center">
                            @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) /
                            $totalSums[$key]['totalSum'])
                            {{ round($res, 2) }}
                            @php($rowTotal += Str::substr($res, 0, 11))
                        </td>
                        @php($startAt++)
                        @endforeach
                        @php(array_push($rowTotals, $rowTotal))
                        <td class="text-center">
                            {{ round($rowTotal, 2) }}
                        </td>
                        <td class="text-center table-dark text-white">
                            {{ round($priorityValue->value, 3) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Matriks perkalian --}}
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Perkalian Setiap Elemen dengan Nilai Prioritas</h4>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="table-primary align-middle text-center">
                    <tr>
                        <th scope="col">Kriteria</th>
                        @foreach ($criteria_analysis->priorityValues as $priorityValue)
                        <th scope="col">{{ $priorityValue->criteria->name }}</th>
                        @endforeach
                        <th scope="col" class="table-dark text-white">Jumlah Baris</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php($startAt = 0)
                    @php($rowTotals = [])
                    @foreach ($criteria_analysis->priorityValues as $priorityValue)
                    @php($rowTotal = 0)
                    <tr>
                        <th scope="row" class="table-primary text-center">
                            {{ $priorityValue->criteria->name }}</th>
                        @foreach ($criteria_analysis->priorityValues as $key => $innerpriorityvalue)
                        <td class="text-center">
                            @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) *
                            $innerpriorityvalue->value)
                            {{-- hasil perkalian --}}
                            {{ round($res, 2) }}
                            {{-- row total --}}
                            @php($rowTotal += Str::substr($res, 0, 11))
                        </td>
                        @php($startAt++)
                        @endforeach
                        @php(array_push($rowTotals, $rowTotal))
                        <td class="text-center table-dark text-white">
                            {{-- {{ $rowTotal }} --}}
                            {{ round($rowTotal, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- λ --}}
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Menentukan λmaks dan Rasio Konsistensi</h4>
                </div>
            </div>
            <table class="table table-bordered table-responsive">
                <thead class="table-primary align-middle">
                    <tr>
                        <th scope="col">Kriteria</th>
                        <th scope="col" class="text-center">Jumlah Baris</th>
                        <th scope="col" class="text-center">Nilai Prioritas</th>
                        <th scope="col" class="text-center">λ</th>
                    </tr>
                </thead>
                <tbody>
                    @php($lambdaMax = null)
                    @php($lambdaResult = [])
                    @foreach ($rowTotals as $key => $total)
                    <tr>
                        <td scope="row">
                            {{ $criteria_analysis->priorityValues[$key]->criteria->name }}
                        </td>
                        <td class="text-center">
                            {{ round($total, 2) }}
                        </td>
                        <td class="text-center">
                            {{ round($criteria_analysis->priorityValues[$key]->value, 3) }}
                        </td>
                        <td class="text-center">
                            @php($lambda = $total / $criteria_analysis->priorityValues[$key]->value)
                            @php($res = substr($lambda, 0, 11))
                            @php(array_push($lambdaResult, $res))
                            {{ round($res, 2) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center fw-bold table-dark">λmaks</td>
                        <td class="text-center fw-bold table-dark">
                            @php($lambdaMax = array_sum($lambdaResult) / count($lambdaResult))
                            {{ round($lambdaMax, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-lg-flex justify-content-center">
                <div class="col-12 col-lg-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Banyak Kriteria</th>
                                <td>{{ $criteria_analysis->priorityValues->count() }}</td>
                            </tr>
                            <tr>
                                <th scope="row">λmaks</th>
                                <td>{{ round($lambdaMax, 2) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Indeks Konsistensi</th>
                                <td>
                                    @php($CI = ($lambdaMax - count($lambdaResult)) / (count($lambdaResult) - 1))
                                    {{ round($CI, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Konsistensi Random</th>
                                <td>
                                    @php($RC = $ruleRC[$criteria_analysis->priorityValues->count()])
                                    {{ $RC }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Rasio Konsistensi</th>
                                @php($CR = $RC != 0.0 ? $CI / $RC : 0.0)
                                @php($txtClass = 'text-danger fw-bold')
                                @if ($CR <= 0.1) @php($txtClass='text-success fw-bold' ) @endif <td
                                    class="{{ $txtClass }}">
                                    <span id="cr-value">{{ round($CR, 2) }}</span>
                                    (Nilai Konsisten)
                                    </td>
                            </tr>
                            <tr>
                                @if ($CR > 0.1)
                                <td class="text-center text-danger" colspan="2">
                                    Nilai Rasio Konsistensi melebihi <b>0.1</b> <br>
                                    Masukkan kembali nilai perbandingan kriteria
                                    <a href="{{ route('kombinasi.update', $criteria_analysis->id) }}"
                                        class="btn btn-danger mt-2">Masukkan kembali Nilai Perbandingan</a>
                                </td>
                                @elseif(!$isAbleToRank)
                                <td class="text-center text-danger" colspan="2">
                                    Operator belum memasukkan alternatif apapun <br>
                                    Harap menunggu operator untuk menginputkan alternatif sebelum melihat
                                    peringkat
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Normalisasi --}}
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Normalisasi Tabel Alternatif</h4>
                </div>
            </div>
            <table class="table table-bordered table-condensed table-responsive">
                <tbody>
                    <tr>
                        <td scope="col" class="fw-bold" style="width:11%">Kategori</td>
                        @foreach ($dividers as $divider)
                        <td scope="col">{{ $divider['kategori'] }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col" class="fw-bold" style="width:11%">Nilai Pembagi</td>
                        @foreach ($dividers as $divider)
                        <td scope="col">{{ $divider['divider_value'] }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <table id="datatablesSimple" class="table table-bordered table-responsive">
                <thead class="table-primary align-middle text-center">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama Alternatif</th>
                        <th scope="col" class="text-center">Jenis Wisata</th>
                        @foreach ($dividers as $divider)
                        <th scope="col">{{ $divider['name'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (!empty($normalizations))
                    @foreach ($normalizations as $normalisasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            {{ Str::ucfirst(Str::Upper($normalisasi['wisata_name'])) }}
                        </td>
                        <td class="text-center">
                            {{ $normalisasi['jenis_name'] }}
                        </td>
                        @foreach ($dividers as $key => $value)
                        @if (isset($normalisasi['results'][$key]))
                        <td class="text-center">
                            {{ round($normalisasi['results'][$key], 2) }}
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
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <div class="d-sm-flex align-items-center">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Ranking</h4>
                </div>
            </div>
            <table id="datatablesSimple2" class="table table-bordered table-responsive">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Nama Alternatif</th>
                        <th scope="col">Jenis Wisata</th>
                        <th scope="col" class="text-center">Hasil Perhitungan</th>
                        <th scope="col" class="text-center">Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($ranks))
                    @php($rankResult = [])
                    @foreach ($ranks as $rank)
                    <tr>
                        <td>
                            {{ $rank['wisata_name'] }}
                        </td>
                        <td>
                            {{ $rank['jenis_name'] }}
                        </td>
                        <td class="text-center">
                            {{ round($rank['rank_result'], 4) }}
                        </td>
                        <td class="text-center">
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
@php(session(["cr_value_{$criteria_analysis->id}" => round($CR, 2)]))
@endsection