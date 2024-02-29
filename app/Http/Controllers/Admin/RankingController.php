<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RanksExport;
use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\CriteriaAnalysis;
use App\Models\CriteriaAnalysisDetail;
use Maatwebsite\Excel\Facades\Excel;

class RankingController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'ADMIN' || auth()->user()->level === 'USER') {
            $criteriaAnalysis = CriteriaAnalysis::with('user')->with(['details' => function ($query) {
                $query->join('criterias', 'criteria_analysis_details.criteria_id_second', '=', 'criterias.id')
                    ->select('criteria_analysis_details.*', 'criterias.name as criteria_name')
                    ->orderBy('criterias.id');
            }])->get();
        }
        $availableCriterias = Criteria::all()->pluck('id');
        $isAnyAlternative   = Alternative::checkAlternativeByCriterias($availableCriterias);
        $isAbleToRank       = false;
        if ($isAnyAlternative) {
            $isAbleToRank = true;
        }
        return view('pages.admin.rank.data', [
            'title'             => 'Ranking',
            'criteria_analysis' => $criteriaAnalysis,
            'isAbleToRank'      => $isAbleToRank,
        ]);
    }

    public function show(CriteriaAnalysis $criteriaAnalysis)
    {
        $criteriaAnalysis->load('bobots');
        $criterias      = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id);
        $criteriaIds    = $criterias->pluck('id');
        $alternatives   = Alternative::getAlternativesByCriteria($criteriaIds);
        $dividers       = Alternative::getDividerByCriteria($criterias);
        $normalizations = $this->_hitungNormalisasi($dividers, $alternatives);
        try {
            $ranking    = $this->_finalRanking($criteriaAnalysis->bobots, $normalizations);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('pages.admin.rank.detail', [
            'title'            => 'Perhitungan SAW',
            'dividers'         => $dividers,
            'normalizations'   => $normalizations,
            'criteriaAnalysis' => $criteriaAnalysis,
            'criterias'        => Criteria::all(),
            'ranks'            => $ranking
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
                'wisata_name'     => $alternative['wisata_name'],
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

    public function final(CriteriaAnalysis $criteriaAnalysis)
    {
        $criterias      = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id);
        $criteriaIds    = $criterias->pluck('id');
        $alternatives   = Alternative::getAlternativesByCriteria($criteriaIds);
        $dividers       = Alternative::getDividerByCriteria($criterias);
        $normalizations = $this->_hitungNormalisasi($dividers, $alternatives);
        try {
            $ranking    = $this->_finalRanking($criteriaAnalysis->bobots, $normalizations);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('pages.admin.rank.final', [
            'title'             => 'Ranking Destinasi Wisata',
            'criteria_analysis' => $criteriaAnalysis,
            'dividers'          => $dividers,
            'criterias'         => Criteria::all(),
            'normalizations'    => $normalizations,
            'ranks'             => $ranking
        ]);
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

    public function detailr(CriteriaAnalysis $criteriaAnalysis)
    {
        $criterias      = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id);
        $criteriaIds    = $criterias->pluck('id');
        $alternatives   = Alternative::getAlternativesByCriteria($criteriaIds);
        $dividers       = Alternative::getDividerByCriteria($criterias);
        $normalizations = $this->_hitungNormalisasi($dividers, $alternatives);
        try {
            $ranking    = $this->_finalRanking($criteriaAnalysis->bobots, $normalizations);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        $title = 'Detail Perhitungan SAW';
        return view('pages.admin.rank.detailr', [
            'criteriaAnalysis' => $criteriaAnalysis,
            'dividers'         => $dividers,
            'normalizations'   => $normalizations,
            'ranking'          => $ranking,
            'title'            => $title
        ]);
    }

    // export
    public function export(CriteriaAnalysis $criteriaAnalysis)
    {
        $criterias = CriteriaAnalysisDetail::getSelectedCriterias($criteriaAnalysis->id);
        $criteriaIds = $criterias->pluck('id');
        $alternatives = Alternative::getAlternativesByCriteria($criteriaIds);
        $dividers = Alternative::getDividerByCriteria($criterias);
        $normalizations = $this->_hitungNormalisasi($dividers, $alternatives);
        $ranking = $this->_finalRanking($criteriaAnalysis->bobots, $normalizations);
        $export = new RanksExport($ranking, $normalizations);
        $fileName = 'Ranking Destinasi Wisata.xlsx';
        return Excel::download($export, $fileName);
    }
}