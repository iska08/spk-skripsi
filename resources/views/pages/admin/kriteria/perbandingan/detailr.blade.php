@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-8">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                @can('admin')
                <li class="breadcrumb-item">
                    <a href="{{ route('perbandingan.update', $criteria_analysis->id) }}">
                        Input Perbandingan Kriteria
                    </a>
                </li>
                @endcan
                <li class="breadcrumb-item">
                    <a href="{{ route('perbandingan.result', $criteria_analysis->id) }}">
                        Hasil Perbandingan
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive col-lg-12">
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Penjumlahan Kolom Kriteria</h4>
                </div>
                <table class="table table-bordered">
                    <thead class="table-primary align-middle text-center">
                        <tr>
                            <th scope="col">Kriteria</th>
                            @foreach ($criteria_analysis->priorityValues as $priorityValue)
                            <th scope="col">
                                {{ $priorityValue->criteria->nama_kriteria }}
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
                                {{ $priorityValue->criteria->nama_kriteria }}
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
                                {{-- perhitungan --}}
                                @if ($bgYellow)
                                {{ 1 }}/
                                {{ round(floatval($criteria_analysis->details[$startAt]->comparison_value), 2) }}
                                =
                                @endif
                                {{-- hasil --}}
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
                {{-- Normalisasi dan Prioritas --}}
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Normalisasi Kriteria dan Nilai Prioritas</h4>
                </div>
                <table class="table table-bordered">
                    <thead class="table-primary align-middle text-center">
                        <tr>
                            <th scope="col">Kriteria</th>
                            @foreach ($criteria_analysis->priorityValues as $priorityValue)
                            <th scope="col">
                                {{ $priorityValue->criteria->nama_kriteria }}</th>
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
                                {{ $priorityValue->criteria->nama_kriteria }}
                            </th>
                            @foreach ($criteria_analysis->priorityValues as $key => $priorityvalue)
                            <td class="text-center">
                                @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) /
                                $totalSums[$key]['totalSum'])
                                {{-- normalisasi --}}
                                {{ round(floatval($criteria_analysis->details[$startAt]->comparison_result), 2) }}
                                / {{ round($totalSums[$key]['totalSum'], 2) }} =
                                {{ round($res, 3) }}
                                {{-- row total --}}
                                @php($rowTotal += Str::substr($res, 0, 11))
                            </td>
                            @php($startAt++)
                            @endforeach
                            {{-- jumlah baris --}}
                            @php(array_push($rowTotals, $rowTotal))
                            <td class="text-center">
                                {{ round($rowTotal, 3) }}
                            </td>
                            <td class="text-center table-dark text-white">
                                {{-- nilai Prioritas --}}
                                {{ round($rowTotal, 2) }} /
                                {{ $criteria_analysis->priorityValues->count() }} =
                                {{ round($priorityValue->value, 3) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- perkalian elemen dengan bobot prioritas --}}
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Matriks Perkalian Setiap Elemen dengan Nilai Prioritas</h4>
                </div>
                <table class="table table-bordered">
                    <thead class="table-primary align-middle text-center">
                        <tr>
                            <th scope="col">Kriteria</th>
                            @foreach ($criteria_analysis->priorityValues as $priorityValue)
                            <th scope="col">{{ $priorityValue->criteria->nama_kriteria }}</th>
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
                                {{ $priorityValue->criteria->nama_kriteria }}
                            </th>
                            @foreach ($criteria_analysis->priorityValues as $key => $innerpriorityvalue)
                            <td class="text-center">
                                @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) *
                                $innerpriorityvalue->value)
                                {{-- hasil perkalian --}}
                                {{ round(floatval($criteria_analysis->details[$startAt]->comparison_result), 2) }}
                                * {{ round($innerpriorityvalue->value, 2) }} =
                                {{ round($res, 3) }}
                                {{-- row total --}}
                                @php($rowTotal += Str::substr($res, 0, 11))
                            </td>
                            @php($startAt++)
                            @endforeach
                            @php(array_push($rowTotals, $rowTotal))
                            <td class="text-center table-dark text-white">
                                {{-- {{ $rowTotal }} --}}
                                {{ round($rowTotal, 3) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Lambda --}}
                <div class="mb-4">
                    <h4 class="mb-0 text-gray-800">Menentukan λmaks dan Rasio Konsistensi</h4>
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
                        @php($hasil = [])
                        @foreach ($rowTotals as $key => $total)
                        <tr>
                            <td scope="row">
                                {{ $criteria_analysis->priorityValues[$key]->criteria->nama_kriteria }}
                            </td>
                            {{-- jumlah baris --}}
                            <td class="text-center">
                                {{ round($total, 2) }}
                            </td>
                            {{-- nilai prioritas --}}
                            <td class="text-center">
                                {{ round($criteria_analysis->priorityValues[$key]->value, 3) }}
                            </td>
                            {{-- λ --}}
                            <td class="text-center">
                                @php($lambda = $total / $criteria_analysis->priorityValues[$key]->value)
                                @php($res = substr($lambda, 0, 11))
                                @php(array_push($lambdaResult, $res))
                                {{ round($total, 2) }} /
                                {{ round($criteria_analysis->priorityValues[$key]->value, 2) }} =
                                {{ round($res, 2) }}
                            </td>
                        </tr>
                        @endforeach
                        <tr class="align-middle">
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center fw-bold table-dark">λmaks</td>
                            <td class="text-center fw-bold table-dark">
                                {{ round(array_sum($lambdaResult), 3) }} /
                                {{ count($lambdaResult) }}
                                =
                                @php($lambdaMax = array_sum($lambdaResult) / count($lambdaResult))
                                {{ round($lambdaMax, 3) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- Final Result --}}
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
                                        {{ round($lambdaMax, 3) }} - {{ count($lambdaResult) }}
                                        /
                                        {{ count($lambdaResult) }} - 1
                                        =
                                        {{ round($CI, 3) }}
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
                                    @if ($CR <= 0.1)
                                    @php($txtClass='text-success fw-bold')
                                    @endif
                                    <td
                                        class="{{ $txtClass }}">
                                        {{ round($CI, 3) }} / {{ round($RC, 3) }} =
                                        {{ round($CR, 3) }}
                                    </td>
                                </tr>
                                <tr>
                                    @if ($CR > 0.1)
                                    <td class="text-center text-danger" colspan="2">
                                        Nilai Rasio Konsistensi Melebihi <b>0.1</b> <br>
                                        Masukkan Kembali Nilai Perbandingan Kriteria
                                        <a href="{{ route('perbandingan.update', $criteria_analysis->id) }}"
                                            class="btn btn-danger mt-2">Masukkan Kembali Nilai Perbandingan</a>
                                    </td>
                                    @elseif(!$isAbleToRank)
                                    <td class="text-center text-danger" colspan="2">
                                        Admin Belum Memasukkan Alternatif Apapun <br>
                                        Harap Menunggu Operator Untuk Menginputkan Alternatif Sebelum Melihat
                                        Peringkat
                                    </td>
                                    @else
                                    <th scope="row">Hasil</th>
                                    <td>
                                        <a href="{{ route('rank.index', $criteria_analysis->id) }}"
                                            class="btn btn-success">
                                            Lihat Perankingan
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection