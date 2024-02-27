<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CriteriaPerbadinganRequest;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\CriteriaAnalysis;
use App\Models\CriteriaAnalysisDetail;
use App\Models\PriorityValue;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;

class CriteriaPerbandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level === 'ADMIN' || auth()->user()->level === 'USER') {
            $comparisons = CriteriaAnalysis::with('user')->with(['details' => function ($query) {
                $query->join('criterias', 'criteria_analysis_details.criteria_id_second', '=', 'criterias.id')
                ->select('criteria_analysis_details.*', 'criterias.nama_kriteria as criteria_name')
                ->orderBy('criterias.id');
            }])
            ->get();
        }
        $criterias = Criteria::all();
        return view('pages.admin.kriteria.perbandingan.data', [
            'title'       => 'Perbandingan Kriteria',
            'comparisons' => $comparisons,
            'criterias'   => $criterias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->criteria_id)) {
            return redirect('dashboard/perbandingan')->with('failed', 'Silakan Periksa Kriteria yang Anda Pilih!');
        }
        $validate = $request->validate(['criteria_id' => 'required|array']);
        // data untuk tabel analisis kriteria
        $analysisData = ['user_id' => auth()->user()->id];
        $analysis = CriteriaAnalysis::create($analysisData);
        $analysisId = $analysis->id;
        $comparisonIds = [];
        for ($i = 0; $i < count($validate['criteria_id']); $i++) {
            // first data
            if ($i == 0) {
                $next = 0;
                for ($firstIndex = 0; $firstIndex < count($validate['criteria_id']); $firstIndex++) {
                    $data = [
                        'criteria_id_first'  => $validate['criteria_id'][$i],
                        'criteria_id_second' => $validate['criteria_id'][$next]
                    ];
                    array_push($comparisonIds, $data);
                    $next++;
                }
            } else { // sisa datanya
                //reverse loop
                $current = $i;
                for ($j = 0; $j < $current; $j++) {
                    $data = [
                        'criteria_id_first'  => $validate['criteria_id'][$current],
                        'criteria_id_second' => $validate['criteria_id'][$j],
                    ];
                    array_push($comparisonIds, $data);
                }
                // forward loop
                $next = $i;
                for ($firstIndex = $i; $firstIndex < count($validate['criteria_id']); $firstIndex++) {
                    $data = [
                        'criteria_id_first'  => $validate['criteria_id'][$i],
                        'criteria_id_second' => $validate['criteria_id'][$next]
                    ];
                    array_push($comparisonIds, $data);
                    $next++;
                }
            }
        }
        // simpan data ke tabel detail analisis kriteria
        foreach ($comparisonIds as $comparison) {
            $detail = [
                'criteria_analysis_id' => $analysisId,
                'criteria_id_first'    => $comparison['criteria_id_first'],
                'criteria_id_second'   => $comparison['criteria_id_second'],
                'comparison_value'     => 1
            ];
            CriteriaAnalysisDetail::create($detail);
        }
        return redirect('dashboard/perbandingan/' . $analysisId)->with('success', 'Kriteria Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaAnalysis $criteriaAnalysis)
    {
        $criteriaAnalysis->load('details', 'details.firstCriteria', 'details.secondCriteria');
        $details        = filterDetailResults($criteriaAnalysis->details);
        $isDoneCounting = PriorityValue::where('criteria_analysis_id', $criteriaAnalysis->id)->exists();
        $criteriaAnalysis->unsetRelation('details');
        return view('pages.admin.kriteria.perbandingan.input', [
            'title'             => 'Input Perbandingan Kriteria',
            'criteria_analysis' => $criteriaAnalysis,
            'details'           => $details,
            'isDoneCounting'    => $isDoneCounting,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriteriaPerbadinganRequest $request)
    {
        $validate = $request->validated();
        foreach ($validate['criteria_analysis_detail_id'] as $key => $id) {
            CriteriaAnalysisDetail::where('id', $id)->update([
                'comparison_value'  => $validate['comparison_values'][$key],
                'comparison_result' => $validate['comparison_values'][$key],
            ]);
        }
        $this->_countRestDetails($validate['id'], $validate['criteria_analysis_detail_id']);
        $this->_countPriorityValue($validate['id']);
        return redirect()
            ->back()
            ->with('success', 'Nilai Perbandingan Telah Diperbarui!');
    }

    // menghitung perbandingan
    private function _countRestDetails($criteriaAnalysisId, $detailIds)
    {
        // get semua data perbandingan yang tidak dimasukkan pengguna nilainya
        $restDetails = CriteriaAnalysisDetail::where('criteria_analysis_id', $criteriaAnalysisId)
            ->whereNotIn('id', $detailIds)
            ->get();

        // count and update nilai perbandingan
        if ($restDetails->count()) {
            $restDetails->each(function ($value, $key) use ($criteriaAnalysisId) {
                $prevComparison = CriteriaAnalysisDetail::where([
                    'criteria_analysis_id' => $criteriaAnalysisId,
                    'criteria_id_first'    => $value->criteria_id_second,
                    'criteria_id_second'   => $value->criteria_id_first,
                ])->first();
                // perbandingan hasil
                $comparisonResult = 1 / $prevComparison['comparison_value'];
                $comparisonValue = $prevComparison['comparison_value'];
                CriteriaAnalysisDetail::where([
                    'criteria_analysis_id' => $criteriaAnalysisId,
                    'criteria_id_first'    => $value->criteria_id_first,
                    'criteria_id_second'   => $value->criteria_id_second,
                ])->update([
                    'comparison_result' => $comparisonResult,
                    'comparison_value' => $comparisonValue,
                ]);
            });
        }
    }

    // menghitung nilai prioritas
    private function _countPriorityValue($criteriaAnalysisId)
    {
        // get semua kriteria yang dipilih by user
        $criterias = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysisId);
        // loop criteria
        foreach ($criterias as $criteria) {
            // get semua nilai perbandingan dari first criteria id yang cocok dengan loop criteria id
            $dataDetails = CriteriaAnalysisDetail::select('criteria_id_second', 'comparison_result')
                ->where([
                    'criteria_analysis_id' => $criteriaAnalysisId,
                    'criteria_id_first'    => $criteria->id
                ])->get();
            // nilai prioritas sementara
            $tempValue = 0;
            // loop nilai perbandingan
            foreach ($dataDetails as $detail) {
                $totalPerCriteria = CriteriaAnalysisDetail::where([
                    'criteria_analysis_id' => $criteriaAnalysisId,
                    'criteria_id_second'   => $detail->criteria_id_second
                ])->sum('comparison_result');
                // nilai prioritas sementara
                $res = substr($detail->comparison_result / $totalPerCriteria, 0, 11);
                $tempValue += $res;
            }
            // final prioritas value = nilai sementara / jumlah total kriteria
            $FinalPrevValue = $tempValue / $criterias->count();
            $data = [
                'criteria_analysis_id' => $criteriaAnalysisId,
                'criteria_id'          => $criteria->id,
                'value'                => floatval($FinalPrevValue),
            ];
            // insert or create jika tidak ada
            PriorityValue::updateOrCreate([
                'criteria_analysis_id' => $criteriaAnalysisId,
                'criteria_id'          => $criteria->id,
            ], $data);
        }
    }

    public function result(CriteriaAnalysis $criteriaAnalysis)
    {
        $criteriaAnalysis->load('priorityValues');
        $criterias          = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id);
        $criteriaIds        = $criterias->pluck('id');
        $dividers           = Alternative::getDividerByCriteria($criterias);
        $criterias          = Criteria::all();
        $numberOfCriterias  = count($criterias);
        $alternatives       = Alternative::all();
        $alternative1s       = Alternative::getAlternativesByCriteria($criteriaIds);
        $normalizations     = $this->_hitungNormalisasi($dividers, $alternative1s);
        $data = $this->prepareAnalysisData($criteriaAnalysis);
        $isAbleToRank = $this->checkIfAbleToRank();
        try {
            $ranking    = $this->_finalRanking($criteriaAnalysis->bobots, $normalizations);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('pages.admin.kriteria.perbandingan.result', [
            'title'             => 'Perhitungan AHP',
            'criteriaAnalysis'  => $criteriaAnalysis,
            'criteria_analysis' => $criteriaAnalysis,
            'dividers'          => $dividers,
            'totalSums'         => $data['totalSums'],
            'ruleRC'            => $data['ruleRC'],
            'isAbleToRank'      => $isAbleToRank,
            'numberOfCriterias' => $numberOfCriterias,
            'alternatives'      => $alternatives,
            'criterias'         => $criterias,
            'normalizations'    => $normalizations,
        ]);
    }

    private function _hitungNormalisasi($dividers, $alternatives)
    {
        $normalisasi = [];
        foreach ($alternatives as $alternative) {
            $normalisasiAngka = [];
            foreach ($alternative['alternative_val'] as $key => $val) {
                if ($val == 0) {
                    $dividers = 0;
                }
                $kategori = $dividers[$key]['kategori'];
                if ($kategori === 'BENEFIT' && $val != 0) {
                    $result = substr(floatval($val / $dividers[$key]['divider_value']), 0, 11);
                }
                if ($kategori === 'COST' && $val != 0) {
                    $result = substr(floatval($dividers[$key]['divider_value'] / $val), 0, 11);
                }
                array_push($normalisasiAngka, $result);
            }
            array_push($normalisasi, [
                'wisata_id'       => $alternative['wisata_id'],
                'wisata_name'     => strtoupper($alternative['wisata_name']),
                'jenis_name'      => $alternative['jenis_name'],
                'criteria_name'   => $alternative['criteria_name'],
                'criteria_id'     => $alternative['criteria_id'],
                'alternative_val' => $alternative['alternative_val'],
                'results'         => $normalisasiAngka
            ]);
        }
        // Menambahkan orderby berdasarkan nama destinasi (wisata_name) secara naik (ascending)
        $normalisasi = collect($normalisasi)->sortBy('wisata_name')->values()->all();
        return $normalisasi;
    }

    private function _finalRanking($bobots, $normalizations)
    {
        foreach ($normalizations as $keyNorm => $normal) {
            foreach ($normal['results'] as $keyVal => $value) {
                $importanceVal = $bobots[$keyVal]->value;
                // Operasi penjumlahan dari perkalian matriks ternormalisasi dan prioritas
                $result = $importanceVal * $value;
                if (array_key_exists('rank_result', $normalizations[$keyNorm])) {
                    $normalizations[$keyNorm]['rank_result'] += $result;
                } else {
                    $normalizations[$keyNorm]['rank_result'] = $result;
                }
            }
        }
        usort($normalizations, function ($a, $b) {
            return $b['rank_result'] <=> $a['rank_result'];
        });
        return $normalizations;
    }

    // nilai random konsistensi
    private function prepareAnalysisData($criteriaAnalysis)
    {
        $criteriaAnalysis->load('details', 'details.firstCriteria', 'details.secondCriteria', 'priorityValues', 'priorityValues.criteria');
        $totalPerCriteria = $this->_getTotalSumPerCriteria($criteriaAnalysis->id, CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id));
        // Nilai Random Konsistensi
        $ruleRC = [
            1  => 0.0,
            2  => 0.0,
            3  => 0.58,
            4  => 0.90,
            5  => 1.12,
            6  => 1.24,
            7  => 1.32,
            8  => 1.41,
            9  => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59,
        ];
        $criteriaAnalysis->unsetRelation('details');
        return ['totalSums' => $totalPerCriteria,'ruleRC' => $ruleRC,];
    }

    // check jika ada kriteria
    private function checkIfAbleToRank()
    {
        $availableCriterias = Criteria::all()->pluck('id');
        return Alternative::checkAlternativeByCriterias($availableCriterias);
    }

    // penjumlahan kriteria
    private function _getTotalSumPerCriteria($criteriaAnalysisId, $criterias)
    {
        $result = [];
        foreach ($criterias as $criteria) {
            $totalPerCriteria = CriteriaAnalysisDetail::where([
                'criteria_analysis_id' => $criteriaAnalysisId,
                'criteria_id_second'   => $criteria->id
            ])->sum('comparison_result');
            $data = [
                'nama_kriteria' => $criteria->nama_kriteria,
                'totalSum'      => floatval($totalPerCriteria)
            ];
            array_push($result, $data);
        }
        return $result;
    }

    // detail perhitungan
    public function detailr(CriteriaAnalysis $criteriaAnalysis)
    {
        $data = $this->prepareAnalysisData($criteriaAnalysis);
        $isAbleToRank = $this->checkIfAbleToRank();
        return view('pages.admin.kriteria.perbandingan.detailr', [
            'title'             => 'Perhitungan AHP',
            'criteria_analysis' => $criteriaAnalysis,
            'totalSums'         => $data['totalSums'],
            'ruleRC'            => $data['ruleRC'],
            'isAbleToRank'      => $isAbleToRank,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaAnalysis $criteriaAnalysis)
    {
        CriteriaAnalysis::destroy($criteriaAnalysis->id);
        return redirect('/dashboard/perbandingan')->with('success', 'Kriteria yang Dipilih Telah Dihapus!');
    }
}